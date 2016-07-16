@extends('layout')

@section('content')
    <div class="row">
        <div class="eleven wide column ads-list-wrapper">
            <div class="ui two column stackable grid">
                <div class="stretched compact row">
                    @include('ads.elements.list')
                </div>
            </div>
            @include('ads.elements.paginate')
        </div>
        <div class="computer tablet only five wide column">
            @include('ads.elements.news')
        </div>
    </div>
@stop