@extends('layout')

@section('content')

<div class="col-sm-12">
    
        @forelse ($ads_to_moderate as $ad)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" class="pull-right">Edit</a>
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
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-success">Accepter</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-danger">Refuser</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No more ad to moderate</p>
        @endforelse
   
</div>


@stop