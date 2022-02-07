<!-- Ticket Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ticket_id', 'Ticket Id:') !!}
    {!! Form::text('ticket_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Nickname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nickname', 'Nickname:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Sender Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender_name', 'Sender Name:') !!}
    {!! Form::text('sender_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Slip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_slip', 'Payment Slip:') !!}
    {!! Form::text('payment_slip', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Confirm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_confirm', 'Payment Confirm:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('payment_confirm', 0) !!}
        {!! Form::checkbox('payment_confirm', '1', null) !!} 1
    </label>
</div>

<!-- Payment Confirm Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_confirm_date', 'Payment Confirm Date:') !!}
    {!! Form::date('payment_confirm_date', null, ['class' => 'form-control','id'=>'payment_confirm_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#payment_confirm_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Payment Confirm Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_confirm_admin', 'Payment Confirm Admin:') !!}
    {!! Form::number('payment_confirm_admin', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    {!! Form::number('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
