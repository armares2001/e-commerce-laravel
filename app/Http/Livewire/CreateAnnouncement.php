<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images=[];
    public $image;
    public $form_id;
    public $announcement;


    protected $rules = [

        'title' =>  'required | min:4',
        'body' => 'required | min:10',
        'category'=>'required',
        'price' => 'required | min:0 | max:10000000 | numeric',
        'images.*'=>'image | max:2000 ',
        'temporary_images.*'=>'image | max:2000 | required',
    ];
    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'il campo :attribute è troppo corto',
        'numeric'=>'il campo :attribute deve essere un numero',
        'price.max'=>'Il prezzo non può essere superiore a 10.000$',
        'temporary_images.required'=>'Immagine richiesta',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine deve contenere massimo 2mb',
        'images.image'=>'deve essere un\'immagine',
        'images.max'=>'L\'immagine deve contenere massimo 2mb',

    ];
    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'image | max:2000 | required',
        ])) {
        foreach ($this->temporary_images as $image ) {
            $this->images[]=$image;
        }
        }
    }
    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function store(){
        $this->validate();
        // $category=Category::find($this->category);
        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName="announcements/{$this->announcement->id}";
                $newImage=$this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,300,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        // $announcement=$category->announcements()->create([
        //     'title'=>$this->title,
        //     'body'=>$this->body,
        //     'price'=>$this->price,
        // ]);
        // Auth::user()->announcements()->save($announcement);
        session()->flash('message','Articolo inserito con successo, sarà pubblicato dopo la revisione');
        $this->clear();
        // return redirect()->route('successAnnouncement');
    }
    public function clear(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
        $this->image='';
        $this->images=[];
        $this->temporary_images=[];
        $this->form_id=rand();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.create-announcement');
    }

}
