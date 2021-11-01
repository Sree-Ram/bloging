    @extends('layout')
    @section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Category</h1>
                       
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>

                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                       
                        <div class="row">
                    
                          <form  method="post" action="{{url('admin/category/'.$data->id)}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @method('put')
                                <table>
                                    <tr>
                                        <th>Title</th>
                                        <td><input type="text" name='title' value="{{$data->title}}" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <td><input type="text" name='details' value="{{$data->details}}" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                        <p class="my-2"><img width="80" src="{{asset('imgs')}}/{{$data->image}}" /></p>   
                                        <input type="hidden" value="{{$data->image}}" name="cat_image"> 
                                        <input type="file" name='cat_image' />
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