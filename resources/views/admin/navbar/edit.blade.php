@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Navbar Edit</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Navbar Edit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Navbar Edit</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Navbar Edit</h3>
                    </div>
                    <div class="card-body">
<form action="{{route('navbar.update',$navbar->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
     @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <div class="form-group">
                <label class="form-label" for="exampleInputEmail1">Email Name</label>
                <input type="email" class="form-control" id="name" name="name" placeholder="Email Name" value="{{$navbar->name}}" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label class="form-label" for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" name="link"  placeholder="Link" value="{{$navbar->link}}"  required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{$navbar->phone}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Facebook </label>
            <input type="text" class="form-control" id="inputPassword4" name="link1" placeholder="Facebook link" value="{{$navbar->link1}}">
        </div>

        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Twiter </label>
            <input type="text" class="form-control" id="inputPassword4" name="link2" placeholder="Twiter link" value="{{$navbar->link2}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Youtube </label>
            <input type="text" class="form-control" id="inputPassword4" name="link3" placeholder="Youtube link" value="{{$navbar->link3}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Google </label>
            <input type="text" class="form-control" id="inputPassword4" name="link4" placeholder="Google link" value="{{$navbar->link4}}">
        </div>

        <div class="form-group col-md-6">
            <label class="col-form-label">logo</label>
            <input type="file" class="form-control" name="img" >
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
