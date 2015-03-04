@extends('layout')

@section('content')

<div class="col-sm-12">
    
        @forelse ($ads_to_moderate as $ad)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{{$ad->title}}}</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right small text-right montserra">
                        <span class="badge">{{{ Category::find($ad->category_id)->name }}}</span><br>
                        <span>{{{ $ad->place or 'Non spécifié' }}}</span><br>
                        <span>{{{ $ad->contact_first_name }}} {{{ $ad->contact_last_name }}}</span><br>
                        <span>{{{ $ad->contact_phone }}}</span><br>
                        <span>{{{ $ad->contact_email }}}</span><br><br>
                        <span><em>{{{ $ad->starts_at }}} : {{{ $ad->ends_at or $ad->starts_at }}}</em></span><br>
                    </div>
                    {{{ $ad->description }}}
                    <div class="clearfix"></div>
                </div>
                <div class="panel-footer">
                    <a href="#" class="success">Accepter</a> - <a href="#" class="danger">Refuser</a>
                </div>
            </div>
        @empty
            <p>No more ad to moderate</p>
        @endforelse
   
</div>


@stop