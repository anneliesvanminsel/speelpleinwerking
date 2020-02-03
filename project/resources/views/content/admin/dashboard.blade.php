@extends('layouts.admin')
@section('title')
	Leiding - Dashboard
@endsection

@section('content')
	@php
		$monicount = App\Monitor::all()->count();
		$kidscount = App\Kid::all()->count();
	@endphp
	
	<div class="section">
		<h1>
			dashboard
		</h1>
		<div>
			analyses en grafieken
		</div>
	</div>
	<div>
		Hier komt de ingestelde maxCountKinderen,
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
						{{ $kidscount }}
					</div>
					<div class="recap__text is-small">
						geregistreerde <br> kinderen
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection