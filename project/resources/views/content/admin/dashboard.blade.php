@extends('layouts.admin')
@section('title')
	Leiding - Dashboard
@endsection

@section('content')
	@php
		$monicount = App\Monitor::all()->count();
		$kidscount = App\Kid::with("days")->has('days')->count();
	@endphp
	
	<div class="section row">
		<div class="grow">
			<h1>
				dashboard
			</h1>
		</div>
		<a href="{{ route('admin.newSummer') }}" class="btn is-small for-admin">
			Nieuwe zomer
		</a>
	</div>
	<div class="section row">
		<div class="recap for-volunteer">
			<div class="recap__wrapper">
				<div class="h-row">
					<div class="recap__text is-bold">
						{{ $monicount }}
					</div>
					<div class="recap__text is-small">
						monitoren <br> ingeschreven
					</div>
				</div>
			</div>
		</div>
		
		<div class="recap for-family">
			<div class="recap__wrapper">
				<div class="h-row">
					<div class="recap__text is-bold">
						{{ $kidscount }}<span class="recap__text is-small">  / {{ config('global.max_kids') }} </span>
					</div>
					<div class="recap__text is-small">
						geregistreerde <br> kinderen
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<h2 class="account__subheading">
			analyses en grafieken
		</h2>
		<div class="row has-two">
			{!! $chart->html() !!}
			{!! $kidchart->html() !!}
		</div>
		
	</div>
	
	
	
	<div class="section">
		@if($kids->count() > 0)
			<div>
				<h2>
					Vandaag
				</h2>
				<table class="table-overview">
					<tr>
						<th>Naam</th>
						<th>Info</th>
						<th>Groep</th>
						<th>Aanwezig</th>
						<th>Betaald</th>
					</tr>
					@foreach($kids as $kid)
						<tr class="">
							<td class="">
								{{$kid['first_name']}} {{$kid['name']}}
							</td>
							<td>{{$kid['info']}}</td>
							<td>
								@if(strpos($kid['birthday'], '2016') !== false)
									<span>autootjes</span>
								@elseif(strpos($kid['birthday'], '2015') !== false)
									<span>bootjes</span>
								@elseif(strpos($kid['birthday'], '2014') !== false)
									<span>treintjes</span>
								@elseif(strpos($kid['birthday'], '2013') !== false)
									<span>vliegtuigjes</span>
								@elseif(strpos($kid['birthday'], '2012') !== false)
									<span>vliegtuigjes</span>
								@elseif(strpos($kid['birthday'], '2011') !== false)
									<span>zeppelins</span>
								@elseif(strpos($kid['birthday'], '2010') !== false)
									<span>zeppelins</span>
								@elseif(strpos($kid['birthday'], '2009') !== false)
									<span>raketten</span>
								@elseif(strpos($kid['birthday'], '2008') !== false)
									<span>raketten</span>
								@elseif(strpos($kid['birthday'], '2007') !== false)
									<span>ufo's</span>
								@endif
							</td>
							<td>
								<form action="{{ route('kid.attendance', ['kid_id' => $kid['id'], 'day_id' => $day['id']]) }}" method="POST" class="search">
									@csrf
									<div class="search__group">
										<div class="checkbox">
											<label class="checkbox__label">
												<input
													class="checkbox__input for-admin"
													type="checkbox"
													name="attendance"
													value="1"
													onchange="this.form.submit()"
													{{ $kid->days()->findOrFail($day['id'], ['day_id'])->pivot->isPresent === 1 ? 'checked' : '' }}
												>
											</label>
										</div>
									</div>
								</form>
							</td>
							
							<td>
								<form action="{{ route('kid.paid', ['kid_id' => $kid['id'], 'day_id' => $day['id']]) }}" method="POST" class="search">
									@csrf
									<div class="search__group">
										<div class="checkbox">
											<label class="checkbox__label">
												<input
													class="checkbox__input for-admin"
													type="checkbox"
													name="paid"
													onchange="this.form.submit()"
													value="1"
													{{ $kid->days()->findOrFail($day['id'], ['day_id'])->pivot->hasPaid === 1 ? 'checked' : '' }}
												>
											</label>
										</div>
									</div>
								</form>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		@endif
	</div>
	{!! Charts::scripts() !!}
	{!! $chart->script() !!}
	{!! $kidchart->script() !!}
@endsection