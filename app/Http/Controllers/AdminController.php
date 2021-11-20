<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Link;
use App\Models\Result;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function profile(){
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }
    public function data(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        User::findOrFail(Auth::user()->id)->update($data);
        return back()->with('message', 'User data change');
    }
    public function password(Request $request){
        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required||min:8||confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'error' => $validator->messages(),
            ]);
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if (Hash::check($request['old_password'], $user->password)) {
                $password = Hash::make($request['password']);
                User::findOrFail(Auth::user()->id)->update(['password' => $password]);
                return response()->json([
                    'status' => 'done',
                    'message' => 'Parol muvaffaqiyatli o\'zgartirildi'
                ]);
            }else{
                return response()->json([
                    'status' => 'check',
                    'error' => 'Eski parol noto\'g\'ri!',
                ]);
            }
        }
    }
}
