<div class="form-group">
    {{ Form::label('title', trans('ads.ad_title'), array(
    'class' => 'col-sm-2 control-label')) }}

    <div class="col-sm-4">
        {{ Form::text('title', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.ad_title_placeholder'), 
            'required', 
            'data-minlength' => '5',
            'maxlength' => '50',
            'data-stopshouting')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('place', trans('ads.workplace'), array(
        'class' => 'col-sm-2 control-label')) }}
    
    <div class="col-sm-4">
        {{ Form::text('place', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.workplace_placeholder'),
            'data-minlength' => '3',
            'maxlength' => '15')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('category_id', trans('ads.category'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::select('category_id', $categories, null, array(
            'class' => 'form-control', 
            'id' => 'category_id')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group no-bottom-margin">    
    {{ Form::label('starts_at', trans('ads.date'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4" id="hiddable-from-to-date">
        <div class="input-daterange input-group datepicker">
            {{ Form::text('starts_at', date('d-m-Y'), array(
                'class' => 'form-control', 
                'id' => 'starts_at', 
                'required')) }}
            <span class="input-group-addon">{{ trans('ads.until') }}</span>
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
        {{ Form::label('isPunctual', trans('ads.one_day_question'), array(
            'class' => 'control-label')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('duration', trans('ads.indicative_duration'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('duration', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.indicative_duration_placeholder'),
            'data-minlength' => '2',
            'maxlength' => '100'))}}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('skills', trans('ads.skills'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('skills', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.skills_placeholder'),
            'data-minlength' => '5',
            'maxlength' => '100')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('languages', trans('ads.languages'), array(
    'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('languages', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.languages_placeholder'),
            'data-minlength' => '3',
            'maxlength' => '50')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', trans('ads.description'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::textarea('description', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.description_placeholder'), 
            'rows' => 4, 
            'required',
            'data-minlength' => '10',
            'maxlength' => '1500',
            'data-stopshouting')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<h3>{{ trans('ads.contact_person') }}</h3>
<div class="form-group">
    {{ Form::label('contact_first_name', trans('ads.first_name'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_first_name', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.first_name_placeholder'), 
            'required',
            'data-minlength' => '2',
            'maxlength' => '50')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('contact_last_name', trans('ads.last_name'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_last_name', null, array(
            'class' => 'form-control', 
            'placeholder' => trans('ads.last_name_placeholder'), 
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
            'placeholder' => trans('ads.email_placeholder'), 
            'required',
            'type' => 'email',
            'maxlength' => '75')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('contact_phone', trans('ads.phone'), array(
        'class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-4">
        {{ Form::text('contact_phone', null, array(
            'class' => 'form-control',
            'placeholder' => trans('ads.phone_placeholder'),
            'data-minlength' => '4',
            'maxlength' => '20')) }}
        <div class="help-block with-errors"></div>
    </div>
</div>