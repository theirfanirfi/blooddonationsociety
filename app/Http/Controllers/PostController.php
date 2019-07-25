<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Models\Post;
use App\User;
class PostController extends Controller
{
    //
    public function addpostview(){
        $user = Auth::user();
        if(User::checkPermission($user,'add_post') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        return view('Admin.post.addpost');
    }

    public function postsview(){
        $Myposts=Post::all();
        return view('Admin.post.viewposts',compact('Myposts'));
    }

    public function addpost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'add_post') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $title = $req->input('post_title');
        $file = $req->file('image');
        $desc = $req->input('description');
        $excerpt = $req->input('excerpt');

        if(empty($title) || empty($desc) || empty($excerpt)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!$req->has('image')){
            return redirect()->back()->with('error','Post title image must be provided.');
        }else {
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();

            $destinationPath = './posts';
            if($file->move($destinationPath,$image_name)){
                $p = new Post();
                $p->post_title = $title;
                $p->description = $desc;
                $p->excerpt = $excerpt;
                $p->image=$image_name;
                if($p->save()){
                    return redirect()->back()->with('success','Post Added.');
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the post. Please try again.');
                }

        }
    }
    }
    public function deletePosts($id){
        $user = Auth::user();
        if(User::checkPermission($user,'delete_post') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


              $postDelete=Post::find($id);
              $postDelete->delete();
              return redirect()->back();
    }
    public function editPost($id){

        $user = Auth::user();
        if(User::checkPermission($user,'edit_post') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $PostId=$id;
        $editPost=Post::find($id);
        return view('Admin.post.editPost',compact('editPost','PostId'));

    }
    public function editpostpost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'edit_post') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




       echo $title = $req->input('post_title');
       echo $file = $req->file('image');
       echo $desc = $req->input('description');
       echo $excerpt = $req->input('excerpt');
       echo $id=$req->input('post_id');
       if(empty($title) || empty($desc) || empty($excerpt)){
        return redirect()->back()->with('error','None of the fields can be empty.');
       }else if(!$req->has('image')){
            return redirect()->back()->with('error','Post title image must be provided.');
        }else {
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();

            $destinationPath = './posts';
            if($file->move($destinationPath,$image_name)){
                $p =Post::find($id);
                $p->post_title = $title;
                $p->description = $desc;
                $p->excerpt = $excerpt;
                $p->image=$image_name;
                if($p->save()){
                    return redirect()->back();
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the post. Please try again.');
                }

        }
    }
    }
public function see_more_post($id){
    $seePost=Post::find($id);
        return view('Admin.post.see_more_post',compact('seePost'));
}
}
