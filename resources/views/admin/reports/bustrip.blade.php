
@extends('admin.partials.master')
@section('content')
	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Bus Management</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bus Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bus Management</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Bus Vise Report</div>
                            <div class="col-md-11 text-right">
                                <a href="{{route('buses.create')}}" class=" btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                            </div>
                        </div>
                        
                           
                        
                        <div class="card-body">
                            <div class="row" style="display:flex">
                         @foreach($buses as $bus)
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card overflow-hidden">
                            <div class="card-header">
                            <h4 class="card-title font-weight-normal">{{$bus->name}}</h4>
                            <div class="card-options"> <a class="btn btn-sm btn-danger" href="{{route('bus.report',$bus->id)}}">View</a> </div>
                            </div>
                            <div class="card-body ">
                            <h4 class="text-dark  mt-0">Bus NO #{{$bus->plate_no}}</h4>
                            <div class="progress progress-sm mt-0 mb-2">
                            <div class="progress-bar bg-info" role="progressbar"></div>
                            </div>
                            <div class=""><i class="fa fa-caret-up text-success mr-1"></i>No of Seat #{{$bus->no_of_seat}}</div>
                            </div>
                            </div>
                            </div>
                            @endforeach
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
