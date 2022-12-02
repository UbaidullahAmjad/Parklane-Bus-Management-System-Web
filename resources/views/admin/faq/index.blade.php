
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">FAQs</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">FAQs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">FAQs List</div>
                            <div class="col-md-11 text-right">
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
                                            <th>Question</th>
                                            <th>Answers</th>

                                            <th>Active</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($faqs as $faq )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$faq->question}}</td>
                                             <td>{{$faq->answers}}</td>
                                             <td>  @if($faq->active == 1)
                                                <span class="mb-2 mr-2 badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>


                                                <td style=" display: inline-flex">
                                                    <a href="{{route('faqs.edit',$faq->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <form action="{{route('faqs.destroy',$faq->id)}}" method="POST">
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


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">FAQs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('faqs.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Question</label>
                                <input type="text" class="form-control" id="name" name="question" placeholder="Question" required>
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

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Answers</label>
                                <textarea name="answers" cols="100" rows="10" required></textarea>

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
