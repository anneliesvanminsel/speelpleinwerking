<h3 class="account__text">
	{{ $kid['first_name']}} {{ $kid['last_name']}}
</h3>
<div class="account__section is-green">
	<div class="account__text is-bold">
		{{$kid['first_name']}} {{$kid['name']}}
	</div>
	<div class="account__text">
		{{date('d F Y',strtotime($kid['birthday']))}}
	</div>
	<div class="account__text">
		{{$kid['allergies']}}
	</div>
	<div class="account__text">
		{{$kid['medicins']}}
	</div>
	<div class="account__text">
		@if ($kid['canSwim'] === 0)
			{{ $kid['first_name']}} kan niet zwemmen.
		@else
			{{ $kid['first_name']}} kan zwemmen.
		@endif
	</div>
	<div class="account__text">
		@if ($kid['hasTetanusShot'] === 1)
			{{ $kid['first_name']}} is ingeënt tegen tetanus.
		@else
			{{ $kid['first_name']}} is niet ingeënt tegen tetanus.
		@endif
	</div>
	<div class="account__text">
		<strong>Extra informatie:</strong> <br>
		{{$kid['info']}}
	</div>
	<div>
		<div>
			bewerk gegevens
		</div>
		<div>
			verwijder kind
		</div>
		<div>
			schrijf kind in voor een aantal dagen
		</div>
	</div>
</div>