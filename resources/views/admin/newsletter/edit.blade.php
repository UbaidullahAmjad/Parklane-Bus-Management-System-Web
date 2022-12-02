@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Newsletter</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Newsletter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Newsletter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('newsletter.update',$newsletter->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="email" value="{{$newsletter->email}}" name="email" placeholder="Email" required>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
</div>
</div>
</div>

</div>
</div>
@endsection
