<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Link;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialSettings;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Oltiariq pedagogika kolleji');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Oltiariq pedagogika kolleji');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Oltiariq pedagogika kolleji');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');

        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $sliders = Slider::where('is_active',1)->get();
        $news = Blog::where('is_active',1)->get();
        $results = Result::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        $images = Image::where('is_active',1)->inRandomOrder()->limit(6)->get();
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
        SEOMeta::setTitle('Yangiliklar');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Yangiliklar');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Yangiliklar');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Yangiliklar');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Yangiliklar');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Yangiliklar');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Rasmlar galereyasi');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Rasmlar galereyasi');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Rasmlar galereyasi');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Biz bilan aloqa');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Biz bilan aloqa');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Biz bilan aloqa');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Biz haqimizda');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Biz haqimizda');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Biz haqimizda');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');

        $about = AboutSetting::first();
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.about',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
            'about'=>$about,
        ]);
    }

    public function flag()
    {
        SEOMeta::setTitle('Bayroq');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Bayroq');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Bayroq');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Gerb');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Gerb');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Gerb');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
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
        SEOMeta::setTitle('Madhiya');
        SEOMeta::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        SEOMeta::setCanonical('https://oltiariqped.uz');

        OpenGraph::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        OpenGraph::setTitle('Madhiya');
        OpenGraph::setUrl('https://oltiariqped.uz');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Madhiya');
        JsonLd::setDescription('Oltiariq pedagogika kollejining rasmiy sayti');
        $text = Setting::first();
        $social = SocialSettings::where('is_active',1)->get();
        $links = Link::where('is_active',1)->get();
        return view('frontend.madhiya',[
            'text'=>$text,
            'socials'=>$social,
            'links'=>$links,
        ]);
    }
    public function contactAdmin(Request $request){
        $data = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'province'=>'required|max:255',
            'sms'=>'required',
        ]);
//    dd($data);
        Contact::create($data);
        return back()->with('message', 'Success');

    }
}
