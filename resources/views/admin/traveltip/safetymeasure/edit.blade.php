@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Safety Measures</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Safety Measures</a></li>
                <li class="breadcrumb-item active" aria-current="page">Safety Measures</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title"> Safety Measures</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('safety.update',$safetMeasure->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="heading" name="heading" placeholder="Title" value="{{$safetMeasure->heading}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Sub title</label>
                                        <input type="text" class="form-control" name="heading2"  placeholder="Sub Title" value="{{$safetMeasure->heading2}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="input_fields_wrap">
                                    <label for="inputPassword4" class="col-form-label">Description</label>
                                    <!-- <input type="text" class="form-control"  name="description" placeholder="description" value="{{$safetMeasure->description}}"> -->
                                    <textarea class="form-control" name="description" placeholder="description">{{$safetMeasure->description}}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">image</label>
                                    <input type="file" name="img" value="{{$safetMeasure->image}}" class="form-control @error('img') 
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
