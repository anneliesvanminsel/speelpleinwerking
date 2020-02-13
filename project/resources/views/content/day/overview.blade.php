@extends('layouts.admin')
@section('title')
	Leiding - weken
@endsection

@section('content')
	<div>
		<div class="section">
			<h1>
				Dagoverzicht
			</h1>
		</div>
		
		
		<article class="article">
			<div class="tab">
				<div class="tab__heading">
					@foreach($weeks as $week)
						<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $week['id'] }})">
							Week {{ $week['id'] }}: {{ date('d/m', strtotime( $week['startdate'])) }}
						</button>
					@endforeach
				</div>
				
				<div id="tab__container">
					@foreach($weeks as $week)
						<div class="tab__content faq" id="{{ $week['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
							@foreach($week->days()->get() as $day)
								<div class="faq__item" id="faq-{{ $week['id'] }}-{{$loop->iteration}}">
									<button class="faq__question" data-target="faq-{{ $week['id'] }}-{{$loop->iteration}}">
										<div class="faq__title row">
											<div class="grow">
												{{ \Jenssegers\Date\Date::parse(strtotime($day['date']))->format('l j F Y') }}
											</div>
											<div class="accent is-total">
												{{ $day->kids()->count() }}
											</div>
										</div>
										@svg('back', 'faq__icon')
									</button>
									<div class="faq__answer">
										@foreach($day->kids()->get() as $moni)
											<div class="row">
												<div class="grow">
													<a href="{{ route('monitor.detail', ['moni_id' => $moni['id']]) }}">
														{{ $moni->first_name }} {{ $moni->name }}
													</a>
												</div>
												<form
													class="form"
													onsubmit="return confirm('Ben je zeker dat je {{$moni["first_name"]}} {{$moni["name"]}} wilt verwijderen uit Week {{ $day['id'] }}?');"
													method="POST"
													action="{{route('monitor.postDeleteWeek', ['moni_id' => $moni['id'], 'week_id' => $day['id'] ])}}"
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
					@endforeach
				</div>
			</div>
		</article>
		
		<script src="{{ asset('js/faq.js') }}" > </script>
		<script src="{{ asset('js/tabs.js') }}"></script>
	</div>
@endsection