@extends('layouts.moni')
@section('title')
	Monitor - inschrijven
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
	
		<form class="form article" method="POST" action="{{route('moni.postAddWeek', ['moni_id' => $kid['id'] ])}}">
			@csrf
			
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
									class="checkbox__input for-volunteer"
									type="checkbox"
									name="events[]"
									value="{{ $day['id'] }}"
									{{ $kid->days->contains($day['id']) ? 'checked disabled' : '' }}
								>
								
								@if($kid->days->contains($day['id']))
									<input type="hidden" name="events[]" value="{{$day['id']}}" />
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
				<button type="submit" class="btn for-volunteer">
					Voeg de weken toe
				</button>
			</div>
		
		</form>
	</div>
@endsection
