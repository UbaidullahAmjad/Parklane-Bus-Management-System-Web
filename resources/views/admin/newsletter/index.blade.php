
@extends('admin.partials.master')

@section('content')
<style>
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
	<div class="app-content">
        <div class="side-app">
            <div class="page-header" id="printPageButton">
                <h4 class="page-title">Newsletter</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Newsletter</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Newsletter </div>
                            <div class="col-md-11 text-right">
                                 <button id="printPageButton" class="btn btn-warning" onClick="window.print();">Print</button>
                               <!-- Button trigger modal -->
                                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                                <!--<i class="fa fa-plus-circle"></i>-->
                                <!--</button>-->
                                
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>

                                            <th>Email</th>
                                            <th id="printPageButton">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                     @foreach ($newsletter as $newsl )
                                         <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$newsl->email}}</td>

                                            <td id="printPageButton">
                                                    <a href="{{route('newsletter.edit',$newsl->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                    <form action="{{route('newsletter.destroy',$newsl->id)}}" method="POST">
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

