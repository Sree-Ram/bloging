   @extends('layout')
 
   @section('content')
          <div class="row">
                    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Post Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">post</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>image</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     @foreach($data as $post)
                                     <tr>
                                         <td>{{$post->id}}</td>
                                         <td>{{$post->category->title}}</td>
                                         <td>{{$post->title}}</td>
                                         <td> <img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width=150px; height=100px; /></td>
                                         <td> <img src="{{ asset('imgs/full').'/'.$post->full_img }}" width=150px; height=100px; /></td>

                                         <td>
                                             <a class="btn btn-primary btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update</a>
                                             <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
                                         </td>
                                     </tr>
                                     @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
      @endsection         