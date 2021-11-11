<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutSetting::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request);
            $data = $request->validate([
                'title_uz' => 'required|max:255',
                'title_en' => 'required|max:255',
                'title_ru' => 'required|max:255',
                'body_uz' => 'required',
                'body_en' => 'required',
                'body_ru' => 'required',
                'image' => 'image',
                'youtube' => 'required',
            ]);
            if ($request->hasFile('image')) {
                if (!file_exists('uploads/about')) {
                    mkdir('uploads/about', 0777, true);
                }
                $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/uploads/about/'), $imageName);
                $data['image'] = 'uploads/about/' . $imageName;
            }
                AboutSetting::create($data);
                session()->flash('message', 'Muvaffaqiyatli yaratildi!');
                return redirect()->route('admin.about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AboutSetting $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AboutSetting $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AboutSetting $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutSetting $about)
    {
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AboutSetting $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutSetting $about)
    {
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'youtube' => 'required',
        ]);
        if ($request->hasFile('image')) {
            if ($about->image){
                unlink($about->image);
            }
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/about/'), $imageName);
            $data['image'] = 'uploads/about/' . $imageName;
        }
//        dd($data);
        $about->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AboutSetting $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutSetting $aboutSetting)
    {
        //
    }
}
