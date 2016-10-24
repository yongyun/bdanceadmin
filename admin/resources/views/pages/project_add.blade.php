@extends('layouts.app')

@section('htmlheader_title')
	Add New Project
@endsection

@section('contentheader_title')
Project
@endsection

@section('contentheader_description')
Add New Project
@endsection

@section('main-content')
	<div class="container spark-screen">
		<form class="form-horizontal" action="/project/add" method="POST" >
		<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">Information</div>
						<div class="panel-body">
							<div class="form-group">
							    <label for="name" class="col-sm-2">Project Name</label>
							    <div class="col-sm-4">
							    	<input type="text" class="form-control " id="name" name="name" placeholder="Project Name">
							    </div> 
							</div>
							<div class="form-group">
							    <label for="sub_title" class="col-sm-2">Sub Title</label>
							    <div class="col-sm-4">
							    	<input type="text" class="form-control " id="sub_title" name="sub_title" placeholder="Sub Title">
							    </div> 
							</div>
							<div class="form-group">
							    <label for="sub_title" class="col-sm-2">Description</label>
							    <div class="col-sm-4">
							    	<textarea class="form-control" name="description" rows="3"></textarea>
							    </div> 
							</div>
							<div class="form-group">
								<label for="video_channel" class="col-sm-2">Video Channel</label>
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Dropdown
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu col-sm-offset-2" aria-labelledby="dropdownMenu1">
								    <li><a href="#">Action</a></li>
								    <li><a href="#">Another action</a></li>
								    <li><a href="#">Something else here</a></li>
								    <li role="separator" class="divider"></li>
								    <li><a href="#">Separated link</a></li>
								  </ul>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Photos</div>
						<div class="panel-body">
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Awards</div>
						<div class="panel-body">
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Reviews</div>
						<div class="panel-body">
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Stuff</div>
						<div class="panel-body">
						</div>
					</div>
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<input class="btn btn-success" type="submit" value="Submit">
				</div>
			</div>
		</form>
	</div>
@endsection

@section('custom_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
	<style>
		.fancybox img{
			padding-bottom: 3px;
		}
	</style>
@endsection

@section('custom_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
@endsection