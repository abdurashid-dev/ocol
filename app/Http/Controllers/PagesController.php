<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Link;
use App\Models\Result;
use App\Models\Slider;
use App\Models\SocialSettings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // activation
    public function activation(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($blog->is_active == 1){
                $blog->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($blog->is_active == 0){
                $blog->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function linkActivation(Request $request, $id)
    {
        $link = Link::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($link->is_active == 1){
                $link->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($link->is_active == 0){
                $link->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function resultActivation(Request $request, $id)
    {
        $result = Result::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($result->is_active == 1){
                $result->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($result->is_active == 0){
                $result->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function sliderActivation(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($slider->is_active == 1){
                $slider->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($slider->is_active == 0){
                $slider->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function imageActivation(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($image->is_active == 1){
                $image->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($image->is_active == 0){
                $image->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function socialActivation(Request $request, $id)
    {
        $social = SocialSettings::findOrFail($id);
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];

        if ($request->type == 'status'){
            if($social->is_active == 1){
                $social->update($inactive);
                session()->flash('inactive', 'Faol emas !');
                return back();
            }elseif($social->is_active == 0){
                $social->update($active);
                session()->flash('message', 'Faol !');
                return back();
            }
        }
    }

    public function contactSend(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'sms'=>'required',
        ]);
    }
    //Language
    public function lang($lang)
    {
        session()->put('lang',$lang);
        return back();
    }
}
