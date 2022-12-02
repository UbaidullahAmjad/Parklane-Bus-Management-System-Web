@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Bus Category</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bus Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bus Category</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Update Bus  Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bus-type.update',$bustype->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$bustype->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="active">

                                                <option value="1">Active</option>
                                                <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>

</div>
</div>
</div>

</div>
</div>
@endsection
