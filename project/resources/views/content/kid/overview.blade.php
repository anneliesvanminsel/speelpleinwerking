@extends('layouts.admin')
@section('title')
	Leiding - kinderen
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht kinderen
			</h1>
		</div>
		
		<div class="grid">
			@foreach($kids as $kid)
				<div class="grid__item">
					<h3>
						{{$kid['name']}} {{$kid['firstname']}}
					</h3>
				</div>
			@endforeach
		</div>
	</div>
@endsection