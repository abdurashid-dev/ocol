<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Link;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialSettings;

class FrontendController extends Controller
{
    public function index()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $sliders = Slider::where('is_active',1)->get();
        $news = Blog::where('is_active',1)->get();
        $results = Result::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        $images = Image::where('is_active',1)->get();
        return view('frontend.index',[
            'text'=>$text,
            'socials'=>$social,
            'sliders'=>$sliders,
            'news'=>$news,
            'results'=>$results,
            'links'=>$links,
            'images'=>$images,
        ]);
    }

    public function singleBlog(Blog $id)
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $news = Blog::where('is_active',1)->where('id','!=',$id->id)->limit(4)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.singleNews',[
            'text'=>$text,
            'socials'=>$social,
            'new'=>$id,
            'links'=>$links,
            'news'=>$news,
        ]);
    }

    public function blog()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        $news = Blog::where('is_active',1)->paginate(12);
        return view('frontend.news',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
            'news'=>$news,
        ]);
    }

    public function image()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        $images = Image::where('is_active',1)->paginate(12);
        return view('frontend.image',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
            'images'=>$images,
        ]);
    }

    public function contact()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.contact',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }

    public function about()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.about',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }

    public function flag()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.flag',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }

    public function gerb()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.gerb',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }

    public function madhiya()
    {
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.madhiya',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }
}
