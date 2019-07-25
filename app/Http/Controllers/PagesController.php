<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Page;
use Auth;
use App\User;
class PagesController extends Controller
{
    //

    public function aboutpageupdate(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $desc = $req->input('description');
        if(empty($desc)) {
            return redirect()->back()->with('error','Page description can not be empty.');
        }else {
            $page = Page::where(['type' => 1]);
            if($page->count() > 0){
                $page = $page->first();
                $page->description = $desc;
                if($page->save()){
                    return redirect()->back()->with('success','Page description updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the page. Please try again.');
                }
            }else {
                $page = new Page();
                $page->description = $desc;
                $page->type = 1; //about us
                if($page->save()){
                    return redirect()->back()->with('success','Page description Added.');
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the page description. Please try again.');
                }
            }
        }

    }

    public function privacypageupdate(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $desc = $req->input('description');
        if(empty($desc)) {
            return redirect()->back()->with('error','Page description can not be empty.');
        }else {
            $page = Page::where(['type' => 2]);
            if($page->count() > 0){
                $page = $page->first();
                $page->description = $desc;
                if($page->save()){
                    return redirect()->back()->with('success','Page description updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the page. Please try again.');
                }
            }else {
                $page = new Page();
                $page->description = $desc;
                $page->type = 2; //privacy
                if($page->save()){
                    return redirect()->back()->with('success','Page description Added.');
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the page description. Please try again.');
                }
            }
        }

    }


    public function contactuspageupdate(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $desc = $req->input('description');
        if(empty($desc)) {
            return redirect()->back()->with('error','Page description can not be empty.');
        }else {
            $page = Page::where(['type' => 4]);
            if($page->count() > 0){
                $page = $page->first();
                $page->description = $desc;
                if($page->save()){
                    return redirect()->back()->with('success','Page description updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the page. Please try again.');
                }
            }else {
                $page = new Page();
                $page->description = $desc;
                $page->type = 4; //contactus
                if($page->save()){
                    return redirect()->back()->with('success','Page description Added.');
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the page description. Please try again.');
                }
            }
        }

    }


    public function termspageupdate(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }





        $desc = $req->input('description');
        if(empty($desc)) {
            return redirect()->back()->with('error','Page description can not be empty.');
        }else {
            $page = Page::where(['type' => 3]);
            if($page->count() > 0){
                $page = $page->first();
                $page->description = $desc;
                if($page->save()){
                    return redirect()->back()->with('success','Page description updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the page. Please try again.');
                }
            }else {
                $page = new Page();
                $page->description = $desc;
                $page->type = 3; //terms and condition page update.
                if($page->save()){
                    return redirect()->back()->with('success','Page description Added.');
                }else {
                    return redirect()->back()->with('error','Error occurred in adding the page description. Please try again.');
                }
            }
        }

    }

    public function aboutuspage(){
        $page = Page::where(['type' => 1])->first();
        return view('Admin.pages.aboutus',['page' => $page]);
    }
    public function privacypage(){
        $page = Page::where(['type' => 2])->first();
        return view('Admin.pages.privacy',['page' => $page]);
    }

    public function contactuspage(){
        $page = Page::where(['type' => 4])->first();
        return view('Admin.pages.contactus',['page' => $page]);
    }

    public function termspage(){
        $page = Page::where(['type' => 3])->first();
        return view('Admin.pages.termspage',['page' => $page]);
    }
}
