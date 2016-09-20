@extends('layouts.app')

@section('htmlheader_title')
	Work Lists
@endsection

@section('contentheader_title')
Project
@endsection

@section('contentheader_description')
{{ $project->name}}
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Information</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>Project Name :</dt>
							<dd>{{$project->name}}</dd>
							<dt>Sub Title :</dt>
							<dd>{{$project->intro}}</dd>
							<dt>Perform Date :</dt>
							<dd>{{$project->perform_date}}</dd>
							<dt>Project Description :</dt>
							<dd>{{$project->description}}</dd>
							<dt>Video Type :</dt>
							<dd>{{$project->video_chanel}}</dd>
							<dt>Video Link :</dt>
							<dd>{{$project->video_url}}</dd>
						</dl>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Photos</div>
					<div class="panel-body">
						@foreach ($images as $image)
							<img src="{{ config('global.site') }}{{ $image->url}}" width="300" height="300" alt="">
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection