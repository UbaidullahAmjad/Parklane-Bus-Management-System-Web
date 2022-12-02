
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Navbar</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Navbar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Navbar</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Navbar</div>
                            <div class="col-md-11 text-right">
                               <!-- Button trigger modal -->
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email Name</th>
                                            <th>Email Link</th>
                                            <th>Phone</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                       @foreach ($navbar as $nav )

                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$nav->name}}</td>
                                             <td>{{$nav->link}}</td>
                                             <td>{{$nav->phone}}</td>
                                             <!--<td><img src="{{asset($nav->image)}}" width="40"-->
                                             <!--   class="img-circle" /> </td>-->

                                     <td style=" display:flex">
                                         <a href="{{route('navbar.show',$nav->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('navbar.edit',$nav->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <!--<form action="{{route('navbar.destroy',$nav->id)}}" method="POST">-->
                                                   <!--   @csrf-->
                                                   <!--   @method('DELETE')-->

                                                   <!--   <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>-->
                                                   <!--</form>-->
                                                </td>

                                       @endforeach
                                         </tr>




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


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('navbar.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Email Name</label>
                                <input type="email" class="form-control" id="name" name="name" placeholder="Email Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Email Link</label>
                                <input type="email" class="form-control" name="link"  placeholder="Link" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Facebook link</label>
                            <input type="text" class="form-control" id="inputPassword4" name="link1" placeholder="Facebook link">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Twiter link</label>
                            <input type="text" class="form-control" id="inputPassword4" name="link2" placeholder="Twiter link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Youtube link</label>
                            <input type="text" class="form-control" id="inputPassword4" name="link3" placeholder="Youtube link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Google link</label>
                            <input type="text" class="form-control" id="inputPassword4" name="link4" placeholder="Google link">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-form-label">logo</label>
                            <input type="file" class="form-control" name="img" required>
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
