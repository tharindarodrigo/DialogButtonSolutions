

<div class="form-group {!! $errors->has('name') ? 'has-error'  : null !!}">
    <label for="button">Name</label>
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block">{!! $errors->first('name') !!}</span>
    @endif
</div>

<div class="box-footer">
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{!! route('roles.index') !!}" class="btn btn-warning">Cancel</a>
</div>