
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
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Bus List</div>
                            <div class="col-md-11 text-right">
                                <a href="{{route('buses.create')}}" class=" btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bus name</th>
                                            <th>Type</th>
                                            <th>Base Rate</th>
                                            <th>No. of Seat</th>
                                            <th>plate No.</th>
                                            <th>image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buses as $bus)
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$bus->name}}</td>
                                             @php
                                             $type = \App\Models\busType::where('id',$bus->busType_id)->first();
                                             @endphp
                                             <td>{{$type->name}}</td>
                                             <td>{{$bus->base_rate}}</td>
                                             <td>{{$bus->no_of_seat}}</td>
                                           
                                             <td>{{$bus->plate_no}}</td>
                                             <td> <img src="{{ asset($bus->image) }}" alt="user" width="40"
                                                class="img-circle" /> </td>
                                            <td style=" display: inline-flex">
                                                <a href="{{route('buses.edit',$bus->id)}}" style="margin: 2px;"  class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                               <form action="{{route('buses.destroy',$bus->id)}}" method="POST">
                                                  @csrf
                                                  @method('DELETE')

                                                  <button type="submit" style="margin: 2px;" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                               </form>
                                            </td>
                                         </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- table-wrapper -->
                    </div>
                    <!-- section-wrapper -->
                </div>

            </div>
        </div>
    </div>
@endsection
