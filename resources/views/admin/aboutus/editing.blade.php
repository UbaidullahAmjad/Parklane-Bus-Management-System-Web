
@extends('admin.partials.master')

@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Bus Management</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bus Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bus Management</li>
            </ol>
        </div>


        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Add Buses</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{route('abouts.updating',$aboutuss->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-row">
    
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Image</label>
                                <input type="file" name="img" class="form-control @error('img')
                                      is-invalid
                                    @enderror" id="inputPassword4" placeholder="choose"  >
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

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
</div>
@endsection
