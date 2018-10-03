

<div class="form-group {!! $errors->has('company_id') ? 'has-error'  : null !!}">
    <label for="company">Company</label>
    {!! Form::select('company_id', $companies, null, ['class'=> 'form-control']) !!}
    @if($errors->has('company_id'))
        <span class="help-block">{!! $errors->first('company_id') !!}</span>
    @endif
</div>

<div class="form-group {!! $errors->has('counter_id') ? 'has-error'  : null !!}">
    <label for="company">Counter</label>
    {!! Form::select('counter_id', $counters, null, ['class'=> 'form-control', 'id'=> '']) !!}
    @if($errors->has('counter_id'))
        <span class="help-block">{!! $errors->first('counter_id') !!}</span>
    @endif
</div>

<div class="form-group {!! $errors->has('serial') ? 'has-error'  : null !!}">
    <label for="company">Serial</label>
    {!! Form::text('serial', null, ['class'=> 'form-control']) !!}
    @if($errors->has('serial'))
        <span class="help-block">{!! $errors->first('serial') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('increment_value') ? 'has-error'  : null !!}">
    <label for="company">Increment Value</label>
    {!! Form::text('increment_value', null, ['class'=> 'form-control']) !!}
    @if($errors->has('increment_value'))
        <span class="help-block">{!! $errors->first('increment_value') !!}</span>
    @endif
</div>

<div class="box-footer">
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{!! route('counters.index') !!}" class="btn btn-warning">Cancel</a>
</div>