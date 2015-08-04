@if ($ads->hasMorePages() || $ads->currentPage() > 1)
<div class="align-center mt">
	@if ($ads->currentPage() > 1)
	<a href="{{ $ads->url($ads->currentPage() - 1) }}" class="ui red icon button mt">
		<i class="arrow circle left icon"></i>
		Page précédente
	</a>
	@endif
	@if ($ads->hasMorePages())
	<a href="{{ $ads->nextPageUrl() }}"class="ui red icon button mt">
		Page suivante
		<i class="arrow circle right icon"></i>
	</a>
	@endif
</div>
@endif