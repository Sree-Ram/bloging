<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    function login()
    {
        return view('backend.login');
    }
    function submit_login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userCheck= Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        
        if($userCheck>0)
        {
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect('admin/login')->with('error','Invalid Username/Password!!');
        }
    

    }
    public function dashboard()
        {
            $posts=Post::orderBy('id','desc')->get();
            return view('backend.dashboard',['posts'=>$posts]);
        } 

        //show all comments

        function comments()
        {
            $data=Comment::orderBy('id','desc')->get();
            return view('backend.comment.index',['data'=>$data]);
        }

        //delete Comments
        public function delete_comment($id)
        {
            Comment::where('id',$id)->delete();
            return redirect('admin/comment');
        }

        //show user
        function users()
        {
            $data=User::orderBy('id','desc')->get();
            return view('backend.user.index',['data'=>$data]);
        }

        //delete user
        function delete_user($id)
        {
            
            User::where('id',$id)->delete();
            return redirect('admin/user');
        }

        //logout

        function logout()
        {
            session()->forget(['adminData']);
            return redirect('/');
        }
}
 