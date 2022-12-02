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
                            <!--<div class="col-md-10 text-right">-->
                                
                            <!--    <a type="button" class="btn btn-primary" href="{{route('booking.create')}}">-->
                            <!--    <i class="fa fa-plus-circle"></i>-->
                            <!--    </a>-->
                            <!--</div>-->
                        </div>
                     @if(Session::has('status'))
    	             	<p class="alert alert-info">{{ Session::get('status') }}</p>
                  
               		@endif
           		 @if(Session::has('error'))
	          	<p class="alert alert-danger">{{ Session::get('error') }}</p>
              
           		@endif

                        <div class="card-body">
               
                <a colspan="8" class="col-md-11 text-right" id="button" onclick="printpage()" id="printpagebutton">
            <button type="button" class="btn btn-warning" onclick="printpage()"><i
                    class="icon icon-printer"></i></button>
            </a>
             <!--<a href="#" class="btn btn-info" id="bustrip_id" name="bustrip_id">Confirm</a>-->
             <input type="hidden" name="bustrip_id" id="bustrip_id">
            <select class="form-control" name="buses" id="buses">
                <option> Select the bus...</option>
                @foreach ($buses as $bu )
                <option value="{{$bu->id}}"><strong>{{$bu->name}}</strong></option>
                @endforeach
            </select>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PickUp Date</th>
                            <th>PickUp Time</th>
                            <th>Bus Name</th>
                            <th>Pickup Location</th>
                            
                            <th>Drop Off Location</th>
                            <th>Drop Off Date</th>
                          
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="showBooking">
                    

                    </tbody>
                </table>
            </div>
        </div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(document).ready(function() {

            $('#buses').change(function(){
                var bus_id = document.getElementById("buses").value;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('buses.show') }}",
                    type: 'post',
                    data:{ bus_id:bus_id, _token: _token},

                    success: function(data) {
                        // console.log(data);
                        $('#showBooking').html(data.temp);
                        //  $("#count").html(data.count);
                        
                        // alert(rowCount);
                    }

                });
            });
        });
    </script>
    
   

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

 <script>
            function printpage() {

                //Get the print button and put it into a variable
                var printButton = document.getElementById("printpagebutton");


                window.print()


            }

        </script>


@endsection
