@extends('layouts.admin')
@section('title')
	Speelplein - {{ $family->users()->first()->email }}
@endsection
@section('content')
	<div class="article">
		<div class="breadcrumb">
			<a href="{{ url()->previous() }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			{{ $family->users()->first()->email }}
		</h1>
	</div>
	
	<div class="article">
		<div class="account__section">
			<h2 class="account__text">
				Account gegevens
			</h2>
		</div>
		
		<div class="account__section">
			<h3 class="account__text is-bold">
				Adresgegevens
			</h3>
			@include('cards.address', ['address' => $family->address()->first()])
		</div>
	</div>
	<div class="article">
		@if($family->guardians()->exists())
			<div  class="account__section row">
				<h2>
					Contactpersonen
				</h2>
			</div>
			
			<div class="account__section card--container">
				@foreach($family->guardians()->get() as $contact)
					@include('cards.guardian', ['guardian' => $contact])
				@endforeach
			</div>
		@endif
	</div>
	<div class="article">
		@if($family->kids()->exists())
			<div  class="account__section row">
				<h2>
					Kinderen
				</h2>
			</div>
			
			<div class="account__section card--container">
				@foreach($family->kids()->get() as $kid)
					@include('cards.kid', ['kid' => $kid])
				@endforeach
			</div>
		@endif
	</div>
@endsection