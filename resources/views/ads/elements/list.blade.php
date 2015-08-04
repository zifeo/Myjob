@forelse ($ads as $ad)
<div class="column">
	<a class="ui fluid card" href="{{ action('AdController@show', $ad->url) }}">
		<div class="content">
			<div class="right floated">{{ $ad->category }}</div>
			<div class="header">{{ $ad->title }}</div>
			<div class="meta">
				<span class="right floated moment">{{ $ad->updated_at }}</span>
				{{ $ad->place }}
			</div>
			<div class="description">
				<p>{{ $ad->description }}</p>
			</div>
		</div>
	</a>
</div>
@empty
<p>{{ trans('general.nothingleft') }}</p>
@endforelse