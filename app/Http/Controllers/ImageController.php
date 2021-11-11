<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Slider;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(10);
        return view('admin.images.index', compact('images'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
        ]);
        $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);

        if(!file_exists('uploads/images')){
            mkdir('uploads/images', 0777, true);
        }
        $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image') ->move(public_path('/uploads/images/'), $imageName);
        $data['image'] = 'uploads/images/'.$imageName;

        Image::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('admin.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
        ]);
        $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);


        if($request->hasFile('image')){
            unlink($image->image);
            $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image') ->move(public_path('/uploads/images/'), $imageName);
            $data['image'] = 'uploads/images/'.$imageName;
        }
        $image->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        unlink($image->image);
        $image->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.images.index');
    }
}
