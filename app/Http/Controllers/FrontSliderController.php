<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\FrontSlider as FS;
use Auth;
use App\User;
class FrontSliderController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $slider = FS::all();
        return view('Admin.slider.viewsliderimages',['images' => $slider]);
    }

    public function addsliderimage(){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        return view('Admin.slider.addimagetoslider');
    }

    public function addsliderimagePost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $title = $req->input('image_title');
        $file = $req->file('image');

        if(empty($title)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!$req->has('image')){
            return redirect()->back()->with('error','Image must be provided.');
        }else {
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();

            $destinationPath = './slider';
            if($file->move($destinationPath,$image_name)){
                $s = new FS();
                $s->title = $title;
                $s->image=$image_name;
                if($s->save()){
                    return redirect()->back()->with('success','Image saved to slider.');
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the image. Please try again.');
                }
            }

    }
}

public function deletesliderimage($id){
    $user = Auth::user();
    if(User::checkPermission($user,'change_frontend') == 0){
        return redirect('/admin')->with('error','You are not authorized to perform this request.');
        exit();
    }



$img=FS::find($id);
$img->delete();
return redirect()->back()->with('success','Image deleted Successfully.');
}
public function see_gallery($id){

    $gallery=Gallery::find($id);
    return view('Admin.gallery.see_gallery',compact('gallery'));
}
public function editSliderImage($id){
    $user = Auth::user();
    if(User::checkPermission($user,'change_frontend') == 0){
        return redirect('/admin')->with('error','You are not authorized to perform this request.');
        exit();
    }



     $Image=FS::find($id);
    return view('Admin.slider.editsliderImage',compact('Image'));
}
public function updateSliderImage(Request $req){
    $user = Auth::user();
    if(User::checkPermission($user,'change_frontend') == 0){
        return redirect('/admin')->with('error','You are not authorized to perform this request.');
        exit();
    }



    $title = $req->input('image_title');
    $file = $req->file('image');
    $id = $req->input('image_id');
    if(empty($title)){
        return redirect()->back()->with('error','None of the fields can be empty.');
    }else if(!$req->has('image')){
        //return redirect()->back()->with('error','Image must be provided.');
        $s = FS::find($id);
        $s->title = $title;
       // $s->image=$image_name;
        if($s->save()){
            return redirect()->back()->with('success','Image Updated Successfully.');
        }else {
            return redirect()->back()->with('error','Error occurred in updating the image. Please try again.');
        }
    }else {
        $image_name = $file->getClientOriginalName();
        $image_ext = $file->getClientOriginalExtension();
        $image_size = $file->getSize();

        $destinationPath = './slider';
        if($file->move($destinationPath,$image_name)){
            $s = FS::find($id);
            $s->title = $title;
            $s->image=$image_name;
            if($s->save()){
                return redirect()->back()->with('success','Image Updated Successfully.');
            }else {
                return redirect()->back()->with('error','Error occurred in updating the image. Please try again.');
            }
        }

}
}
}
