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
                        <form action="{{route('travel-info.update',$generaltravel->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="heading" name="heading" placeholder="Title" value="{{$generaltravel->heading}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Sub title</label>
                                        <input type="text" class="form-control" name="heading2"  placeholder="Sub Title" value="{{$generaltravel->heading2}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Description</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="description" placeholder="description" value="{{$generaltravel->description}}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Mission</label>
                                    <input type="text" class="form-control" name="mission" placeholder="mission" value="{{$generaltravel->mission}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Mission Desc</label>
                                    <input type="text" class="form-control" name="mission_desc" placeholder="mission_desc" value="{{$generaltravel->mission_desc}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Awards</label>
                                    <input type="text" class="form-control" name="awards" placeholder="awards" value="{{$generaltravel->awards}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Awards Desc</label>
                                    <input type="text" class="form-control" name="awards_desc" placeholder="awards_desc" value="{{$generaltravel->awards_desc}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Principles</label>
                                    <input type="text" class="form-control" name="principles" placeholder="principles" value="{{$generaltravel->principles}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Principles Desc</label>
                                    <input type="text" class="form-control" name="principles_desc" placeholder="principles_desc" value="{{$generaltravel->principles_desc}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Histroy</label>
                                    <input type="text" class="form-control" name="history" placeholder="history" value="{{$generaltravel->history}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">History Desc</label>
                                    <input type="text" class="form-control" name="history_desc" placeholder="history_desc" value="{{$generaltravel->history_desc}}" readonly>
                                </div>

                            </div>

                            <!--<div class="modal-footer">-->
                            <!--    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}-->
                            <!--    <button type="submit" class="btn btn-primary">Submit</button>-->
                            <!--  </div>-->
                        </form>

</div>
</div>
</div>

</div>
</div>
@endsection
