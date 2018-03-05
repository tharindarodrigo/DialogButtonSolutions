<div class="form-group {!! $errors->has('company_id') ? 'has-error'  : null !!}">
    <label for="company">Company</label>
    {!! Form::select('company_id', $companies, null, ['class'=> 'form-control select2']) !!}
    @if($errors->has('company_id'))
        <span class="help-block">{!! $errors->first('company_id') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('branch') ? 'has-error'  : null !!}">
    <label for="company">Branch</label>
    {!! Form::text('branch', null, ['class'=> 'form-control']) !!}
    @if($errors->has('branch'))
        <span class="help-block">{!! $errors->first('branch') !!}</span>
    @endif
</div>

<div class="form-group {!! $errors->has('phone') ? 'has-error'  : null !!}">
    <label for="company">Phone</label>
    {!! Form::text('phone', null, ['class'=> 'form-control']) !!}
    @if($errors->has('phone'))
        <span class="help-block">{!! $errors->first('phone') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('address') ? 'has-error'  : null !!}">
    <label for="company">Address</label>
    {!! Form::textarea('address', null, ['class'=> 'form-control']) !!}
    @if($errors->has('address'))
        <span class="help-block">{!! $errors->first('address') !!}</span>
    @endif
</div>
<div class="box-footer">
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{!! route('branches.index') !!}" class="btn btn-warning">Cancel</a>
</div>