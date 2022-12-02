
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Slider</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Slider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Slider List</div>
                            <div class="col-md-11 text-right">
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Heading</th>
                                            <th>Sub Heading</th>

                                            <th>image</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($slider as $slid )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$slid->heading}}</td>
                                             <td>{{$slid->heading2}}</td>

                                             <td><img src="{{asset($slid->image)}}" width="40"
                                                class="img-circle" /> </td>


                                                <td style=" display:flex">
                                                    <a href="{{route('slider.edit',$slid->id)}}"  style="margin: 2px;"class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <form action="{{route('slider.destroy',$slid->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')

                                                      <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                   </form>
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
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Heading</label>
                                <input type="text" class="form-control" id="name" name="heading" placeholder="Heading" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Sub Heading</label>
                                <input type="text" class="form-control" name="heading2"  placeholder="Sub Heading" required>
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label class="col-form-label">Image</label>
                            <input type="file" name="img" class="form-control @error('img')
                                      is-invalid
                                    @enderror" id="inputPassword4" placeholder="choose"  >
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
