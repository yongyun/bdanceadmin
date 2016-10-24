@extends('layouts.app')

@section('htmlheader_title')
	Work Lists
@endsection

@section('contentheader_title')
Works
@endsection

@section('contentheader_description')
List
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						Works List
						<a class="btn btn-primary col-md-offset-9" href="/project/add" role="button">
							<i class="fa fa-plus" aria-hidden="true"></i>
							Add New
						</a>
					</div>

					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Project Name</th>
								<th>Operations</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($projects as $project)
							    <tr>
							    	<th scope="row">{{ $project->id}}</th>
							    	<td>
							    		<a href="/project/detail/{{$project->id}}" >
							    			{{ $project->name }}
							    		</a>
							    	</td>
							    	<td>
							    		<a href="http://www.bdance.com.tw/works/{{$project->id}}" target="_blank">
							    			<i class="fa fa-eye" aria-hidden="true"></i>
							    		</a>
							    		<a href="/project/edit/{{$project->id}}">
							    			<i class="fa fa-pencil" aria-hidden="true"></i>
							    		</a>
							    		<a href="#" data-id="{{$project->id}}" data-title="{{ $project->name }}" class="project-delete">
							    			<i class="fa fa-trash" aria-hidden="true"></i>
							    		</a>
							    	</td>
							    	<td></td>
							    </tr>
							@endforeach
						</tbody>
  					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
@endsection
@section('custom_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
	$( document ).ready(function(){
		$('.project-delete').on('click', function(e) {
			var id = $(this).data('id');
			var title = $(this).data('title');
			swal({
				title: "Are you sure?",
				text: "You'll delete this project(" + title +")...",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			}, function () {
				$.ajax({
					method: 'DELETE',
					url: '/project/delete/' + id,
					data: { _token: "{{{ csrf_token() }}}"},
					success: function (data) {
						if (data.status) {
							swal({
								title: "Deleted!",
								text: "Project \"" + title + "\" has been deleted.",
								type: "success"
							}, function () {
								location.reload();
							});
						}
					}
				});
			});
		})
	});
</script>
@endsection