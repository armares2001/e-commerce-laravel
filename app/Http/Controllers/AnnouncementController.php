<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('allAnnouncement');
    }
    public function createAnnouncement(){
        return view('announcements.create');
    }
    public function successAnnouncement(){
        return view('announcements.success');
    }
    public function detailAnnouncement(Announcement $announcement){
        return view('announcements.detail', compact('announcement'));
    }
    public function allAnnouncement(){
        $announcements=Announcement::where('is_accepted',true)->paginate(10);
        return view('announcements.all', compact('announcements'));
    }
}
