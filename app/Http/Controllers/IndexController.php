<?php

namespace App\Http\Controllers;
use App\Http\Models\Batch;
use App\Http\Models\Department;
use App\Http\Models\Semester;
use App\Http\Models\BloodGroup;
use App\User;
use App\Http\Models\Post;
use App\Http\Models\Gallery;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    

    public function index(){
        $users=User::all()->count();
        $departments=Department::all()->count();
        $batch=Batch::all()->count();
        $posts=Post::all()->count();
        $gallery = Gallery::all()->count();
        return view('Admin.Dashboard.index',compact('users','departments','batch','posts','gallery'));
    }
}
