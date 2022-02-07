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
                            @if ($open == false)
                            <div class="card card-shadow mb-4 mt-5">
                                <div class="card-body text-center">
                                    <h4>Closed.</h4>
                                    <span class="text-muted">
                                        </span>
                                    </div>
                         </div>
                            @else
                            @if (Session::has('stepfinish'))
                            <div class="card card-shadow mb-4 mt-5">
                                    <div class="card-body text-center">
                                        <h4>Thank you for your payment.</h4>
                                        <span class="text-muted">We will make sure to check and confirm to you soon through email maximum 3 x 24 Hours.</span><br>
                                        <span class="text-muted">Payment Will be confirmed through RV INA Union official email <b>reveluvinaunion@gmail.com</b>.</span>
                                        </div>
                             </div>
                                    <button type="button" class="btn btn-danger float-right" id="finish">Finish <i class="ti-check"></i></button>
                            @else
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                        <div class="custom-title-wrap pb-1 mt-0">
                                            <div class="custom-title text-center pb-0">Order Form</div>
                                        </div>
                                    </div>
                            <div class="card-body">
                            <form id="registerform" method="post" class=" right-text-label-form" enctype="multipart/form-data" action="{{ route('order_submit') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" class="form-control{{$errors->has('name') ? ' is-invalid' : '' }}" id="InputName"
                                         name="name" aria-describedby="InputName" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                                        <small id="InputName" class="form-text text-muted">Enter Your Full Name.</small>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="InputName">Twitter/Instagram</label>
                                        <input type="text" class="form-control{{$errors->has('username') ? ' is-invalid' : '' }}" id="Inputusername"
                                         name="username" aria-describedby="Inputusername" value="{{ old('username') }}" placeholder="Twitter/Instagram Username" required autofocus>
                                        <small id="InputName" class="form-text text-muted">Enter Your Username.</small>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control{{$errors->has('email') ? ' is-invalid' : '' }}" id="InputEmail" name="email"
                                         aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Email address" required>
                                        <small id="emailHelp" class="form-text text-muted">Enter Your Email.</small>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="Inputphone">Phone Number</label>
                                        <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" 
                                        class="form-control{{$errors->has('phone') ? ' is-invalid' : '' }}" id="Inputphone"
                                         name="phone" aria-describedby="Inputphone" value="{{ old('phone') }}" placeholder="081xxxxx" required autofocus>
                                        <small id="Inputphone" class="form-text text-muted">Enter Phone Number.</small>
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="Inputaddress">Alamat Lengkap</label>
                                         <textarea class="form-control{{$errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}"
                                             id="exampleFormControlTextarea1" rows="3" name="address" placeholder="Jl. Proklamasi No.56, RT.10/RW.2, Pegangsaan, Kec. Menteng, Kota Jakarta Pusat, DKI Jakarta" required></textarea>
                                        <small id="Inputaddress" class="form-text text-muted">Enter Your Street Address.</small>
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                            <label for="Inputprovinsi">Provinsi</label>
                                            <select class="form-control{{$errors->has('provinsi') ? ' is-invalid' : '' }}" 
                                                id="provinsi" name="provinsi" required>
                                                <option value="" disabled selected>Please Select</option>
                                                <option value="1">Bali</option>
                                                <option value="2">Bangka Belitung</option>
                                                <option value="3">Banten</option>
                                                <option value="4">Bengkulu</option>
                                                <option value="5">DI Yogyakarta</option>
                                                <option value="6">DKI Jakarta</option>
                                                <option value="7">Gorontalo</option>
                                                <option value="8">Jambi</option>
                                                <option value="9">Jawa Barat</option>
                                                <option value="10">Jawa Tengah</option>
                                                <option value="11">Jawa Timur</option>
                                                <option value="12">Kalimantan Barat</option>
                                                <option value="13">Kalimantan Selatan</option>
                                                <option value="14">Kalimantan Tengah</option>
                                                <option value="15">Kalimantan Timur</option>
                                                <option value="16">Kalimantan Utara</option>
                                                <option value="17">Kepulauan Riau</option>
                                                <option value="18">Lampung</option>
                                                <option value="19">Maluku</option>
                                                <option value="20">Maluku Utara</option>
                                                <option value="21">Nanggroe Aceh Darussalam (NAD)</option>
                                                <option value="22">Nusa Tenggara Barat (NTB)</option>
                                                <option value="23">Nusa Tenggara Timur (NTT)</option>
                                                <option value="24">Papua</option>
                                                <option value="25">Papua Barat</option>
                                                <option value="26">Riau</option>
                                                <option value="27">Sulawesi Barat</option>
                                                <option value="28">Sulawesi Selatan</option>
                                                <option value="29">Sulawesi Tengah</option>
                                                <option value="30">Sulawesi Tenggara</option>
                                                <option value="31">Sulawesi Utara</option>
                                                <option value="32">Sumatera Barat</option>
                                                <option value="33">Sumatera Selatan</option>
                                                <option value="34">Sumatera Utara</option>
                                            </select>
                                            @if ($errors->has('provinsi'))
                                            <span class="invalid-feedback" style="display:block;">
                                                <strong>{{ $errors->first('provinsi') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group" id="list_kota" style="display:none;">
                                                <label for="Inputkota">Kota</label>
                                                <select class="form-control{{$errors->has('kota') ? ' is-invalid' : '' }}" id="kota" name="kota" required>
                                                    <option value="" disabled selected>Please Select</option>
                                                </select>
                                                @if ($errors->has('kota'))
                                                <span class="invalid-feedback" style="display:block;">
                                                    <strong>{{ $errors->first('kota') }}</strong>
                                                </span>
                                            @endif
                                            </div>
 
                                            <div class="form-group" id="form_pos" style="display:none;">
                                                    <label for="Inputkodepos">Kode Pos</label>
                                                    <input type="number"  pattern="[0-9]{10}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control{{$errors->has('kodepos') ? ' is-invalid' : '' }}" id="Inputkodepos"
                                                     name="kodepos" aria-describedby="Inputkodepos" value="{{ old('kodepos') }}" placeholder="Kode Pos" required autofocus>
                                                    @if ($errors->has('kodepos'))
                                                    <span class="invalid-feedback" style="display:block;">
                                                        <strong>{{ $errors->first('kodepos') }}</strong>
                                                    </span>
                                                @endif
                                                </div>

                                                <div class="form-group">
                                                        <label for="Inputtotalorder">Jumlah Pemesanan</label>
                                                        <input type="number"  pattern="[0-9]{10}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control{{$errors->has('totalorder') ? ' is-invalid' : '' }}" id="totalorder"
                                                         name="totalorder" min="1" max="50" aria-describedby="Inputtotalorder" value="{{ old('totalorder') }}" placeholder="1" value="1" required autofocus>
                                                        <span id="Inputtotalorder" class="form-text text-muted font-weight-bold">{{"Rp" . number_format(175000,0,',','.')}}/set.</span>
                                                        @if ($errors->has('totalorder'))
                                                        <span class="invalid-feedback" style="display:block;">
                                                            <strong>{{ $errors->first('totalorder') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="Inputdonasi">Jumlah Donasi (Optional)</label>
                                                            <input type="number" pattern="[0-9]{10}" min="0" class="form-control{{$errors->has('donasi') ? ' is-invalid' : '' }}" id="donasi"
                                                             name="donasi" aria-describedby="Inputdonasi" value="{{ old('donasi') }}" placeholder="Ex:50000">
                                                            <small id="Inputdonasi" class="form-text text-muted font-weight-bold">Donasi Untuk Project (Optional & Diluar Harga Bundle + Ongkos Kirim).</small>
                                                            @if ($errors->has('donasi'))
                                                            <span class="invalid-feedback" style="display:block;">
                                                                <strong>{{ $errors->first('donasi') }}</strong>
                                                            </span>
                                                        @endif
                                                        </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="Inputnickname">Have you joined Reveluv INA Union Line Square?</label>
                                        <select class="form-control{{$errors->has('join') ? ' is-invalid' : '' }}" id="join" name="join" required>
                                            <option value="" disabled selected>Please Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                        @if ($errors->has('join'))
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>{{ $errors->first('join') }}</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-group" id="nick" style="display:none;">
                                            <label for="Inputnickname" id="nicklabel"></label>
                                            <input type="text" class="form-control{{$errors->has('nickname') ? ' is-invalid' : '' }}" id="nickname"
                                             name="nickname" value="{{ old('nickname') }}" aria-describedby="Inputnickname" placeholder="Nickname" required>
                                            <small id="nickinfo" class="form-text text-muted"></small>
                                            @if ($errors->has('nickname'))
                                            <span class="invalid-feedback" style="display:block;">
                                                <strong>{{ $errors->first('nickname') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    -->
                                    <div class="text-center mb-0">
                                            <button type="submit" class="btn btn-danger" name="signup" id="signup" value="Sign up">Order</button>
                                    </div>
                                </form>
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
    $("#totalorder").val("1");
    //$("#signup").prop("disabled", true);
    //$('#registerform').validate();
    $('.iCheck-flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red',
    increaseArea: '20%' // optional
     });
     $('#confirmcheck').on('ifChanged', function(event) {
        if(event.target.checked){
        $('#next').removeAttr("disabled");
    }else{
        $('#next').attr("disabled", true);
    }
    });
    $("form").on("submit", function (e) {
         $('#alert-msg').hide();
    $('#back').attr("disabled", true);
    $("#signup").prop("disabled", true);
    $("#signup").html(
    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
    });
    $("#provinsi").on("change", function () {
        var val = $(this).val();
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": url+"/api/city",
        "method": "POST",
        "data": {'id': val},
        beforeSend: function(xhr) {
            $("#kota").html();
            $('#list_kota').hide();
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
        },"headers": {"accept": "application/json"}
    }
    $.ajax(settings).done(function(data) {
        var options = "";
        options += "<option disabled selected>Select Kota</option>"
     for (var i = 0; i < data.data.length; i++) {
         options += "<option value="+data.data[i].city_id+">"+data.data[i].type+" "+ data.data[i].city_name + "</option>";
     }
     $("#kota").html(options);
     $('#list_kota').show();
    }).fail(function(response) {
        $('#alert-message').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html(response.message);
    });
    });
    $("#kota").on("change", function () {
        $('#form_pos').show();
    }); 
    $("#next").click(function(){
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": url+"/api/next",
        "method": "POST",
        "data": {'step': 2},
        beforeSend: function(xhr) {
            $('#next').attr("disabled", true);
            $("#next").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
        },"headers": {"accept": "application/json"}
    }
    $.ajax(settings).done(function(response) {
        location.reload();
    }).fail(function(response) {
        $('#alert-message').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html(response.message);
    });
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
    $("#back").click(function(){
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": url+"/api/next",
        "method": "POST",
        "data": {'step': 1},
        beforeSend: function(xhr) {
            $("#signup").prop("disabled", true);
            $('#back').attr("disabled", true);
            $("#back").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
        },"headers": {"accept": "application/json"}
    }
    $.ajax(settings).done(function(response) {
        location.reload();
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

