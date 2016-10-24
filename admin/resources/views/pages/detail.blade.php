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
							<dt>Duration :</dt>
							<dd>{{$project->duration}}</dd>
							<dt>Premiere :</dt>
							<dd>{{$project->premiere}}</dd>
							<dt>Video Type :</dt>
							<dd>{{$project->video_chanel}}</dd>
							<dt>Video Link :</dt>
							<dd>{{$project->video_url}}</dd>
							<dt>Tours:</dt>
							<dd>
								<table>
								@foreach ($tours as $tour)
								<tr>
									<td>{{ $tour->tour_date}}</td>
									<td>{{ $tour->name}}</td>
									<td>{{ $tour->performed}}</td>
								</tr>	
								@endforeach
								</table>
							</dd>
						</dl>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Photos</div>
					<div class="panel-body">
						@foreach ($images as $image)
						<a class="fancybox" rel="photos" href="{{ config('global.site') }}{{ $image->url}}"><img src="{{ config('global.site') }}{{ $image->url}}" alt="" width="150" height="150" /></a>
							
						@endforeach
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Awards</div>
					<div class="panel-body">
						@foreach ($awards as $award)
							<dl class="dl-horizontal">
								<dt>Title:</dt>
								<dd>{{$award->title}}</dd>
								<dt>Descripton:</dt>
								<dd>{{$award->description}}</dd>
								<dt>Awards</dt>
								<dd>{{$award->awardName}}</dd>
							</dl>
						@endforeach
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Reviews</div>
					<div class="panel-body">
						@foreach ($reviews as $review)
							<dl class="dl-horizontal">
								<dt>Reviewer:</dt>
								<dd>{{$review->reviewer}}</dd>
								<dt>Content:</dt>
								<dd>{{$review->content}}</dd>
							</dl>
						@endforeach
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Stuff</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>Main Stuffs:</dt>
							<dd>
								@foreach ($mStuffs as $stuff)
									<div>
										<a class="fancybox" rel="stuff" href="{{ config('global.site') }}{{ $stuff->photo}}"><img src="{{ config('global.site') }}{{ $stuff->photo}}" alt="" width="100" /></a>
										{{ $stuff->name}} / {{$stuff->role}}
									</div>
								@endforeach
							</dd>
							<dt>Other Stuffs:</dt>
							<dd>{!! $rStuffs[0]->rest_stuffs !!}</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
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