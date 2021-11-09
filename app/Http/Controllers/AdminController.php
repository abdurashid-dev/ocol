<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Link;
use App\Models\Result;
use App\Models\Slider;

//use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $news = Blog::all();
        $result = Result::all();
        $links = Link::all();
        $sliders = Slider::all();
        return view('admin.index', compact('news', 'result', 'links','sliders'));
    }
}
