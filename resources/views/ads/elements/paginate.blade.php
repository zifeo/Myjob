@if ($ads->hasMorePages() || $ads->currentPage() > 1)
    <div class="align-center">
        @if ($ads->currentPage() > 1)
            <a href="{{ $ads->url($ads->currentPage() - 1) }}{{ isset($search) ? '&q=' . e($search): '' }}"
               class="ui red icon button">
                <i class="arrow circle left icon"></i>
                Page précédente
            </a>
        @endif
        @if ($ads->hasMorePages())
            <a href="{{ $ads->nextPageUrl() }}{{ isset($search) ? '&q=' . e($search): '' }}" class="ui red icon button">
                Page suivante
                <i class="arrow circle right icon"></i>
            </a>
        @endif
    </div>
@endif