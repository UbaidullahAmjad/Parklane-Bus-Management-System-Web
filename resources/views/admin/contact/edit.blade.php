@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Contact Update</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Contact Update</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Update</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Contact Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contact.update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Title" value="{{$contact->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="text"  placeholder="Description" required>{{$contact->text}}</textarea>
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
@endsection
