    @extends('layout')
    @section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Post</h1>
                       
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>

                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                       
                        <div class="row">
                    
                          <form  method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @method('put')
                                <table>
                                <tr>
                                        <th>Category<span class="text-danger">*</span></th>
                                        <td>
                                            <select class="form-control" name="category" >
                                                @foreach($cats as $cat)
                                                    @if($cat->id==$data->cat_id)
                                                    <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                                    @else
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><input type="text" name='title' value="{{$data->title}}" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Thumb</th>
                                        <td>
                                        <p class="my-2"><img width="80" src="{{asset('imgs/thumb')}}/{{$data->thumb}}" /></p>   
                                        <input type="hidden" value="{{$data->thumb}}" name="post_thumb"> 
                                        <input type="file" name='post_thumb' />
                                    </td>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                        <p class="my-2"><img width="80" src="{{asset('imgs/full')}}/{{$data->full_img}}" /></p>   
                                        <input type="hidden" value="{{$data->full_img}}" name="post_image"> 
                                        <input type="file" name='post_image' />
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Details<span class="text-danger">*</span></th>
                                        <td>
                                            <textarea name="details" class="form-control">{{$data->details}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td>
                                            <textarea name="tags" class="form-control">{{$data->tags}}</textarea>
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
    @endsection           