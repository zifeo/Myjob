@forelse ($ads_to_moderate as $ad)
<div class="column">
	<div class="ui fluid card">
		<div class="content">
			<div class="right floated">{{ $category_names[$ad->category_id] }}</div>
			<a class="header" href="{{ action('AdController@show', $ad->url) }}">
				{{ $ad->title }}
			</a>
			<div class="meta">
				<span class="right floated">{{ $ad->contact_first_name }} {{ $ad->contact_last_name }}</span>
				{{ $ad->place }}
			</div>
			<div class="description">
				<p>{{ $ad->description }}</p>
			</div>
		</div>
		<div class="extra content">
			<div class="ui bulleted list">
				<div class="item">{{ $ad->duration }}</div>
				<div class="item">{{ $ad->salary }}</div>
				<div class="item">{{ $ad->contact_email }}</div>
				@if (isset($ad->skills))<div class="item">{{ $ad->skills }}</div>@endif
				@if (isset($ad->languages))<div class="item">{{ $ad->languages }}</div>@endif
				@if (isset($ad->contact_phone))<div class="item">{{ $ad->contact_phone }}</div>@endif
			</div>
		</div>
		<div class="ui bottom attached three compact buttons">
			<a class="ui green button moderation" href="{{ action('ModerationController@accept', $ad->url) }}">{{ trans('general.buttons.accept') }}</a>
			<a class="ui orange button" href="{{ action('AdController@edit', $ad->url) }}">{{ trans('general.buttons.edit') }}</a>
			<a class="ui red button moderation" href="{{ action('ModerationController@refuse', $ad->url) }}">{{ trans('general.buttons.refuse') }}</a>
		</div>
	</div>
</div>
@empty
<p>{{ trans('general.nothingleft') }}</p>
@endforelse