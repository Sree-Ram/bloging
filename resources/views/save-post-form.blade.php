
@extends('frontlayout')
@section('content')
@section('title','save-post')
    <!-- get latest post     -->
      
            <div class="row">
                <div class='col-md-8 mb-5'>
                   
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Post</h1>
                       
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>

                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                       
                        <div class="row">
                    
                          <form action="{{url('save-post-form')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <table>
                                <tr>
                                        <th>Category<span class="text-danger">*</span></th>
                                        <td>
                                            <select class="form-control" name="category" >
                                                @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title <span class="text-danger">*</span> </th>
                                        <td><input type="text" name='title' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <td><input type="file" name='post_thumb' /></td>
                                    </tr>
                                    <tr>
                                        <th>Full Image</th>
                                        <td><input type="file" name='post_image' /></td>
                                    </tr>
                                    <tr>
                                        <th>Details<span class="text-danger">*</span></th>
                                        <td>
                                            <textarea name="details" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td>
                                            <textarea name="tags" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </form>
                                                    
                              
                       
                    </div>
                </main>
                   
                    
               </div>
            
            <!-- right sidebar -->
             <div class="col-md-4">
                 <!-- search -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <form action="{{url('/')}}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control">
                                <div class="input-group-append">
                                     <button class="btn btn-dark"  type="submit" id="button-addon2">Search</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                 <!-- Recent post -->
                 <div class="card mb-4">
                    <h5 class="card-header">Recent Post</h5>
                    <div class="list-group list-group-flush">
                        @if($recent_posts)
                        @foreach($recent_posts as $post)
                        <a href="{{url('details/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
                        @endforeach
                        @endif
                     


                    </div>
                </div>
                <!-- popular post -->
                <div class="card mb-4">
                    <h5 class="card-header">Popular Post</h5>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item">Post 1</a>
                        <a href="#" class="list-group-item">Post 2</a>


                    </div>
                </div>

             </div>
            </div>
@endSection('content')

