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
                    
                          <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <table>
                                    <tr>
                                        <th>Title<span class="text-danger">*</span></th>
                                        <td><input type="text" name='title' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <td><input type="text" name='details' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name='cat_image' /></td>
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