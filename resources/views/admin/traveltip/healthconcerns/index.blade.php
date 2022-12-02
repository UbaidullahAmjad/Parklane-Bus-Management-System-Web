
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">General tip</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">General tip</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General tip</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">General tip</div>
                            <div class="col-md-11 text-right">
                               <!-- Button trigger modal -->
                               {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub title</th>

                                            <th>Description</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>


                                             <td>{{$healthconcern->id ?? ''}}</td>
                                               <td><img src="{{asset($healthconcern->image ?? '')}}" width="60" height="60"></td>
                                             <td>{{$healthconcern->heading ?? ''}}</td>
                                             <td>{{$healthconcern->heading2 ?? ''}}</td>

                                             <td>{{$healthconcern->description ?? ''}}</td>

                                         <td style=" display:flex">
                                                    <a href="{{route('health.edit',$healthconcern->id ?? '')}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <!--<form action="{{route('travel-info.destroy',$healthconcern->id ?? '')}}" method="POST">-->
                                                   <!--   @csrf-->
                                                   <!--   @method('DELETE')-->

                                                   <!--   <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>-->
                                                   <!--</form>-->
                                                </td>


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


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('health.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="heading" name="heading" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Sub title</label>
                                <input type="text" class="form-control" name="heading2"  placeholder="Sub Title">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Description</label>
                            <input type="text" class="form-control" id="inputPassword4" name="description" placeholder="description">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">image</label>
                            <input type="file" class="form-control" name="img" placeholder="history_desc">
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
