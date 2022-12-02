
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Make Your Booking</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Make Your Booking</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Make Your Booking</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Make Your Booking</div>
                          
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Main Heading</th>
                                            <th>Heading</th>
                                            <th>Sub Heading</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($makeYourBooking as $makebook )
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$makebook->heading}}</td>
                                            <td>{{$makebook->heading1}}</td>
                                            <td>{{$makebook->subHeading}}</td>
                                            <td style=" display:flex">
                                                <a href="{{route('make-booking.edit',$makebook->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                               <!--<form action="{{route('make-booking.destroy',$makebook->id)}}" method="POST">-->
                                               <!--   @csrf-->
                                               <!--   @method('DELETE')-->

                                               <!--   <button type="submit" style="margin: 2px;" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>-->
                                               <!--</form>-->
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


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('make-booking.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Main Heading</label>
                                <input type="text" class="form-control" id="name" name="heading" placeholder="mainHeading">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Heading</label>
                                <input type="text" class="form-control" name="heading1"  placeholder="Heading">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">Sub Heading</label>
                            <input type="text" class="form-control" name="subHeading" placeholder="subHeading">
                        </div>
                     </div>

                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </div>


@endsection
