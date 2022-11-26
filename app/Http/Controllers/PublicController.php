<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{   
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
    public function welcome() {
        $announcements = Announcement::where('is_accepted',true)->take(4)->orderBy('created_at','desc')->get();
        $sortsBy=['Prezzo crescente','Prezzo decrescente','A-Z','Z-A','Dal più recente','Dal più vecchio'];
        
        
        return view('welcome', compact('announcements','sortsBy'));
    }
    public function welcomeOrder(Request $req){
        $sortsBy=['Prezzo crescente','Prezzo decrescente','A-Z','Z-A','Dal più recente','Dal più vecchio'];
        foreach ($sortsBy as $sortBy) {
            if ($req->methodSort==$sortBy) {
                if ($sortBy=='Prezzo crescente'|| $sortBy=='Prezzo decrescente' ) {
                        $object='price';
                } else if ($sortBy=='A-Z'|| $sortBy=='Z-A') {
                        $object='title';
                } else if ($sortBy=='Dal più recente'|| $sortBy=='Dal più vecchio') {
                        $object='created_at';
                }

                if ($sortBy=='Prezzo crescente'|| $sortBy=='A-Z' || $sortBy=='Dal più vecchio') {
                    $order='asc';
                } else if ($sortBy=='Prezzo decrescente'|| $sortBy=='Z-A' || $sortBy=='Dal più recente') {
                    $order='desc';
                }
                
                $announcementsOrder=Announcement::where('is_accepted',true)->take(4)->orderBy($object,$order)->get();
                return view('announcements.order', compact('announcementsOrder','sortsBy','sortBy'));
            }
            
        }
        
       
        
    }
    
    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }
    public function searchAnnouncements(Request $request){
        $announcementsSearch = Announcement::search($request->searched)->where('is_accepted' , true)->paginate(10);
        // dd($announcements);
        return view('announcements.index', compact('announcementsSearch'));
    }
}
