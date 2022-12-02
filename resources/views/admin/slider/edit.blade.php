@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Slider Edit</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Slider Edit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider Edit</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Slider Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Heading</label>
                                        <input type="text" class="form-control" id="name" name="heading" placeholder="Heading" value="{{$slider->heading}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Sub Heading</label>
                                        <input type="text" class="form-control" name="heading2"  placeholder="Sub Heading" value="{{$slider->heading}}" required>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label class="form-label" for="exampleInputEmail1">Sider Image</label>
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
