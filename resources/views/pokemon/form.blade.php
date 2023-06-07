<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pokemon') }}
            {{ Form::text('pokemon', $pokemon->pokemon, ['class' => 'form-control' . ($errors->has('pokemon') ? ' is-invalid' : ''), 'placeholder' => 'Pokemon']) }}
            {!! $errors->first('pokemon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>