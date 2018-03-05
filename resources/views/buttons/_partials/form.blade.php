<div class="form-group {!! $errors->has('company_id') ? 'has-error'  : null !!}">
    <label for="button">Company</label>
    {!! Form::select('company_id', $companies, null, ['class'=> 'form-control', 'id'=>'company' ]) !!}
    @if($errors->has('company_id'))
        <span class="help-block">{!! $errors->first('company_id') !!}</span>
    @endif
</div>

<div class="form-group {!! $errors->has('branch_id') ? 'has-error'  : null !!}">
    <label for="button">Branch</label>
    <select name="branch_id" id="branches" class="form-control">
    </select>
    @if($errors->has('branch_id'))
        <span class="help-block">{!! $errors->first('branch_id') !!}</span>
    @endif
</div>

<div class="form-group {!! $errors->has('button_type_id') ? 'has-error'  : null !!}">
    <label for="button">Button Type</label>
    {!! Form::select('button_type_id', $buttonTypes, null, ['class'=> 'form-control']) !!}
    @if($errors->has('button_type_id'))
        <span class="help-block">{!! $errors->first('button_type_id') !!}</span>
    @endif
</div>


<div class="form-group {!! $errors->has('serial_number') ? 'has-error'  : null !!}">
    <label for="button">Serial Number</label>
    {!! Form::text('serial_number', null, ['class'=> 'form-control']) !!}
    @if($errors->has('serial_number'))
        <span class="help-block">{!! $errors->first('serial_number') !!}</span>
    @endif
</div>


<div class="form-group {!! $errors->has('identifier') ? 'has-error'  : null !!}">
    <label for="button">Identifier</label>
    {!! Form::text('identifier', null, ['class'=> 'form-control']) !!}
    @if($errors->has('identifier'))
        <span class="help-block">{!! $errors->first('identifier') !!}</span>
    @endif
</div>

<div class="box-footer">
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{!! route('buttons.index') !!}" class="btn btn-warning">Cancel</a>
</div>