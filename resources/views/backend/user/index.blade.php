@extends('layout')
  @section('title','All Users')
  @section('content')
         <div class="row">
                   
           <div id="layoutSidenav_content">
               <main>
                   <div class="container-fluid px-4">
                       <h1 class="mt-4">Tables</h1>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                           <li class="breadcrumb-item active">Users</li>
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
                               Users List Table 
                           </div>
                           <div class="card-body">
                               <table id="datatablesSimple">
                                   <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Name</th>
                                           <th>Email</th>
                                           <th>Action</th>
                                           
                                       </tr>
                                   </thead>
                                   <tfoot>
                                   <tr>
                                   <th>#</th>
                                           <th>Name</th>
                                           <th>Email</th>
                                           <th>Action</th>
                                           
                                       </tr>
                                   </tfoot>
                                   <tbody>
                                    @foreach($data as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                       
                                        <td>                                   
                                            <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/user/'.$user->id.'/delete')}}">Delete</a>
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