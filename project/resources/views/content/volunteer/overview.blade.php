@extends('layouts.admin')
@section('title')
	Leiding - vrijwilligers
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht vrijwilligers
			</h1>
		</div>
		
		<div class="grid">
			@foreach($volunteers as $volunteer)
				<div class="grid__item">
					<h3>
						{{$volunteer['name']}} {{$volunteer['firstname']}}
					</h3>
				</div>
			@endforeach
		</div>
	</div>
@endsection