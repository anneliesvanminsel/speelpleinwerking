@extends('layouts.admin')
@section('title')
	Leiding - FAQ's
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht FAQ's
			</h1>
			<a href="" class="btn for-admin">
				voeg een FAQ toe
			</a>
		</div>
		
		<div class="grid">
			@foreach($faqs as $faq)
				<div class="grid__item">
					<div class="grid__content">
						<h3>
							{{$faq['question']}}
						</h3>
						<div>
							{{$faq['answer']}}
						</div>
						<div>
							{{$faq['belongsTo']}}
						</div>
					</div>
					<div class="grid__actions">
						<a class="" href={{ route('sponsor.edit', ['faq_id' => $faq->id]) }}>
							@svg('edit', 'is-small')
						</a>
						<form
							class="form"
							method="POST"
							action="{{ route('sponsor.postDelete', ['faq_id' => $faq->id]) }}"
						>
							{{ csrf_field() }}
							<button class="" type="submit">
								@svg('delete', 'is-small')
							</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection