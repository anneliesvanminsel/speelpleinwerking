@extends('layouts.admin')
@section('title')
	Leiding - weken
@endsection

@section('content')
	<div>
		<div class="section">
			<h1>
				Weekoverzicht
			</h1>
		</div>
		<article class="article">
			
			<div class="faq">
				@foreach($weeks as $week)
					<div class="faq__item" id="faq-{{$loop->iteration}}">
						<button class="faq__question" data-target="faq-{{$loop->iteration}}">
							<div class="faq__title row">
								<div class="grow">
									<b> Week {{ $week['id'] }}: </b>
									{{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
									t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
								</div>
								<div class="accent is-total">
									{{ $week->monitors()->count() }}/ {{ $week->maxVolunteers }}
								</div>
							</div>
							@svg('back', 'faq__icon')
						</button>
						<div class="faq__answer">
							@foreach($week->monitors()->get() as $moni)
								<div class="row">
									<div class="grow">
										<a href="{{ route('monitor.detail', ['moni_id' => $moni['id']]) }}">
											{{ $moni->first_name }} {{ $moni->name }} - {{ $moni->users()->first()->email }}
										</a>
									</div>
									<div class="grow">
										@if($moni->weeks()->findOrFail($week['id'], ['week_id'])->pivot->wantsIntern === 1)
											Wilt deze week stage lopen
										@endif
									</div>
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{$moni["first_name"]}} {{$moni["name"]}} wilt verwijderen uit Week {{ $week['id'] }}?');"
										method="POST"
										action="{{route('monitor.postDeleteWeek', ['moni_id' => $moni['id'], 'week_id' => $week['id'] ])}}"
									>
										{{ csrf_field() }}
										<button class="" type="submit">
											@svg('delete')
										</button>
									</form>
								</div>
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
		</article>
		
		<script src="{{ asset('js/faq.js') }}" > </script>
	</div>
@endsection