@extends('admin.partials.master')
@section('content')
<style type="text/css">
    @media print {
        #printpagebutton {
            display :  none;
        }
    }
    </style>
	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"> Bus Trips</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Bus Trips</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Bus Trips</li>
                </ol>
            </div>
           
  <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">BusTrip Details</div>
                            <div class="col-md-10 text-right">
                                <!--Button trigger modal -->
                                <a type="button" class="btn btn-primary" href="{{route('booking.create')}}">
                                <i class="fa fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        @if(Session::has('status'))
	          	<p class="alert alert-info">{{ Session::get('status') }}</p>
              
           		@endif
           		@if(Session::has('error'))
	          	<p class="alert alert-warning">{{ Session::get('error') }}</p>
              
           		@endif
           		

                        <div class="card-body">
               
                <a href="{{route('complete.trip',$bustrip->id)}}" class="btn btn-info">complete the Ride</a>
          
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>booking_no</th>
                            <th>seat_no</th>
                            <th>total_price</th>
                            <th>user_id</th>
                            
                            <th>bustrip_id</th>
                            <th>confirmation_code</th>
                           <th>status</th>
                           <th>active</th>
                           

                        </tr>
                    </thead>
                    <tbody id="showBooking">
                      @foreach($booking as $book)
                         <tr>
                             <td>{{$book->id}}</td>
                             <td>{{$book->booking_no}}</td>
                              <td>{{$book->seat_no}}</td>
                               <td>{{$book->total_price}}</td>
                                <td>{{$book->user_id}}</td>
                                 <td>{{$book->bustrip_id}}</td> 
                                 <td>{{$book->confirmation_code}}</td>
                                  <td>{{$book->status}}</td>
                                  <td>{{$book->active}}</td>
                         </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
		</div>
	</div>



@endsection
