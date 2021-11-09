<?php

namespace App\Http\Controllers;

use App\Models\SocialSettings;
use Illuminate\Http\Request;

class SocialSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialSettings::paginate(20);
        return view('admin.social.index',compact('socials'));
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
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        SocialSettings::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.social.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialSettings  $socialSettings
     * @return \Illuminate\Http\Response
     */
    public function show(SocialSettings $socialSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialSettings  $socialSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialSettings $social)
    {
        return view('admin.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialSettings  $socialSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialSettings $social)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $social->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.social.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialSettings  $socialSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialSettings $social)
    {
        $social->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.social.index');
    }
}
