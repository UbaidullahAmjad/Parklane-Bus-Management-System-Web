
@extends('admin.partials.master')
@section('content')
	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Users</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> User</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">User List</div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserType</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                         <tr>
                                             <td>{{$loop->index+1}}</td>

                                             <td>{{$user->usertype}}</td>

                                             <td>{{$user->first_name }}</td>
                                             <td>{{$user->last_name}}</td>
                                             <td>{{$user->name}}</td>
                                              <td>{{$user->email}}</td>
                                             <td>{{$user->phone}}</td>
                                              <td>{{$user->address}}</td>

                                            <td style=" display: inline-flex">
                                                <a href="{{route('user.edit',$user->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                               <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                                  @csrf
                                                  @method('DELETE')

                                                  <button type="submit" style="margin: 2px;" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                               </form>
                                            </td>
                                         </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- table-wrapper -->
                    </div>
                    <!-- section-wrapper -->
                </div>

            </div>
        </div>
    </div>
@endsection
