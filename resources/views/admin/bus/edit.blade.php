
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
                        <h3 class="card-title">Edit Buses</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('buses.update',$bus->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Bus type</label>
                                        <select class="form-control" name="busType_id">
                                               @foreach ($bustype as $type )
                                                <option value="{{$type->id}}"{{$type->id==$bus->busType_id ? 'selected' : ''}}>{{$type->name}}</option>
                                               @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Bus Name</label>
                                        <input type="text" class="form-control @error('name')
                                            is-invalid
                                        @enderror" id="name" name="name" placeholder="First Name" value="{{$bus->name}}">
                                     @error('name')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">No of Seat</label>
                                        <input type="number" class="form-control @error('no_of_seat')

                                        @enderror" name="no_of_seat"  placeholder="Number of Seat" value="{{$bus->no_of_seat}}">

                                   @error('no_of_seat')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Plate No#</label>
                                    <input type="text" class="form-control @error('plate_no')

                                    @enderror" name="plate_no" placeholder="plate no" value="{{$bus->plate_no}}">
                                     @error('plate_no')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="form-label">Base Rate</label>
                                    <input type="number" class="form-control @error('base_rate')

                                    @enderror" id="inputPassword4" name="base_rate" placeholder="base_rate" value="{{$bus->base_rate}}">
                                     @error('base_rate')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                             

                            </div>
                            <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="form-label">Bus Image</label>
                                    <input type="file" name="img" class="form-control @error('img')
                                   is-invalid
                                    @enderror" placeholder="choose" >
                                  @error('img')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                            <button type="submit" class="btn btn-primary ">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
