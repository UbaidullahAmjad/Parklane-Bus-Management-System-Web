
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Navbar</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Navbar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Navbar</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Bus List</div>
                            <div class="col-md-11 text-right">
                               {{-- <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i>
                                </button> --}}
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Email</th>
                                            <th>Message</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($query as $quer )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$quer->name}}</td>
                                             <td>{{$quer->phone}}</td>
                                             <td>{{$quer->subject}}</td>
                                             <td>{{$quer->email}}</td>
                                             <td>{{$quer->message}}</td>

                                                <td style=" display:flex">
                                                    <a href="{{route('query.edit',$quer->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <form action="{{route('query.destroy',$quer->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')

                                                      <button type="submit"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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
