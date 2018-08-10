<div class="form-group {!! $errors->has('counter_category') ? 'has-error'  : null !!}">
    <label for="company">Name</label>
    {!! Form::text('counter_category', null, ['class'=> 'form-control']) !!}
    @if($errors->has('counter_category'))
        <span class="help-block">{!! $errors->first('counter_category') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('company_id') ? 'has-error'  : null !!}">
    <label for="company">Name</label>
    {!! Form::select('company_id', $companies, null, ['class'=> 'form-control']) !!}
    @if($errors->has('company_id'))
        <span class="help-block">{!! $errors->first('company_id') !!}</span>
    @endif
</div>
<div class="box-footer">
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{!! route('counter-categories.index') !!}" class="btn btn-warning">Cancel</a>
</div>