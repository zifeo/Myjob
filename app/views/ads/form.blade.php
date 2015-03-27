<div class="form-group">
    {{ Form::label('title', 'Titre de l\'annonce', array(
    'class' => 'col-sm-2 control-label')) }}

    <div class="col-sm-4">
        {{ Form::text('title', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Titre', 
            'required', 
            'data-minlength' => '5',
            'maxlength' => '50',
            'data-stopshouting')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('place', 'Lieu du travail', array(
        'class' => 'col-sm-2 control-label')) }}
    
    <div class="col-sm-4">
        {{ Form::text('place', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Lieu',
            'data-minlength' => '5',
            'maxlength' => '15')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('category_id', 'Catégorie', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::select('category_id', $categories, null, array(
            'class' => 'form-control', 
            'id' => 'category_id')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group no-bottom-margin">    
    {{ Form::label('starts_at', 'Date', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4" id="hiddable-from-to-date">
        <div class="input-daterange input-group datepicker">
            {{ Form::text('starts_at', date('d-m-Y'), array(
                'class' => 'form-control', 
                'id' => 'starts_at', 
                'required')) }}
            <span class="input-group-addon">jusqu'au</span>
            {{ Form::text('ends_at', 
                date('d-m-Y', strtotime('now +15days')), array(
                'class' => 'form-control', 
                'id' => 'ends_at')) }}
        </div>
    </div>

</div>

<div class="form-group right-text-align" style="text-align:right">
    <div class="col-sm-offset-2 col-sm-4">
        <input type="checkbox" value="isPunctual" name="isPunctual" id="isPunctual">
        {{ Form::label('isPunctual', 'Un seul jour ?', array(
            'class' => 'control-label')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('duration', 'Durée indicative', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('duration', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Ex: 8h par jour, 5x par semaine',
            'data-minlength' => '5',
            'maxlength' => '100'))}}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('skills', 'Compétence(s)', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('skills', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Compétences',
            'data-minlength' => '5',
            'maxlength' => '100')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('languages', 'Langue(s)', array(
    'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('languages', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Langues',
            'data-minlength' => '3',
            'maxlength' => '50')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::textarea('description', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Description de l\'annonce', 
            'rows' => 4, 
            'required',
            'data-minlength' => '10',
            'maxlength' => '1500',
            'data-stopshouting')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<h3>Contact</h3>
<div class="form-group">
    {{ Form::label('contact_first_name', 'Prénom', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_first_name', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Votre prénom', 
            'required',
            'data-minlength' => '2',
            'maxlength' => '50')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('contact_last_name', 'Nom', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_last_name', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Votre nom de famille', 
            'required',
            'data-minlength' => '2',
            'maxlength' => '50')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('contact_email', 'Email', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::email('contact_email', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Votre adresse email', 
            'required',
            'type' => 'email',
            'maxlength' => '75')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('contact_phone', 'Téléphone', array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_phone', null, array(
            'class' => 'form-control', 
            'placeholder' => 'Votre téléphone',
            'data-minlength' => '4',
            'maxlength' => '20')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>