@extends('layouts.admin')
@section('title')
	Leiding - families
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht families
			</h1>
		</div>
		
		<div class="grid">
			@foreach($families as $family)
				<div class="grid__item">
					<h3>
						{{$family['name']}} {{$family['firstname']}}
					</h3>
				</div>
			@endforeach
		</div>
	</div>
@endsection