@extends('layout')
        @section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Setting</h1>
                       
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>

                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                       
                        <div class="row">
                    
                          <form action="{{url('admin/setting')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <table>
                               
                                    <tr>
                                        <th>Comment Auto Approve </th>
                                        <td><input @if($setting) value="{{$setting->comment_auto}}" @endif type="text" name='comment_auto' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>User Auto Approve</th>
                                        <td><input @if($setting) value="{{$setting->user_auto}}" @endif type="text" name='user_auto' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Recent Post Limit</th>
                                        <td><input @if($setting) value="{{$setting->recent_limit}}" @endif type="text" name='recent_limit' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Popular Post Limit</th>
                                        <td><input @if($setting) value="{{$setting->popular_limit}}" @endif type="text" name='popular_limit' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Recent Comments Limit</th>
                                        <td><input @if($setting) value="{{$setting->recent_comment_limit}}" @endif type="text" name='recent_comment_limit' class="form-control"/></td>
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