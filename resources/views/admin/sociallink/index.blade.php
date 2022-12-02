
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
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Social Link</div>
                            <!--<div class="col-md-11 text-right">-->
                               <!-- Button trigger modal -->
                            <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                            <!--    <i class="fa fa-plus-circle"></i>-->
                            <!--    </button>-->
                            <!--</div>-->
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>heading</th>
                                            <th>social_title</th>
                                            <th>Facebook Link</th>
                                            <th>Facebook Desc</th>
                                            <th>Twitter Link</th>
                                            
                                        

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($sociallink as $social )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$social->heading}}</td>
                                             <td>{{$social->social_title}}</td>
                                             <td>{{$social->social_link1}}</td>
                                             <td>{{$social->social_description1}}</td>
                                             <td>{{$social->social_link2}}</td>
                                        
                                             

                                                <td style=" display: inline-flex">
                                                    <a href="{{route('social-link.show',$social->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                                     <a href="{{route('social-link.edit',$social->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <form action="{{route('social-link.destroy',$social->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')

                                                      <button type="submit"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Social Link</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('social-link.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" placeholder="heading">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Social Title</label>
                                <input type="text" class="form-control" id="social_title" name="social_title" placeholder="social_title">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Facebook Link</label>
                                <input type="text" class="form-control" id="social_link1" name="social_link1" placeholder="social_link1">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">FB Description</label>
                                <input type="text" class="form-control" id="social_description1" name="social_description1" placeholder="social_description1">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Twitter Link</label>
                                <input type="text" class="form-control" id="social_link2" name="social_link2" placeholder="social_link2">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Twitter Desc</label>
                                <input type="text" class="form-control" id="social_description2" name="social_description2" placeholder="social_description2">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Google Link</label>
                                <input type="text" class="form-control" id="social_link3" name="social_link3" placeholder="social_link3">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Google desc</label>
                                <input type="text" class="form-control" id="social_description3" name="social_description3" placeholder="social_description3">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Youtube Link</label>
                                <input type="text" class="form-control" id="social_link4" name="social_link4" placeholder="social_link4">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Youtube desc</label>
                                <input type="text" class="form-control" id="social_description4" name="social_description4" placeholder="social_description4">
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
