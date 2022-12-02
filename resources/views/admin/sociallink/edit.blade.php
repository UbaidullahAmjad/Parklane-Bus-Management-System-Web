@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Social Link</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Social Link</a></li>
                <li class="breadcrumb-item active" aria-current="page">Social Link</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Social Link</h3>
                    </div>
                    <div class="card-body">
                         <form action="{{route('social-link.update',$sociallink->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" placeholder="heading" value="{{$sociallink->heading}}" >
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Social Title</label>
                                <input type="text" class="form-control" id="social_title" name="social_title" placeholder="social_title" value="{{$sociallink->social_title}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Facebook Link</label>
                                <input type="text" class="form-control" id="social_link1" name="social_link1" placeholder="social_link1" value="{{$sociallink->social_link1}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">FB Description</label>
                                <input type="text" class="form-control" id="social_description1" name="social_description1" placeholder="social_description1" value="{{$sociallink->social_description1}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Twitter Link</label>
                                <input type="text" class="form-control" id="social_link2" name="social_link2" placeholder="social_link2" value="{{$sociallink->social_link2}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Twitter Desc</label>
                                <input type="text" class="form-control" id="social_description2" name="social_description2" placeholder="social_description2" value="{{$sociallink->social_description2}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Google Link</label>
                                <input type="text" class="form-control" id="social_link3" name="social_link3" placeholder="social_link3" value="{{$sociallink->social_link3}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Google desc</label>
                                <input type="text" class="form-control" id="social_description3" name="social_description3" placeholder="social_description3" value="{{$sociallink->social_description3}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Youtube Link</label>
                                <input type="text" class="form-control" id="social_link4" name="social_link4" placeholder="social_link4" value="{{$sociallink->social_link4}}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Youtube desc</label>
                                <input type="text" class="form-control" id="social_description4" name="social_description4" placeholder="social_description4" value="{{$sociallink->social_description4}}">
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
