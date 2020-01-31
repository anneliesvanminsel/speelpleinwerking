<div class="account__text">
	{{ $address['street'] }}, {{ $address['streetnumber'] }}
	@if ($address['box'])
		, {{ $address['box'] }}
	@endif
</div>
<div class="account__text">
	{{ $address['postalcode'] }} {{ $address['city'] }}
</div>