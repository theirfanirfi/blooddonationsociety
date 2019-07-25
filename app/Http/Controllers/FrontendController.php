<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Http\Models\Batch;
use App\Http\Models\Semester;
use App\Http\Models\Department;
use App\Http\Models\BloodGroup;
use App\Http\Models\Gallery;
use App\Http\Models\Post;
use App\Http\Models\FrontSlider as FS;
use App\Http\Models\FrontMessages as FM;
class FrontendController extends Controller
{
    //

    public function index(){
        $batches = Batch::all();
        $semesters = Semester::all();
        $dpts = Department::all();
        $bgs = BloodGroup::all();
        $slider = FS::orderBy('id','DESC')->limit(3)->get();
        $fms = FM::orderBy('id','DESC')->limit(2)->get();
        $gallery = Gallery::all();
        $posts = Post::orderBy('id','DESC')->limit(6)->get();
        return view('Frontend.MasterLayout',['msgs' => $fms,'gallery' => $gallery,'batches' => $batches,
        'semesters' => $semesters, 'dpts' => $dpts,'bgs' => $bgs,'slider' => $slider,
        'posts' => $posts,
        ]);
    }

    public function loginview(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->is_donor == 1 && $user->is_super_admin == 1){
                return redirect('/admin/addpost')->with('error','You are already logged in.');
             }else if($user->is_donor == 1){
                 return redirect('/')->with('error','You are already logged in.');
             }else if($user->is_super_admin){
                 return redirect('/admin/addpost')->with('error','You are already logged in.');
             }else {
                 Auth::logout();
             return redirect()->back()->with('error','No redirection page found. Please login again.');
             }
        }else {
        return view('Frontend.pages.loginform');
        }
    }

    public function signupview(){
        $batches = Batch::all();
        $semesters = Semester::all();
        $dpts = Department::all();
        $bgs = BloodGroup::all();
        return view('Frontend.pages.signupform',['batches' => $batches,
        'semesters' => $semesters, 'dpts' => $dpts,'bgs' => $bgs,]);
    }


}
