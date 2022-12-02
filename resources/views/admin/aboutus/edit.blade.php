
@extends('admin.partials.master')

@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">About US </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">About Us</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>


        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">About Us</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{route('abouts-us.update',$aboutus->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Sub Title</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="sub_title" value="{{$aboutus->sub_title}}" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Main Title</label>
                                <input type="text" class="form-control" id="main_title" name="main_title" placeholder="main_title" value="{{$aboutus->main_title}}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Descover Link</label>
                                <input type="text" class="form-control" id="descover_link" name="descover_link" placeholder="descover_link" value="{{$aboutus->descover_link}}" required>
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Image</label>
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
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" cols="100" rows="10" value="" required>{{$aboutus->description}}</textarea>

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
</div>
@endsection
