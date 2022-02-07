@push('css')
<link href="assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" rel="stylesheet">
<script>var url = '{{ url('') }}';</script>
<style>
@media (min-width: 1200px){
.con-app {
    max-width: 1540px;
}
}
@media (max-width: 640px) {
    #orders-table_filter{
      margin-top: -83px; 
      float: right;
      margin-right: 0;
      margin-bottom: 31px;
  }
}
@media (max-width: 640px) {
    div.dataTables_wrapper div.dataTables_length select{
        width: 54px;
        height: 35px;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0;
        margin-top: 0px;
        margin-bottom: 12px;
    }
    .icon-addon.addon-lg .fa, .icon-addon.addon-lg .glyphicon {
        font-size: 14px;
        top: 0px;
    }
    .navbuttons {
        margin-bottom: 0;
    }
    }
    div.dataTables_wrapper div.dataTables_filter {
        display: none
        }
          .icon-addon.addon-lg .fa, .icon-addon.addon-lg .glyphicon {
              font-size: 14px;
              top: 0px;
          }
          .navbuttons {
              margin-bottom: 0;
          }
          table.dataTable.dtr-inline.collapsed>tbody>tr.child td:before {
            display: none
          }
          table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child.dataTables_empty:before,table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child.dataTables_empty:before {
            display: none
          }
          table.table-bordered.dataTable th,table.table-bordered.dataTable td {
            border-left: 0;
            border-right: 0;
            border-top: 1px solid #efefef;
            border-bottom: 1px solid #efefef;
        }
        table.tablec.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
          cursor: pointer;
          top: 1rem;
          content: "\f105";
          font-family: FontAwesome;
          font-weight: 900;
          font-style: normal;
          font-variant: normal;
          text-rendering: auto;
          line-height: 1;
          -moz-osx-font-smoothing: grayscale;
          -webkit-font-smoothing: antialiased;
          background-color: transparent;
          color: inherit;
          border: 0;
          box-shadow: none;
          -webkit-transform: rotate(0);
          transform: rotate(0);
          -webkit-transform-origin: center center;
          transform-origin: center center;
          transition: -webkit-transform .15s linear;
          transition: transform .15s linear;
          transition: transform .15s linear,-webkit-transform .15s linear
        }
        table.tablec.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before,table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
        background-color: transparent;
        content: "\f107";
        font-family: FontAwesome;
        font-weight: 900;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        -webkit-transform-origin: center center;
        transform-origin: center center;
        transition: -webkit-transform .15s linear;
        transition: transform .15s linear;
        transition: transform .15s linear,-webkit-transform .15s linear
        }
    .select2-selection__arrow{
    height: 35px!important;
    }
</style>
@endpush
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<link rel="stylesheet" href="https://unpkg.com/smartphoto@1.1.0/css/smartphoto.min.css">
<script src="https://unpkg.com/smartphoto@1.1.0/js/jquery-smartphoto.js"></script>

<script>
$(document).ready(function() {
    var tableorders = $('#orders-table').DataTable({
        responsive: true,
        stateSave: true,
        "dom": '<"row toolbar">frtip',
            "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                    ],
//
        processing: true,
        serverSide: true,
        pagingType: 'numbers',
        pageLength: 15,
        "lengthMenu": [25, 50, 75, 100 ],
        "order": [[ 13, "ASC" ]],
        ordering : true,
        ajax: {
        url: '{{url('api/orders')}}',
        type: 'GET',
        cache: false,
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", 'Bearer '+ localStorage.getItem('AUTH-TOKEN'));
        }
        },
        columns: [
            { data: 'id', name: 'id', width : '10%',"searchable": true },
            { data: 'created_at', name: 'created_at', width : '15%',"searchable": false },
            { data: 'name', name: 'name',"searchable": true,"orderable": false },
            { data: 'username', name: 'username',"searchable": true,"orderable": false },
            { data: 'email', name: 'email',"searchable": true,"orderable": false },
            { data: 'phone', name: 'phone',"searchable": true,"orderable": false },
            { data: 'bucin', name: 'bucin',"searchable": true,"orderable": false },
            { data: 'people', name: 'people',"searchable": true,"orderable": false },
            { data: 'total', name: 'total',"searchable": true,"orderable": false },
            { data: 'sender_name', name: 'sender_name',"searchable": true,"orderable": false },
            {
                "mData": "payment_slip",
                "mRender": function (data, type, row) {
                    if(data != null){
                    return '<a href="{{url("/uploads/payments/")}}/'+data+'" class="js-smartPhoto" data-caption="'+data+'" data-id="'+data+'" data-group="payment"/><img src="{{url("/uploads/payments/")}}/'+data+'" width="60px"/></a>'; 
                }else{
                    return '';
                }
                },
                "searchable": false,"orderable": false
            },
            { data: 'shift', name: 'shift',"searchable": false,"orderable": false },
            {
                "mData": "payment_confirm",
                "mRender": function (data, type, row) {
                    var text;
                    if(data ==0){
                        text = "<span class='badge badge-warning text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Waiting</span>";
                    }else if(data==3){
                        text = "<span class='badge badge-primary text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Unconfirmed</span>";
                    }else if(data==1){
                        text = "<span class='badge badge-info text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Confirmed</span>";
                    }else if(data==4){
                        text = "<span class='badge badge-success text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Check In</span>";
                    }else if(data == 2){
                        text = "<span class='badge badge-danger text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Cancelled</span>";
                    }else{
                        text = "<span class='badge badge-primary text-light' style='padding: 2px 0.6em 2px;font-weight: bold;font-size: 80%;'>Belum Dikonfirmasi</span>";
                    }
                    return text;
                }
                },
                {
                "mData": "payment_confirm",
                "mRender": function (data, type, row) {
                    var text;
                    if(data == 0){
                        var order = "{{url('order/')}}/";
                        text = '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-danger btn-cancel"><i class="fa fa-close"></i></button>';
                        text += '<a type="button" href="'+order+row.hash+'" target="_blank" data-id="'+row.id+'" class="btn btn-sm btn-warning"><i class="fa fa-paperclip"></i></a>';
                    }else if(data == 3){
                        text = '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-info btn-confirm mr-1"><i class="fa fa-check"></i></button>';
                        text += '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-danger btn-cancel"><i class="fa fa-close"></i></button>';
                    }else if(data == 1){
                        text = '<button type="button" data-id="'+row.id+'" data-email="'+row.email+'" data-name="'+row.name+'" data-ticket="'+row.ticket_id+'" class="btn btn-sm btn-dark btn-email text-center mr-1"><i class="fa fa-envelope-o"></i></button>';

                        //text = '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-success mr-1 btn-checkin" data-toggle="tooltip" data-placement="top" title="Check In"><i class="fa fa-check"></i></button>';
                    }else if(data == 4){
                        text = '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-success btn-checkin disabled" data-toggle="tooltip" data-placement="top" title="Already Check In"><i class="fa fa-check"></i></button>';
                    }else{
                            text = '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-info btn-confirm mr-1 disabled" disabled><i class="fa fa-check"></i></button>';
                            text += '<button type="button" data-id="'+row.id+'" class="btn btn-sm btn-danger btn-cancel disabled" disabled><i class="fa fa-close"></i></button>';
                        }
                    return text;
                },
                width : '100px',
                "searchable": false

            }
        ],
        "info":  true,
        language: {
            search: "",
            lengthMenu: "_MENU_",
            searchPlaceholder: "Search",
            // paginate: {"previous": '<<',"next": '>>'}
        },
        order: [[0, 'asc']],
        displayLength: -1,
    "drawCallback": function( settings ) {
        $(".js-smartPhoto").SmartPhoto({
            resizeStyle: 'fit'
        });
        $('[data-toggle="tooltip"]').tooltip()
    }
    });
    $(document).on('click','.btn-email', function(){
        var id = $(this).data("id");
        var email = $(this).data("email");
        var name = $(this).data("name");
        var ticket = $(this).data("ticket");
        Swal.fire({
  title: 'Email Template',
  html:
  '<div class="form-group">' +
    '<label for="pop">Email</label>' +
    '<input id="swal-input1" class="swal2-input form-control mt-1" value="'+email+'" disabled>' +
    '</div>' +
    '<div class="form-group">' +
    '<label for="pop">Subject</label>' +
    '<input id="swal-input1" class="swal2-input form-control mt-1" value="Konfirmasi Pembayaran Wenseul Universe" disabled>' +
    '</div> ' +
    '<div class="form-group">' +
    '<label for="pop">Message</label>' +
    '<textarea class="form-control swal2-input mt-1" id="exampleFormControlTextarea1" rows="19" disabled>Hai, '+name+
    '!&#10;&#10;Terimakasih sudah melakukan RSVP untuk #WenSeulUniverse Jakarta, Pembayaran kamu sudah kami terima.'+
    '&#10;&#10;Jangan lupa untuk hadir di venue :'+
    '&#10;Toko Kopi Sejawat, Jakarta'+
    '&#10;Minggu, 16 Februari 2020'+
    '&#10;11.00-16.00 WIB'+
    '&#10;&#10;Maps : https://goo.gl/maps/jANxxLKvv2gjNCoT9'+
    '&#10;&#10;Dan jangan lupa juga untuk menunjukkan E-mail ini saat klaim freebies!'+
    '&#10;&#10;Kode : '+ticket+
    '&#10;&#10;Kami tunggu kehadiran kamu disana 💙💛'+

    '&#10;&#10;Regards,'+
    '&#10;Wenseul Universe JKT'+
    '</textarea>' +
    '</div>',
  allowOutsideClick: false,
    focusConfirm: false,
})

    });
    $(document).on('click','.btn-confirm', function(){
    var data = $(this).data("id");
        Swal.fire({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  title: 'Are you sure To Confirm This Data?',
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Confirm'
}).then((result) => {
  if (result.value) {
            var settings = {
            "async": true,
            "crossDomain": true,
            "url": "{{ url('api/orders/action') }}",
            "method": "POST",
            "data": {'id': data,'action': 1},
            beforeSend: function(xhr) {
                $('.btn-confirm').attr("disabled", true);
                $('.btn-cancel').attr("disabled", true);
                xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
            },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            tableorders.ajax.reload();
            Swal.fire('Confirmed!','','success').then((result) => {
                console.log('aw');
                if (result.value) {
                $("#em"+data).trigger("click");
                }
            });
        }).fail(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            Swal.fire('Failed!',response.message,'error')
        });
  }
});
        });
        $(document).on('click','.btn-ticket', function(){
            var ticket = $(this).data("ticket");
            window.open(url+'/tst.php?text='+ticket, '_blank'); 
        });
        $(document).on('click','.btn-cancel', function(){
    var data = $(this).data("id");
        Swal.fire({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  title: 'Are you sure To Cancel This Data?',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Cancel!'
}).then((result) => {
  if (result.value) {
            var settings = {
            "async": true,
            "crossDomain": true,
            "url": "{{ url('api/orders/action') }}",
            "method": "POST",
            "data": {'id': data,'action': 2},
            beforeSend: function(xhr) {
            $('.btn-confirm').attr("disabled", true);
            $('.btn-cancel').attr("disabled", true);
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
            },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            tableorders.ajax.reload();
            Swal.fire('Cancelled!','','success')
        }).fail(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            tableorders.ajax.reload();
            Swal.fire('Failed!',response.message,'error')
        });
  }
});
        });

        $(document).on('click','.btn-checkin', function(){
    var data = $(this).data("id");
        Swal.fire({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  title: 'Are you sure To Confirm This Data?',
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Checkin'
}).then((result) => {
  if (result.value) {
            var settings = {
            "async": true,
            "crossDomain": true,
            "url": "{{ url('api/orders/action') }}",
            "method": "POST",
            "data": {'id': data,'action': 4},
            beforeSend: function(xhr) {
                $('.btn-confirm').attr("disabled", true);
                $('.btn-checkin').attr("disabled", true);
                $('.btn-cancel').attr("disabled", true);
                xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
            },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-checkin').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            tableorders.ajax.reload();
            Swal.fire('Confirmed!','','success').then((result) => {
                if (result.value) {
                $("#em"+data).trigger("click");
                }
            });
        }).fail(function(response) {
            $('.btn-confirm').attr("disabled", false);
            $('.btn-chekin').attr("disabled", false);
            $('.btn-cancel').attr("disabled", false);
            Swal.fire('Failed!',response.message,'error')
        });
  }
});
        });
    $("div.toolbar").html('<div class="col-md-2" style="padding-left:30px;margin-right:15px"><div class="form-group"><select id="select-filter-transaksi" style="height: 35px;font-size: 13px;" class="form-control"><option value="">Filter Status</option><option value="3">Unonfirmed</option><option value="1">Confirmed</option><option value="2">Cancelled</option></select></div></div><div class="col-lg-9" style="padding-right: 0px;margin-right: 0px;"><div class="col-lg-12 pull-right" style="padding:0"><div class="input-group">   <input style="height: 37px;border-radius: 4px 0px 0px 4px;" placeholder="Cari Data" id="searchbox-tx" name="filter" class="form-control" type="text"></div></div></div>');
    $("#select-filter-transaksi").change(function(){
        var val = $(this).val();
        tableorders.columns(11).search($(this).val()).draw();
    });
    $('#searchbox-tx').on('keyup', function(){
        tableorders.search($(this).val()).draw();
    });

});
</script>
@endpush
<div class="row">
        <div class="col-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap text-center">
                            <div class="custom-title">Manage</div>
                        </div>
                    </div>
                    <div class="pt-3 pb-4 ml-0">
                    <div class="text-center mb-1">
                        @php /*Waiting : {{ $data['waiting'] }}, 
                        Unconfirmed : {{ $data['unconfirmed'] }}, 
                        Confirmed : {{ $data['confirmed'] }}, 
                        Cancelled : {{ $data['cancelled'] }},
                        */@endphp
                        Belum Check In : {{ $data['confirmed'] }}, 
                        Check In : {{ $data['checkin'] }}, 
                        Peserta : {{ $data['peserta'] }},
                        Total Data : {{ $data['total'] }}<br>
                        @foreach($data['shift'] as $shift)
                        Shift {{$shift->shift}} : {{$shift->jumlah}}, 
                        @endforeach
                        <br>
                        @foreach($data['bucin'] as $bucin)
                        Bucin {{$bucin->bucin}} : {{ $bucin->jml_bucin }}, 
                        @endforeach
                    </div>
                        <div class="table-responsive">
                            <table id="orders-table" class="table tablec table-bordered table-hover toggle-square default responsive dt-responsive" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="min-tablet">Date</th>
                                    <th>Name</th>
                                    <th class="min-tablet" width="5%">Username</th>
                                    <th class="min-tablet" width="5%">Email</th>
                                    <th class="min-tablet">Phone</th>
                                    <th class="min-tablet">Member</th>
                                    <th class="min-tablet">People</th>
                                    <th class="min-tablet">Total</th>
                                    <th class="min-tablet">Pengirim</th>
                                    <th class="min-tablet">Payment Slip</th>
                                    <th class="min-tablet">Shift</th>
                                    <th class="min-tablet">Status</th>
                                    <th class="min-tablet">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
