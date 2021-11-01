<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=Post::all();
        return view('backend.post.index',['data'=>$data],);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::all();
        return view('backend.post.add',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $post->user_id=0;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->details=$request->details;
        $post->tags=$request->tags;

        $post->save();
 
        return redirect('admin/post/create')->with('success','Data has been Added');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=Category::all();
        $data=Post::find($id);
        return view('backend.post.update',['cats'=>$cats,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
             $reThumbImage=$request->post_thumb;
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
                $reFullImage=$request->post_image;
           }
 
        $post=Post::find($id);
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->details=$request->details;
        $post->tags=$request->tags;

        $post->save();
 
        return redirect('admin/post/'.$id.'/edit')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        

        return redirect('admin/post');
    }
}