@extends('layouts.app')
@section('title')
	{{ $kid['first_name'] }} - inschrijven
@endsection
@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1 class="user-subscribe__heading">
			Schrijf je in voor een week (of twee)
		</h1>
	</div>
		
	<div class="article">
		<div class="article__text">
			<b>Opgelet!: </b> <br>
			Indien jouw kind zich niet kan uitschrijven voor een dag, gelieve telefonisch contact op te nemen.
		</div>
	</div>
	
		<form class="form article" method="POST" action="{{route('kid.postDays', ['kid_id' => $kid['id'] ])}}">
			@csrf
			
			<div class="checkbox">
				<label class="checkbox__label">
					<input
						class="checkbox__input for-family"
						type="checkbox"
						onClick="toggle(this)"
					>
					<div class="checkbox__title">
						Duid alle dagen aan.
					</div>
				</label>
			</div>
			
			@foreach($weeks as $week)
				<div class="account__section">
					<div class="checkbox__title account__subheading">
						Week {{ $week['id'] }}: {{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
						t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
					</div>
					@foreach($week->days()->get() as $day)
						<div class="checkbox">
							<label class="checkbox__label">
								
								<input
									class="checkbox__input for-family"
									type="checkbox"
									name="days[]"
									value="{{ $day['id'] }}"
									{{ $day['date'] <= \Carbon\Carbon::tomorrow() ? 'disabled' : '' }}
									{{ $kid->days->contains($day['id']) ? 'checked' : '' }}
								>
								
								@if($kid->days->contains($day['id']))
									<input type="hidden" name="days[]" value="{{$day['id']}}" />
								@endif
								
								<div>
									{{ \Jenssegers\Date\Date::parse(strtotime($day['date']))->format('l j F Y') }}
								</div>
							</label>
						</div>
					@endforeach
				</div>
			@endforeach
			
			<div class="form__actions">
				<button type="submit" class="btn for-family">
					Schrijf {{ $kid['first_name'] }} in voor deze dagen
				</button>
			</div>
		
		</form>
	<script src="{{ asset('js/checkbox.js') }}" > </script>
	</div>
@endsection
