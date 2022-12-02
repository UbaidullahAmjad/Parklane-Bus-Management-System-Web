
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
            <!--/Page-Header-->

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
                        <div class="card-body">
                                <a colspan="8" class="col-md-11 text-right" id="button" onclick="printpage()" id="printpagebutton">
                            <button type="button" class="btn btn-warning" onclick="printpage()"><i
                                    class="icon icon-printer"></i></button>
                            </a>
                                   <a href="#" class="btn btn-success" onclick="viewDetailOfSale('{{$bus->id}}')">Daily Report</a>
                                   <a href="#" class="btn btn-primary" id="weekly" onclick="weekly('{{$bus->id}}')">Weekly Report</a>
                                   <a href="#" class="btn btn-info" id="monthly" onclick="monthly('{{$bus->id}}')">Monthly Report</a>

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Booking NO#</th>
                                            <th>BusTrip ID</th>
                                            <th>Pick Up</th>
                                            <th>Drop Off</th>
                                            <th>No 0f Seat</th>
                                            <th>User Name</th>



                                            <!--<th>Action</th>-->

                                        </tr>
                                    </thead>
                                    <tbody id="showBooking">
                                       @foreach ($bustrip as $book )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                              <td>{{$book->booking_no}}</td>
                                             <td>{{$book->bustrip_id}}</td>
                                             <td>{{$book->pickup_location }}</td>
                                             <td>{{$book->drop_off_location}}</td>

                                             <td>{{$book->seat_no}}</td>
                                              <td>{{$book->name}}</td>




                                                <!--<td style=" display: inline-flex" id="printpagebutton">-->
                                                <!--    <a href="{{route('booking.edit',$book->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>-->
                                                <!--     <a href="{{route('bustrip.more.details',$book->id)}}" style="margin: 2px;" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>-->

                                                <!--</td>-->
                                         </tr>

                                       @endforeach
                                        <tfoot>
                                         <tr>
                                             <td>Total Trip </td>
                                           <td colspan="4">{{$count}}</td>
                                         </tr>
                                        </tfoot>




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




<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
         //Daily report

        function viewDetailOfSale(id){
        var _token = $('input[name="_token"]').val();
        var id=id;
        $.ajax({
        type:"post",
        url:"{{ route('daily.report') }}",
        data:{id:id,_token:_token},
        success: function(data){
            console.log(data);
                $('#showBooking').html(data.temp);
                $("#count").html(data.count);

        },error:function(error){
        console.log(error);
        }
        });
        }

          //Weekly report
            function weekly(id)
          {
            var _token = $('input[name="_token"]').val();
             var id=id;
            $.ajax({
                type:"post",
                url: "{{ route('weekly.report') }}",
                data:{id:id,_token:_token},
            success: function(data)
            {
                 $('#showBooking').html(data.temp);
                $("#count").html(data.count);
            }

            });
          }

          //MOnthly report
            function monthly(id)
          {
                var _token = $('input[name="_token"]').val();
                var id = id;

                $.ajax({
                    type:"post",
                    url: "{{ route('monthly.report') }}",
                    data:{id:id,_token:_token},


            success: function(data)
            {
                  $('#showBooking').html(data.temp);
                $("#count").html(data.count);
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
