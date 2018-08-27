<div class="form-group {!! $errors->has('company_id') ? 'has-error'  : null !!}">
    <label for="company">Counter Category</label>
    {!! Form::select('counter_category_id', $counterCategories, null, ['class'=> 'form-control']) !!}
    @if($errors->has('counter_category_id'))
        <span class="help-block">{!! $errors->first('company_id') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('title') ? 'has-error'  : null !!}">
    <label for="company">Title</label>
    {!! Form::text('title', null, ['class'=> 'form-control']) !!}
    @if($errors->has('title'))
        <span class="help-block">{!! $errors->first('title') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('min') ? 'has-error'  : null !!}">
    <label for="company">Min</label>
    {!! Form::text('min', null, ['class'=> 'form-control']) !!}
    @if($errors->has('min'))
        <span class="help-block">{!! $errors->first('min') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('max') ? 'has-error'  : null !!}">
    <label for="company">Max</label>
    {!! Form::text('max', null, ['class'=> 'form-control']) !!}
    @if($errors->has('max'))
        <span class="help-block">{!! $errors->first('max') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('count') ? 'has-error'  : null !!}">
    <label for="company">Count</label>
    {!! Form::text('count', null, ['class'=> 'form-control']) !!}
    @if($errors->has('count'))
        <span class="help-block">{!! $errors->first('count') !!}</span>
    @endif
</div>
<div class="box-footer">
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{!! route('counters.index') !!}" class="btn btn-warning">Cancel</a>
</div>