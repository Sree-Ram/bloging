
@extends('frontlayout')
@section('content')
@section('title','manage-post')
    <!-- get latest post     -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   

        
            <div class="row">
                <div class='col-md-8 mb-5'>
                   
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Post</h1>
                       <div class="table-responsive">
                           <table class="table table-bordered">
                           <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Image</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>image</th>
                                            
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     @foreach($posts as $post)
                                     <tr>
                                         <td>{{$post->id}}</td>
                                         <td>{{$post->category->title}}</td>
                                         <td>{{$post->title}}</td>
                                         <td> <img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width=150px; height=100px; /></td>
                                         <td> <img src="{{ asset('imgs/full').'/'.$post->full_img }}" width=150px; height=100px; /></td>

                                     </tr>
                                     @endforeach
                                        
                                    </tbody>
                           </table>
                       </div>
                                 
                       
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

