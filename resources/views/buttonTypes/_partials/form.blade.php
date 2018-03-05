<div class="form-group {!! $errors->has('button_type') ? 'has-error'  : null !!}">
    <label for="buttonType">Button Type</label>
    {!! Form::text('button_type', null, ['class'=> 'form-control']) !!}
    @if($errors->has('button_type'))
        <span class="help-block">{!! $errors->first('button_type') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('notification_color') ? 'has-error'  : null !!}">
    <label for="buttonType">Notification Color</label>
    {!! Form::select('notification_color', $notificationColors, null, ['class'=> 'form-control']) !!}
    @if($errors->has('notification_color'))
        <span class="help-block">{!! $errors->first('notification_color') !!}</span>
    @endif
</div>
<div class="form-group {!! $errors->has('message') ? 'has-error'  : null !!}">
    <label for="buttonType">Message</label>
    {!! Form::text('message', null, ['class'=> 'form-control']) !!}
    @if($errors->has('message'))
        <span class="help-block">{!! $errors->first('message') !!}</span>
    @endif
</div>
<div class="box-footer">
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{!! route('button-types.index') !!}" class="btn btn-warning">Cancel</a>
</div>