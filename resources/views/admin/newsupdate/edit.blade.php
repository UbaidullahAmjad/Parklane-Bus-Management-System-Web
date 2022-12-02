@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">News Update</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">News Update</a></li>
                <li class="breadcrumb-item active" aria-current="page">News Update</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">News Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('news-update.update',$newsUpdate->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Heading</label>
                                        <input type="text" class="form-control" id="heading" name="heading" placeholder="heading" value="{{$newsUpdate->heading}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Main Heading</label>
                                        <input type="text" class="form-control" name="heading1"  placeholder="main heading" value="{{$newsUpdate->heading1}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$newsUpdate->title}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="description">{{$newsUpdate->description}} </textarea>                              </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Title 2</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="title 2" value="{{$newsUpdate->title2}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Description2</label>
                                    <textarea class="form-control" id="description2" name="description2" placeholder="description 2">{{$newsUpdate->description2}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Title 3</label>
                                    <input type="text" class="form-control" id="title3" name="title3" placeholder="Title 3" value="{{$newsUpdate->title3}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Description 3</label>
                                    <textarea class="form-control" id="description3" name="description3" placeholder="description 3">{{$newsUpdate->description3}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Image</label>
                                    <!-- <input type="file" class="form-control" name="img" value="{{$newsUpdate->image}}"> -->
                                    <input type="file" name="img" value="{{$newsUpdate->image}}" class="form-control @error('img') 
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
