<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\category;


class HomeController extends Controller
{


    public function index(Request $request)
    {
       // $posts=Post::orderBy('id','desc')->simplePaginate(1);
       if($request->has('q'))
       {
           $q=$request->q;
        $posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->Paginate(1);
       }
       else
       {
         $posts=Post::orderBy('id','desc')->Paginate(2);
       }
        return view('home',['posts'=>$posts]);
    }




    function details(Request $request,$slug,$postId)
    {
       //update post count
       Post::find($postId)->increment('views');
        $detail=Post::find($postId);
     return view('detail',['detail'=>$detail]);
    }

    //all category
    function all_category()
    {
       $categories=Category::orderBy('id','desc')->Paginate(3); 
       return view('categories',['categories'=>$categories]);
    }

    //all post accoding to the category
    function category(Request $request,$cat_slug,$cat_id)
    {
       $category=category::find($cat_id);
       $post=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(1);
       return view('category',['posts'=>$post,'category'=>$category]);
    }



   //  save comment
    function save_comment(Request $request,$slug,$id)
    {
       $request->validate([
         'comment'=>'required'
       ]);

       $data=new Comment;
       $data->user_id=$request->user()->id;
       $data->post_id=$id;
       $data->comment=$request->comment;
       $data->save();
       return redirect('details/'.$slug.'/'.$id)->with('success','Comment Has been submitted');

    }


    //user submit post
    function save_post_form()
    {
      $cats=Category::all();
      return view('save-post-form',['cats'=>$cats]);
    }


    //save data
    function save_post_data(Request $request)
    {
      $request->validate([
         'title'=>'required',
         'category'=>'required',
         'details'=>'required'
     ]);
     //post Thumbnail
     if($request->hasFile('post_thumb'))
     {
         $image=$request->file('post_thumb');
         $reThumbImage=time().'.'.$image->getClientOriginalExtension();
         $dest=public_path('/imgs/thumb');
         $image->move($dest,$reThumbImage);
     }
     else{
          $reThumbImage='na';
     }

        //post Fullimage
        if($request->hasFile('post_image'))
        {
            $image=$request->file('post_image');
            $reFullImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs/full');
            $image->move($dest,$reFullImage);
        }
        else{
             $reFullImage='na';
        }

     $post=new Post;
     $post->user_id=$request->user()->id;
     $post->cat_id=$request->category;
     $post->title=$request->title;
     $post->thumb=$reThumbImage;
     $post->full_img=$reFullImage;
     $post->details=$request->details;
     $post->tags=$request->tags;
     $post->status=1;

     $post->save();

     return redirect('save-post-form')->with('success','Post has been Added');
    }
    //manage posts
    function manage_post(Request $request)
    {
      $posts=Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
      return view('manage-posts',['posts'=>$posts]);
    }
 }
 

