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
                        <form action="{{route('faqs.update',$faqs->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Question</label>
                                        <input type="text" class="form-control" id="name" value="{{$faqs->question}}" name="question" placeholder="Question" required>
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

                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Answers</label>
                                        <textarea name="answers" class="form-control" value="" cols="100" rows="10" required>{{$faqs->answers}}</textarea>

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
