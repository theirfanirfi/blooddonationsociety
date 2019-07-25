<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Setting;
use Auth;
use App\User;
class SettingsController extends Controller
{
    //

    public function index(){
        $s = Setting::all()->first();
        return view('Admin.account.settings',['s' => $s]);
    }

    public function updatesitedesc(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $desc = $req->input('desc');
        if(empty($desc)){
            return redirect()->back()->with('error','Description field can not be empty.');
        }else {
            $s = Setting::all();
            if($s->count() > 0){
                $s = $s->first();
            $s->short_description = $desc;
            if($s->save()){
            return redirect()->back()->with('success','Site Description added.');

            }else {
            return redirect()->back()->with('error','Error occurred in saving the description. Please try again.');
            }
        }else {
            $s = new Setting();
            $s->short_description = $desc;
            if($s->save()){
            return redirect()->back()->with('success','Site Description added.');

            }else {
            return redirect()->back()->with('error','Error occurred in saving the description. Please try again.');
            }
        }
        }


    }


    public function sociallinks(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $fb = $req->input('fb_link');
        $twitter = $req->input('twitter_link');
        $insta = $req->input('insta_link');
        $isNotEmpty = false;
            $s = Setting::all();
            if($s->count() > 0){
                $s = $s->first();

                if(!empty($fb)){
                    $s->fb_link = $fb;
                }

                if(!empty($twitter)){
                    $s->twitter_link = $twitter;
                }

                if(!empty($insta)){
                    $s->insta_link = $insta;
                }

            if($s->save()){
            return redirect()->back()->with('success','Social Media links updated.');

            }else {
            return redirect()->back()->with('error','Error occurred in updating social media links. Please try again.');
            }
        }else {
            $s = new Setting();


            if(!empty($fb)){
                $s->fb_link = $fb;
            }

            if(!empty($twitter)){
                $s->twitter_link = $twitter;
            }

            if(!empty($insta)){
                $s->insta_link = $insta;
            }


            if($s->save()){

            return redirect()->back()->with('success','Social Media links updated.');


            }else {

            return redirect()->back()->with('error','Error occurred in updating social media links. Please try again.');

            }
        }

    }
}
