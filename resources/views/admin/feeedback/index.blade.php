
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Feedback</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Feedback</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Feedback</div>
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
                                            <th>Pick Up</th>
                                            <th>Drop Off</th>
                                            <th>Pickup Date </th>
                                            <th>Pickup Time</th>
                                            <th>Drop off Date</th>
                                            <th>Drop off Time</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       @foreach ($bustrip as $bustri )
                                       <tr>
                                           <td>{{$loop->index+1}}</td>
                                       <td>{{$bustri->pickup_location }}</td>
                                       <td>{{$bustri->drop_off_location}}</td>
                                       <td>{{$bustri->pickup_date}}</td>
                                        <td>{{$bustri->pickup_time}}</td>
                                       <td>{{$bustri->drop_off_date}}</td>
                                        <td>{{$bustri->drop_off_time}}</td>
                                        <td> <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $bustri->averageRating }}" data-size="xs" disabled="">
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
