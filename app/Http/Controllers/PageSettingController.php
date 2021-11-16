<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageSetting ::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'title_uz'=>'required',
            'title_en'=>'required',
            'title_ru'=>'required',
            'content_uz'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
        ]);
        $data['slug'] = Str::slug($data['title_en'], '-');
        PageSetting ::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PageSetting $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PageSetting $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageSetting $page)
    {
        $data = $request->validate([
            'title_uz'=>'required',
            'title_en'=>'required',
            'title_ru'=>'required',
            'content_uz'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
        ]);
        $data['slug'] = Str::slug($data['title_en'], '-');
        $page->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageSetting $page)
    {
        $page->delete();
        session()->flash('message', 'Muvaffaqiyatli O\'chirildi!');
        return redirect()->route('admin.page.index');
    }
}
