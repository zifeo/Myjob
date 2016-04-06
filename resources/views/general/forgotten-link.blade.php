@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="eleven wide column">
            <!-- TODO use trans()-->
            We will send you a mail containing your secret connection link.

            <form class="ui form">
                <div class="field">
                    <label>Your email adress</label>
                    <input type="text" name="email" placeholder="The email adress you used to create the ad">
                </div>
                <div class="align-center">
                    <button class="ui red submit button" type="submit">Submit</button>
                </div>
            </form>

        </div>
        <div class="five wide column">

            @include('ads.elements.notifications')

        </div>
    </div>
@stop
