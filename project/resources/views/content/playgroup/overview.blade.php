@extends('layouts.admin')
@section('title')
	Leiding - Speelgroepen
@endsection

@section('content')
	<div class="section">
		<div>
			<h1>
				Overzicht speelgroepen
			</h1>
			<a href="{{ route('playgroup.create') }}">
				voeg een speelgroep toe
			</a>
		</div>
		
		<div>
		
		</div>
	</div>
@endsection