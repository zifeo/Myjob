@extends('layout')

@section('content')
    <div class="row">
        <div class="sixteen wide column">
            <div class="ui three column stackable grid">
                <div class="stretched compact row">
                    @include('moderation.elements.moderate')
                </div>
            </div>
        </div>
    </div>
@stop