@extends('layouts.admin')
@section('title')
	Leiding - oude hoofdleiding
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht hoofdleiding
			</h1>
		</div>
		
		<div class="account__section card--container">
			@foreach($admins as $admin)
				{{ $admin }}
			@endforeach
		</div>
	</div>
@endsection