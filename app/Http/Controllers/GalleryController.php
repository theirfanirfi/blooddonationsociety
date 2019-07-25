<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Models\Gallery;
use App\User;
class GalleryController extends Controller
{
    //

    public function addimagetogallery(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        return view('Admin.gallery.addimagetogallery');
    }

    public function addimagetogalleryPost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $title = $req->input('image_title');
        $file = $req->file('image');
        $desc = $req->input('description');

        if(empty($title) || empty($desc)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!$req->has('image')){
            return redirect()->back()->with('error','Post title image must be provided.');
        }else {
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();

            $destinationPath = './gallery';
            if($file->move($destinationPath,$image_name)){
                $g = new Gallery();
                $g->image_title = $title;
                $g->image_description = $desc;
                $g->image_url=$image_name;
                if($g->save()){
                    return redirect()->back()->with('success','Image saved to gallery.');
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the image. Please try again.');
                }
            }

    }
}

public function ImageGallery(){
    $img=Gallery::all();
    return view('Admin.gallery.viewGallery',compact('img'));
}
public function deleteImage($id){
$img=Gallery::find($id);
$img->delete();
return redirect()->back()->with('success','Image deleted Successfully.');
}
public function see_gallery($id){
    $gallery=Gallery::find($id);
    return view('Admin.gallery.see_gallery',compact('gallery'));
}
public function editImage($id){
     $Image=Gallery::find($id);
    return view('Admin.gallery.editImage',compact('Image'));
}
public function updateImage(Request $req){
    $title = $req->input('image_title');
    $file = $req->file('image');
    $desc = $req->input('description');
    $id = $req->input('image_id');
    if(empty($title) || empty($desc)){
        return redirect()->back()->with('error','None of the fields can be empty.');
    }else if(!$req->has('image')){
        return redirect()->back()->with('error','Post title image must be provided.');
    }else {
        $image_name = $file->getClientOriginalName();
        $image_ext = $file->getClientOriginalExtension();
        $image_size = $file->getSize();

        $destinationPath = './gallery';
        if($file->move($destinationPath,$image_name)){
            $g = Gallery::find($id);
            $g->image_title = $title;
            $g->image_description = $desc;
            $g->image_url=$image_name;
            if($g->save()){
                return redirect()->back()->with('success','Image Updated Successfully.');
            }else {
                return redirect()->back()->with('error','Error occurred in saving the image. Please try again.');
            }
        }

}
}

public function gallery(){
    $gallery = Gallery::all();
    return view('Frontend.pages.gallery',['gallery' => $gallery]);
}
}
