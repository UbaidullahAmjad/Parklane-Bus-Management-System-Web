@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Make Book Edit</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Make Book Edit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Make Book Edit</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Make Book Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('make-booking.update',$makebook->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Main Heading</label>
                                        <input type="text" class="form-control" id="name" name="heading" placeholder="mainHeading" value="{{$makebook->heading}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Heading</label>
                                        <input type="text" class="form-control" name="heading1"  placeholder="Heading" value="{{$makebook->heading1}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Sub Heading</label>
                                    <input type="text" class="form-control" name="subHeading" placeholder="subHeading" value="{{$makebook->subHeading}}" required>
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
