<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Ticket Id</th>
        <th>Name</th>
        <th>Nickname</th>
        <th>Email</th>
        <th>Sender Name</th>
        <th>Payment Slip</th>
        <th>Payment Confirm</th>
        <th>Payment Confirm Date</th>
        <th>Payment Confirm Admin</th>
        <th>Ip Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $orders)
            <tr>
                <td>{!! $orders->ticket_id !!}</td>
            <td>{!! $orders->name !!}</td>
            <td>{!! $orders->nickname !!}</td>
            <td>{!! $orders->email !!}</td>
            <td>{!! $orders->sender_name !!}</td>
            <td>{!! $orders->payment_slip !!}</td>
            <td>{!! $orders->payment_confirm !!}</td>
            <td>{!! $orders->payment_confirm_date !!}</td>
            <td>{!! $orders->payment_confirm_admin !!}</td>
            <td>{!! $orders->ip_address !!}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $orders->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('orders.edit', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
