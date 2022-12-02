
@extends('admin.partials.master')

@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">News Update </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">News Update </a></li>
                    <li class="breadcrumb-item active" aria-current="page">News Update </li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">News Update </div>
                            <div class="col-md-9 text-right">
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Heading</th>
                                            <th>Main Heading</th>
                                            <th>Title1</th>
                                            <th>Desc1</th>
                                            <th>Title2</th>
                                            <th>Desc2</th>
                                            <th>Title3</th>
                                            <th>Desc3</th>
                                            <th>image</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($newsUpdate as $newsUp)
                                         <tr>


                                             <td>{{$newsUp->id ?? ''}}</td>
                                             <td>{{$newsUp->heading ?? '' }}</td>
                                             <td>{{$newsUp->heading1 ?? '' }}</td>
                                             <td>{{$newsUp->title ?? ''}}</td>
                                             <td>{{$newsUp->descripton ?? ''}}</td>

                                             <td>{{$newsUp->title2 ?? ''}}</td>
                                             <td>{{$newsUp->descripton2 ?? ''}}</td>

                                             <td>{{$newsUp->title3 ?? ''}}</td>
                                             <td>{{$newsUp->descripton3 ?? ''}}</td>

                                             <td><img src="{{asset($newsUp->image ?? '')}}" width="40"
                                             class="img-circle" /> </td>

                                           <td>
                                               <a href="{{route('news-update.edit',$newsUp->id ?? '')}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>
                                               </a>
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
          <h5 class="modal-title" id="exampleModalLabel">News Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('news-update.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" placeholder="heading" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Main Heading</label>
                                <input type="text" class="form-control" name="heading1"  placeholder="main heading" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Title 2</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Description2</label>
                            <input type="text" class="form-control" id="description2" name="description2" placeholder="description 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Title 3</label>
                            <input type="text" class="form-control" id="title3" name="title3" placeholder="Title 3">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">Description 3</label>
                            <input type="text" class="form-control" id="description3" name="description3" placeholder="description 3">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Image</label>
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
