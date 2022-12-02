
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">About</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">About</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">About </div>
                            <!--<div class="col-md-11 text-right">-->
                               <!-- Button trigger modal -->
                            <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                            <!--    <i class="fa fa-plus-circle"></i>-->
                            <!--    </button>-->
                            <!--</div>-->
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($about as $abou )
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$abou->name}}</td>
                                            <td>{{$abou->text}}</td>
                                            <td style=" display:flex">
                                                <a href="{{route('about.edit',$abou->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                               <!--<form action="{{route('about.destroy',$abou->id)}}" method="POST">-->
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Main Title</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" name="text"  placeholder="Heading">
                            </div>
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
