
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">background Image</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Background Image</a></li>
                    <li class="breadcrumb-item active" aria-current="page">backgorund Image</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">BG Image</div>
                            {{-- <div class="col-md-11 text-right">
                                <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 <i class="fa fa-plus-circle"></i>
                                 </button>
                             </div> --}}
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>title</th>

                                            <th>image</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                       @foreach ($travelimage as $image )

                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$image->title}}</td>

                                             <td><img src="{{asset($image->image)}}" width="60"
                                              class="img-circle" /> </td>

                                           <td style=" display:flex">
                                                    <a href="{{route('travelimg.edit',$image->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                   {{-- <form action="{{route('travelimg.destroy',$image->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')

                                                      <button type="submit" class="btn btn-xs btn-danger" style="margin: 2px;"><i class="fa fa-trash"></i></button>
                                                   </form> --}}
                                                </td>

                                       @endforeach
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
                <form action="{{route('travelimg.imgstore')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label class="col-form-label">Background Image</label>
                            <input type="file" class="form-control" name="img" required>
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
