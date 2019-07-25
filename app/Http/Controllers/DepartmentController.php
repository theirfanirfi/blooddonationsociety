<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Department;
use Auth;
use App\User;
class DepartmentController extends Controller
{
    //

    public function departments(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        return view('Admin.department.departments');
    }
    public function departmentView(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $all_departments=Department::all();
        return view('Admin.department.departments',compact('all_departments'));
    }
    public function addDepartment(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



       $dept_name=$req->input('dep_name');
       if(empty($dept_name)){
        return redirect()->back()->with('error','None of the fields can be empty.');
                     }else{
                        $checkDepartment = Department::where(['dept_name' => $dept_name]);
                        if($checkDepartment->count() > 0){
                            return redirect()->back()->with('error','The department is already taken. please use another one.');
                            }else {
                            $department=new Department();
                             $department->dept_name=$dept_name;
                             if($department->save()){
                                return redirect()->back()->with('success','Department Added.');
                            }else {
                                return redirect()->back()->with('error','Error occurred in saving the donor data. Please try again.');
                            }
                            }
                     }
    }
    public function deleteDepartment($id){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $deleteDep=Department::find($id);
        $deleteDep->delete();
        return redirect()->back()->with('danger','Department Deleted Successfully.');
    }
    public function EditDep($id){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $Dep=Department::find($id);
            return view('Admin.department.editDep',compact('Dep'));
    }
    public function EditingDep(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_departments') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


      $dep_id=$req->input('dep_id');
      $dep_name=$req->input('dep_name');
      if(empty($dep_name)){
        return redirect()->back()->with('error','None of the fields can be empty.');
                     }else{
                        $checkDepartment = Department::where(['dept_name' => $dep_name]);
                        if($checkDepartment->count() > 0){
                            return redirect()->back()->with('error','The department is already taken. please use another one.');
                            }else {
                            $department= Department::find($dep_id);
                             $department->dept_name=$dep_name;
                             if($department->save()){
                                return redirect()->back()->with('success','Department Updated Successfully.');
                            }else {
                                return redirect()->back()->with('error','Error occurred in saving the donor data. Please try again.');
                            }
                            }
                     }
    }
}
