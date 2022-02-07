<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta name="description" content="Reveluv INA UNION Order">
    <meta name="author" content="Kyka Alvi">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ url('assets/img/rvfavicon.png') }}">
    <title>Reveluv INA Union - Order</title>

    <!--web fonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->

    <!--icon font-->
    <link href="{{ url('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <!--iCheck-->
    <link href="{{ url('assets/vendor/icheck/skins/all.css') }}" rel="stylesheet">
    <!--jquery ui
    <link href="{{ url('assets/vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

-->
    <!--custom styles-->
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/vendor/html5shiv.js') }}"></script>
    <script src="{{ url('assets/vendor/respond.min.js') }}"></script>
    <![endif]-->

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="assets/vendor/custom-nav/css/effects/fade-menu.css') }}"/>-->
    <link rel="stylesheet" href="{{ url('assets/vendor/custom-nav/css/effects/slide-menu.css') }}"/>
    <!--<![endif]-->
    <script>var url = '{{ url('') }}';</script>
</head>
<body>
<div class="app-body">
    <!--main content wrapper-->
        <div class="content-wrapper pt-0">
            <div class="container">
                <div class="row mb-0">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card mb-1 border-0" style="background-color: transparent;">
                            <div class="card-body mb-0">
                                <div class="text-center">
                                    <div class="mt-1 mb-2">
                                        <img draggable="false" class="rounded-circle" src="{{ url('assets/img/RVIU.png') }}" width="85" alt="RV INA UNION">
                                    </div>
                                    <h5 class="text-uppercase mb-0">ReVeluv INA Union</h5>
                                    <h6 class="text-uppercase mb-0">Festival Bundle 2019</h6>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
                <div class="row">
                        <div class="col-md-3 col-xl-3">
                        </div>
                    <div class="col-md-6 col-xl-6">
                            <div class="alert" role="alert" id="alert-msg" style="display:none;"></div>
                        @if (Session::has('stepfinish') or !empty($data->payment_slip))
                        <div class="card card-shadow mb-4 mt-5">
                                <div class="card-body text-center">
                                    <h4>Thank you for your payment {{$data->email}}.</h4>
                                    <span class="text-muted">We will make sure to check and confirm to you soon through email.</span><br>
                                    <span class="text-muted">Payment will be confirmed through Reveluv INA Union official email <b>reveluvinaunion@gmail.com</b>.</span>
                                    </div>
                         </div>
                                <button type="button" class="btn btn-danger float-right" id="finish">Finish <i class="ti-check"></i></button>
                        @else
                        @if(empty($data->ongkir) or $data->ongkir < 1)
                        <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                        <div class="custom-title-wrap pb-1 mt-0">
                                            <div class="custom-title text-center pb-0">Payment Info</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                        <p class="text-center">Terjadi Kesalahan, Silahkan Menghubungi Admin</b></p>
                    </div>
                </div>
                        @else
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                    <div class="custom-title-wrap pb-1 mt-0">
                                        <div class="custom-title text-center pb-0">Payment Info</div>
                                    </div>
                                </div>
                        <div class="card-body">
                                <p class="text-center">Hello <b>{{$data->email}}</b><br>
                                <small class="font-weight-bold">Please Remember This Link For Your Payment Confirmation <br>
                                    <a href="{{url()->current()}}">{{url()->current()}}</a></small>
                                    <br>
                                    Please make payment to the following account below<br>
                                </p>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td><b>Bank Name</b></td>
                                        <td><img draggable="false" src="{{ url('assets/img/bca.svg') }}" alt="Bank BCA" width="82" length="82" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Account Number</b></td>
                                        <td>3910100512</td>
                                    </tr>
                                    <tr>
                                        <td><b>Account Holder Name</b></td>
                                        <td>Regina Cecilia</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                        <div class="custom-title-wrap pb-1 mt-0">
                                            <div class="custom-title text-center pb-0">Rincian Pembelian</div>
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                        <td><b>Nama</b></td>
                                        <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                                <td><b>No. Handphone</b></td>
                                                <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                                <td><b>Alamat</b></td>
                                                <td>{{$data->address}} {{$data->kodepos}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Harga ({{$data->totalorder}} set)</b></td>
                                            <td>{{"Rp" . number_format($data->harga,0,',','.')}}</td>
                                        </tr>
                                        @if(!empty($data->donasi) and $data->donasi > 0)
                                        <tr>
                                                <td><b>Donasi</b></td>
                                                <td>{{"Rp" . number_format($data->donasi,0,',','.')}}</td>
                                            </tr>
                                        <tr>
                                         @endif
                                            <td width="61%"><b>Biaya Pengiriman (JNE Reg)</b></td>
                                            <td>{{"Rp" . number_format($data->ongkir,0,',','.')}}</td>
                                        </tr>
                                        <tr>
                                    </tr>
                                        <tr>
                                            <td class="float-right font-weight-bold">Total Transfer</td>
                                            <td class="font-weight-bold">{{"Rp" . number_format($data->total,0,',','.')}}
                                                <small id="senderHelp" class="form-text text-muted">Harap Transfer Sesuai Nominal</small>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form id="confirmform" class=" right-text-label-form" method="post" enctype="multipart/form-data" action="{{ route('order_confirm') }}">
                                @csrf
                                <input type="hidden" id="id_order" name="hash" value="{{$data->hash}}">
                            <div class="form-group">
                                <label for="pop">Proof Of Payment</label>
                                <input type="text" class="form-control{{$errors->has('sendername') ? ' is-invalid' : '' }}" id="InputPOP"
                                 name="sendername" value="{{ old('sendername') }}" aria-describedby="senderHelp" placeholder="Account Holder Name" required>
                                <small id="senderHelp" class="form-text text-muted">Enter Account Holder Name.</small>
                                @if ($errors->has('sendername'))
                                <span class="invalid-feedback" style="display:block;">
                                    <strong>{{ $errors->first('sendername') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="bd-example mb-3">
                                        <div class="custom-file">
                                                <input type="file" accept="image/jpg,image/png,image/jpeg" class="custom-file-input form-control{{$errors->has('tfslip') ? ' is-invalid' : '' }}"
                                                 id="tfslip" name="tfslip" required>
                                                <label class="custom-file-label" for="customFile">Choose image (Max 2MB)</label>
                                       </div>
                                       <small id="emailHelp" class="form-text text-muted">Max 2MB.</small>
                                </div>
                                @if ($errors->has('tfslip'))
                                <span class="invalid-feedback" style="display:block;">
                                    <strong>{{ $errors->first('tfslip') }}</strong>
                                </span>
                             @endif
                                <div>
                                            <input type="checkbox" id="confirmcheck" class="iCheck-flat-red">
                                        <label class="control-label">I have made a payment</label>
                                <button type="submit" class="btn btn-danger float-right" name="confirm" id="confirm" value="next" disabled>Confirm <i class="ti-angle-right"></i></button>
                                        </form>
                            </div>
                            </div>
                            @endif
                    @endif
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        </div>
                </div>
            </div>
        <!--/main content wrapper-->
        @if (!Session::has('stepfinish'))
        <!--footer-->
        
                <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright &copy; 2019, Reveluv INA Union</small>
                    <small> | Made with <span style="color: #e25555;" class="fa fa-heart"></span> by KA</small>
                </div>
            </div>
        </footer>
        <!--/footer-->
        @else
        @php Session::forget('stepfinish'); @endphp
        @endif
    </div>
    </div>
    <!--basic scripts-->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.nicescroll.min.js') }}"></script>    
    <script src="{{ url('assets/vendor/icheck/skins/icheck.min.js') }}"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/vendor/modernizr.js') }}"></script>
    <![endif]-->
    <script>
        $(document).ready(function(){
    $('img').bind('contextmenu', function(e) {
        return false;
    });
    $('.iCheck-flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red',
    increaseArea: '20%' // optional
     });
     $('#confirmcheck').on('ifChanged', function(event) {
        if(event.target.checked){
        $('#confirm').removeAttr("disabled");
    }else{
        $('#confirm').attr("disabled", true);
    }
    });
    $(".custom-file-input").on("change", function() {
        $("#signup").prop("disabled", false);
        if(this.files[0].size > 2097152){
            $("#signup").prop("disabled", true);
            $(this).val('');
            $(this).siblings(".custom-file-label").addClass("selected").html('Choose image (Max 2MB)');
            $('#alert-msg').addClass("alert-danger");
            $('#alert-msg').html("Image file is too big!");
            $('#alert-msg').show();
            alert("File is too big!");
        return false;
        }
        $('#alert-msg').hide();
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("form").on("submit", function (e) {
        if(!$("#tfslip").val()){
        $("#signup").prop("disabled", true);
        $('#alert-msg').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html("Image Can't Be Empty");
        return false;
         }
         $('#alert-msg').hide();
    $('#back').attr("disabled", true);
    $("#signup").prop("disabled", true);
    $("#signup").html(
    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
    $("#confirm").html(
    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
    });

    $("#finish").click(function(){
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": url+"/api/next",
            "method": "POST",
            "data": {'step': 1},
            beforeSend: function(xhr) {
                $("#signup").prop("disabled", true);
                $('#finish').attr("disabled", true);
                $("#finish").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
                xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
            },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(response) {
            window.location.replace(url);
        }).fail(function(response) {
            $('#alert-message').show();
            $('#alert-msg').addClass("alert-danger");
            $('#alert-msg').html(response.message);
        });
        });  
});
    </script>
    <noscript>Sorry, your browser does not support JavaScript!</noscript>
</body>
</html>