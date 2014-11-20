@extends('layout')

@section('content')
<div class="col-sm-12">

    <h3>Nouvelle annonce</h3>

    {{ Form::model($ad, ['url' => 'ad', 'class' => 'form-horizontal']) }}
        <div class="form-group">
        		{{ Form::label('title', 'Titre de l\'annonce', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-4">
        		{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Titre')) }}
        	</div>
        </div>

        <div class="form-group">
        		{{ Form::label('place', 'Lieu du travail', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-4">
        		{{ Form::text('place', null, array('class' => 'form-control', 'placeholder' => 'Lieu')) }}
        	</div>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Catégorie', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            	<select class="form-control" id="category" name="category">
                    @foreach($categories as $cat_id => $cat)
                        <option value="{{$cat_id}}">{{$cat}}</option>
                    @endforeach
            	</select>
            </div>
        </div>

        <div class="form-group">
        		{{ Form::label('duration', 'Durée indicative', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-4">
        		{{ Form::text('duration', null, array('class' => 'form-control', 'placeholder' => 'Ex: 8h par jour, 5x par semaine'))}}
        	</div>
        </div>




        <div class="form-group">    
        	{{ Form::label('start-date', 'Date', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4" id="hiddable-from-to-date">
        	    <div class="input-daterange input-group datepicker">
                    <input type="text" class="form-control" name="start-date" id="start-date"/>
        	        <span class="input-group-addon">jusqu'au</span>
        	        <input type="text" class="form-control" name="end-date" id="end-date" />
                </div>
            </div>

            <div class="col-sm-4 hidden" id="hiddable-punctual-date">
                <input type="text" class="form-control datepicker" name="punctual-date" id="punctual-date" />
            </div>

            
            <div class="col-sm-4">
                <input type="checkbox" value="isPunctual" name="isPunctual" id="isPunctual">
                {{ Form::label('isPunctual', 'Job ponctuel ?', array('class' => 'control-label')) }}
            </div>

    	</div>

        <div class="form-group">
            {{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
            {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description de l\'annonce', 'rows' => 4)) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('skills', 'Compétence(s)', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('skills', null, array('class' => 'form-control', 'placeholder' => 'Compétences')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('language', 'Langue(s)', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('language', null, array('class' => 'form-control', 'placeholder' => 'Langues')) }}
            </div>
        </div>

        <h3>Contact</h3>
        <div class="form-group">
            {{ Form::label('contact-first-name', 'Prénom', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('contact-first-name', null, array('class' => 'form-control', 'placeholder' => 'Votre prénom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('contact-last-name', 'Nom', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('contact-last-name', null, array('class' => 'form-control', 'placeholder' => 'Votre nom de famille')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('contact-email', 'Email', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    {{ Form::email('contact-email', null, array('class' => 'form-control', 'placeholder' => 'Votre adresse email')) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('contact-phone', 'Téléphone', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('contact-phone', null, array('class' => 'form-control', 'placeholder' => 'Votre téléphone')) }}
            </div>
        </div>


        <div class="form-group col-sm-4">
        	{{ Form::submit('Enregistrer la nouvelle annonce', array('class' => 'btn btn-default'))}}
    	</div>
    {{ Form::close() }}
</div>

@stop