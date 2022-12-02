@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Background Image</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Background Image</a></li>
                <li class="breadcrumb-item active" aria-current="page">Background Image</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Background Image</h3>
                    </div>
                    <div class="card-body">
<form action="{{route('travel.updating',$travelimg->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @method('PUT')
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Title </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$travelimg->title}}" required>
        </div>

        <div class="form-group col-md-6">
            <label class="col-form-label">Image</label>
            <input type="file" name="img" value="{{$travelimg->image}}" class="form-control @error('img') 
                                      is-invalid
                                    @enderror" id="inputPassword4" placeholder="choose"  >
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
            <!-- <input type="file" class="form-control" name="img" value="{{$travelimg->image}}" > -->
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
