
@extends('frontlayout')
@section('content')
@section('title','Home Page')
    <!-- get latest post     -->
        
            <div class="row">
                <div class='col-md-8'>
                    <div class="row">
                     @if(count($posts)>0)
                         @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card">
                             <a href="{{url('details/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('imgs/thumb/'.$post->thumb)}}"
                              class="card-img-top" alt="{{$post->title}}"></a>
                                <div class="card-body">
                                 <h5 class="card-title"> <a href="{{url('details/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a> </h5>
                                </div>
                            </div>
                        </div>
                         @endforeach
                     @else
                     <p class="alert alert-danger">No Post Found</p>
                     @endif
                    </div> 
                     <!--pagination  -->
                     {{$posts->links()}}
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
                        <a href="#" class="list-group-item">{{$post->title}}</a>
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

