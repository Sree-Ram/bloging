        @extends('layout')
        @section('content')
            <div id="layoutSidenav_content">
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
                    
                          <form action="{{url('admin/post')}}" method="post" enctype="multipart/form-data">
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
        @endsection