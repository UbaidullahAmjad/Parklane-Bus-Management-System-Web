
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
                            <div class="card-title">Navbar</div>
                            <div class="col-md-11 text-right">
                               <!-- Button trigger modal -->
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email Name</th>
                                            <th>Email Link</th>
                                            <th>Phone</th>
                                           
                                            <th>Facebook link</th>
                                            <th>Twiter link</th>
                                            <th>Youtube link</th>
                                            <th>Google link</th>
                                             <th>Logo</th>
                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                   
                                        
                                             <td>{{$nav->id}}</td>
                                             <td>{{$nav->name}}</td>
                                             <td>{{$nav->link}}</td>
                                             <td>{{$nav->phone}}</td>
                                             <td>{{$nav->link1}}</td>
                                             <td>{{$nav->link2}}</td>
                                             <td>{{$nav->link3}}</td>
                                             <td>{{$nav->link4}}</td>
                                             <td><img src="{{asset($nav->image)}}" width="40"
                                                class="img-circle" /> </td>

                                   
                                         </tr>




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
