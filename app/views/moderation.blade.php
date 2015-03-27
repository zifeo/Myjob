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
                    <div class="col-md-3 col-xs-12 side-infos">
                        <span class="badge pull-right">{{{ $category_names[$ad->category_id] }}}</span>
                        <span>{{{ $ad->place or '-' }}}</span><br>
                        <span>{{{ $ad->contact_first_name }}} {{{ $ad->contact_last_name }}}</span><br>
                        <span>{{{ $ad->contact_phone or "Pas de téléphone"}}}</span><br>
                        <span>{{{ $ad->contact_email }}}</span><br>
                        <span><em>{{{ $ad->starts_at }}} : {{{ $ad->ends_at or $ad->starts_at }}} 
                            ({{{ isset($ad->ends_at) ? floor((strtotime($ad->ends_at) - strtotime($ad->starts_at))/(60*60*24)) : 0 }}} j)</em></span><br>

                    </div>
                    <div class ="col-md-9 col-xs-12">
                        <p>{{{ $ad->description }}}</p>
                        
                        <ul>
                            <li>{{{ $ad->skills or "Pas de skills"}}}</li>
                            <li>{{{ $ad->duration or "Pas de durée"}}}</li>
                            <li>{{{ $ad->language or "Pas de langue"}}}</li>
                        </ul>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <button rel="{{ $ad->url }}" type="button" class="btn btn-success validation-accept-button">Accepter</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button rel="{{ $ad->url }}" type="button" class="btn btn-danger validation-refuse-button">Refuser</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No more ad to moderate</p>
        @endforelse
   
</div>


@stop