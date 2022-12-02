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

                        <div class="card-body">
                                <a colspan="8" class="col-md-11 text-right" id="button" onclick="printpage()" id="printpagebutton">
                                <button type="button" class="btn btn-warning" onclick="printpage()"><i
                                    class="icon icon-printer"></i></button>
                            </a>
                                 <a href="#" class="btn btn-primary" id="monday" onclick="mondayTrip('{{$bus->id}}')">Monday</a>
                                   <a href="#" class="btn btn-info" id="tuesday" onclick="tuesdayTrip('{{$bus->id}}')">Tuesday</a>
                                      <a href="#" class="btn btn-primary"  onclick="wednesdayTrip('{{$bus->id}}')">Wednesday</a>
                                   <a href="#" class="btn btn-info" onclick="thursdayTrip('{{$bus->id}}')">Thuresday</a>
                                      <a href="#" class="btn btn-primary" onclick="fridayTrip('{{$bus->id}}')">Friday</a>
                                   <a href="#" class="btn btn-info" onclick="saturdayTrip('{{$bus->id}}')">Satureday</a>
                                      <a href="#" class="btn btn-primary" onclick="sundayTrip('{{$bus->id}}')">Sunday</a>
                                   
                                   
                            <div class="table-responsive">
                                  <br>
                                  <h3 id="days"></h3>
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Booking NO#</th>
                                            <th>BusTrip ID</th>
                                            <th>Pick Up</th>
                                            <th>Drop Off</th>
                                            <th>No 0f Seat</th>
                                            <th>Status</th>
                                            <th>User Name</th>



                                        </tr>
                                    </thead>
                                    <tbody id="showBooking">
                                       
                                       @foreach ($busWiseTrip as $book )
                                       
                                         @php $user = App\Models\User::find($book->user_id); @endphp
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                              <td>{{$book->booking_no}}</td>
                                             <td>{{$book->bustrip_id}}</td>
                                             <td>{{$book->pickup_location }}</td>
                                             <td>{{$book->drop_off_location}}</td>

                                             <td>{{$book->seat_no}}</td>
                                             <td>@if ($book->active==1)
                                                <span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                @else
                                                <span class="badge badge-danger">Free</span>
                                             @endif
                                                </td>
                                              <td>{{$user->name}}</td>




                                             
                                         </tr>

                                       @endforeach
                                        <tfoot>
                                         <tr>
                                             <td>Total Trip </td>
                                         <td id="count" colspan="4"></td>
                                         </tr>
                                        </tfoot>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                         
                    </div>
                     
                </div>

            </div>
        </div>
    </div>

   



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
         //MOnady report

        function mondayTrip(id){
        var _token = $('input[name="_token"]').val();
        var id=id;
        $.ajax({
        type:"post",
        url:"{{ route('monday.trip') }}",
        data:{id:id,_token:_token},
        success: function(data){
            console.log(data);
                $('#showBooking').html(data.temp);
                $("#days").html(data.monday);

        },error:function(error){
        console.log(error);
        }
        });
        }

          //Tuesday report
        function tuesdayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('tuesday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                $("#days").html(data.tuesday);
            }

            });
          }
          //Wednesday
          function wednesdayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('wednesday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                 $("#days").html(data.wednesday);
            }

            });
          }
         /// Thursday
          function thursdayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('thursday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                $("#days").html(data.thursday);
            }

            });
          }
         /// Friday 
          function fridayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('friday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                $("#days").html(data.friday);
            }

            });
          }
         /// Satureday
          function saturdayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('saturday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                $("#days").html(data.saturday);
            }

            });
          }
          //sunday
            function sundayTrip(id)
          {
              
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('sunday.trip') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
               $("#days").html(data.sunday);
            }

            });
          }
  </script>
 <script>
            function printpage() {

                //Get the print button and put it into a variable
                var printButton = document.getElementById("printpagebutton");


                window.print()


            }

        </script>


@endsection
