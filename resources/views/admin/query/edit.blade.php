@extends('admin.partials.master')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Query</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Query</a></li>
                <li class="breadcrumb-item active" aria-current="page">Query</li>
            </ol>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Query</h3>
                    </div>
                    <div class="card-body">
	<form class="faq-form" action="{{route('query.update',$query->id)}}" method="POST">
	    
                    @csrf
		           @method('PUT')
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="text" placeholder="NAME" name="name" class="form-control" value="{{$query->name}}" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="number" placeholder="PHONE NO:" name="phone" class="form-control"value="{{$query->phone}}" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="email" placeholder="EMAIL:" name="email" class="form-control"value="{{$query->email}}" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="text" placeholder="SUBJECT:" name="subject" class="form-control"value="{{$query->subject}}" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<textarea type="text" placeholder="Message:" name="message" class="form-control" required>{{$query->message}}</textarea>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-2 col-md-3 col-sm-12">
							<button type="submit" class="btn  btn-primary">SEND MESSAGE</button>
						</div>
					</div>
				</form>
				
				
				
				
				
</div>
</div>
</div>

</div>
</div>
@endsection