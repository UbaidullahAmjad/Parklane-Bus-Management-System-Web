@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Health Concern</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Health Concern</a></li>
                <li class="breadcrumb-item active" aria-current="page">Health Concern</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Health Concern</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('health.update',$healthconcern->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="heading" name="heading" placeholder="Title" value="{{$healthconcern->heading}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Sub title</label>
                                        <input type="text" class="form-control" name="heading2"  placeholder="Sub Title" value="{{$healthconcern->heading2}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="form-label">Description</label>
                                    <textarea class="form-control" id="inputPassword4" name="description" placeholder="description">{{$healthconcern->description}}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">image</label>
                                    <input type="file" name="img" value="{{$healthconcern->image}}" class="form-control @error('img') 
                                      is-invalid
                                    @enderror" id="inputPassword4" placeholder="choose"  >
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- <input type="file" class="form-control" name="img" placeholder="history_desc" value="{{$healthconcern->image}}"> -->
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
