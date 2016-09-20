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
					<div class="panel-heading">Works List</div>

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
							    			{{ $project->name}}
							    		</a>
							    	</td>
							    	<td>
							    		<a href="http://www.bdance.com.tw/works/{{$project->id}}" target="_blank">
							    			<i class="fa fa-eye" aria-hidden="true"></i>
							    		</a>
							    		<a href="/project/edit/{{$project->id}}">
							    			<i class="fa fa-pencil" aria-hidden="true"></i>
							    		</a>
							    		<a href="#" data-id="{{$project->id}}" class="project-delete">
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