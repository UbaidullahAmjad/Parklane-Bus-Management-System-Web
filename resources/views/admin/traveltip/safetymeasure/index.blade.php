
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Safety Measure</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">General tip</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General tip</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">General tip</div>
                            <div class="col-md-11 text-right">
                               <!-- Button trigger modal -->
                               <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                               <!-- <i class="fa fa-plus-circle"></i>-->
                               <!-- </button>-->
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub title</th>

                                            <th>Description</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>


                                             <td>{{$safetMeasure->id ?? ''}}</td>
                                               <td><img src="{{asset($safetMeasure->image ?? '')}}" width="60"></td>
                                             <td>{{$safetMeasure->heading ?? ''}}</td>
                                             <td>{{$safetMeasure->heading2 ?? ''}}</td>

                                             <td>{{$safetMeasure->description ?? ''}}</td>

                                         <td style=" display:flex">
                                                    <a href="{{route('safety.edit',$safetMeasure->id ?? '')}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <!--<form action="{{route('safety.destroy',$safetMeasure->id ?? '')}}" method="POST">-->
                                                   <!--   @csrf-->
                                                   <!--   @method('DELETE')-->

                                                   <!--   <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>-->
                                                   <!--</form>-->
                                                </td>


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
                <form action="{{route('safety.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="heading" name="heading" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Sub title</label>
                                <input type="text" class="form-control" name="heading2"  placeholder="Sub Title">
                            </div>
                        </div>

                        <div class="form-group col-md-6" id="input_fields_wrap">
                            <label for="inputPassword4" class="col-form-label">Description</label>
                            <input type="text" class="form-control"  name="description" placeholder="description">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label">image</label>
                            <input type="file" class="form-control" name="img" placeholder="history_desc">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<input type="text" class="form-control"  name="description[]" placeholder="description"><a href="#" class="remove_field">Remove</a>'); //add input box
		}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
  </script>

@endsection
