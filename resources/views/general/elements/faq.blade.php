<div class="ui accordion">
	@forelse ($faq_items as $faq_item)
	<div class="title">
		<i class="dropdown icon"></i>
		{{ $faq_item->{'question_' . App::getLocale()} }}
	</div>
	<div class="content">
		<p class="transition">
			{{ $faq_item->{'answer_' . App::getLocale()} }}
		</p>
	</div>
	@empty
	<p class="mt">Pas de question-réponse pour le moment.</p>
	@endforelse
</div>