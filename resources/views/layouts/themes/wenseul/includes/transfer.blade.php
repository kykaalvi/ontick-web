<div class="no-page-header header-filter m-0">
</div>
<style>
  .table .form-check label .form-check-sign::before,
.table .form-check label .form-check-sign::after {
  top: 0!important;
  left: 4px;
}
</style>
<div class="main">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 mt-2" id="paymentinfo"  style="display:none;">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-capitalize" style="color:#dc84c0">Payment Info</h4>
              </div>
              <div class="card-body">
                <p class="text-center mb-3">
                Please make payment to the following account below<br>
                </p>
                <div class="">
                <table class="table">
                <tbody>
                <tr>
                <td><b>Bank Name</b></td>
                <td><img draggable="false" src="{{url('assets/img/bca.svg')}}" alt="Bank BCA" width="82" length="82"></td>
                </tr>
                <tr>
                <td><b>Account Number</b></td>
                <td>5475212379 
                  <button type="button" class="ml-2 btn btn-sm btn-danger btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="5215017581" title="Copy to clipboard">
                  Copy
                </button></td>
                </tr>
                <tr>
                <td><b>Account Holder Name</b></td>
                <td>Rizkyka M. Alvi</td>
                </tr>
                <tr>
                <td><b>Jumlah Tiket</b></td>
                <td>
                    <form class="form">
                    <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                    </div>
                    <input type="number" max="50" min="1" value="1" id="jumlah_peserta" class="form-control" placeholder="Jumlah peserta" required>
                  </div>
                  <small id="emailHelp" class="form-text text-muted">Jumlah peserta (Jika lebih dari 1)</small>
                  </div></form>
                </td>
                </tr>
                <tr>
                  <td><b>Hari</b></td>
                  <td>
                    <div class="form-group">
                      <select class="form-control" id="day-step" name="day_step1" placeholder="Hari Pilihan Kamu" required>
                        <option style="color:gray" selected disabled>Select Hari</option>
                        <option style="color:gray" value="Sabtu">Sabtu, 21 Maret 2021</option>
                        <option style="color:gray" value="Minggu">Minggu, 22 Maret 2021</option>
                      </select>
                    <small id="emailHelp" class="form-text text-muted">Pilih Hari Pilihan Kamu</small>
                    </div>
                  </td>
                  </tr>
                  <tr id="shift-row" style="display: none;">
                    <td><b>Shift</b></td>
                    <td>
                      <div class="form-group">
                        <select class="form-control" id="shift-step" name="shift_step1" placeholder="Shift Pilihan Kamu" required>
                          <option style="color:gray" selected disabled>Select Shift</option>
                          <option style="color:gray" value="1">SHIFT 1 : 11.00 - 13.00</option>
                          <option style="color:gray" value="2">SHIFT 2 : 14.00 - 16.00</option>
                        </select>
                      <small id="emailHelp" class="form-text text-muted">Pilih Shift Pilihan Kamu</small>
                      </div>
                    </td>
                    </tr>
                <tr>
                  <td><b>Extra</b></td>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="ganci">
                        <span class="form-check-sign"></span>
                        <span class="font-weight-bold text-uppercase">extra</span> Complimentary <div style="d-sm-block">(+<span id="nominal-ganci">Rp. 10.000</span>)</div>
                      </label>
                    </div>
                  </td>
                  </tr>
                <tr id="rsvpcol">
                    <td><b>RSVP Fee <div id="people" style="d-sm-block">(1 Person)</div></b></td>
                    <td><div id="rsvpfee">Rp. 25.000</div></td>
                </tr>
                </tbody>
                </table>
                <div class="form-check float-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="confirmation">
                    <span class="form-check-sign"></span>
                    <span class="font-weight-bold">Saya Sudah Transfer</span></div>
                  </label>
                </div>
                <button id="next_btn" class="btn btn-warning btn-round btn-lg float-right" disabled="disabled">Next</button>
                </div>
                </div>
              <!--
              <div class="card-footer text-center">
              </div>
              -->
            </div>
          </div>
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3" id="rsvp_form" style="display:none;">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card card-register">
              <div class="card-header">
                <img class="card-img" src="{{url('assets/blk/img/square1.png')}}" alt="Card image">
                <h5 class="card-title text-capitalize" style="color:#f1cae4">RSVP</h5>
              </div>
              <div class="card-body">
                @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
                <form class="form" role="form" enctype="multipart/form-data" method="POST" action="{{ route('order_submit') }}">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                    </div>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{old('full_name')}}" placeholder="Full Name" required>
                  </div>
                  @error('full_name')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </div>
                    </div>
                    <input type="number" class="form-control" name="phone" value="{{old('phone')}}" placeholder="08125555555" required>
                  </div>
                  @error('phone')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                      </div>
                    </div>
                    <input type="text" placeholder="Email" name="email" value="{{old('email')}}" class="form-control" required>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter / Instagram</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Twitter / Instagram Username" required>
                  </div>
                  <small id="emailHelp" class="form-text text-muted">Enter Your Twitter or Instagram Username.</small>
                  @error('username')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah peserta</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                    </div>
                    <input type="number" max="50" min="1" value="1" name="people" id="peserta_form" class="form-control" placeholder="Jumlah peserta" required readonly>
                  </div>
                  @error('people')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                  <div id="single-member">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Member</label>
                    <select class="form-control opt-single" name="bucin" placeholder="Member Pilihan Kamu" required>
                      <option style="color:gray" selected disabled>Select Member</option>
                      <option style="color:gray" value="A">A</option>
                      <option style="color:gray" value="B">B</option>
                    </select>
                  <small id="emailHelp" class="form-text text-muted">Pilih Paket Member Pilihan Kamu</small>
                  @error('bucin')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                </div>
                <div id="multi-member" style="display:none;">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Member</label>
                  <div class="row mb-1">
                    <div class="col-sm-6 col-lg-3">
                      <div class="form-check mt-1 ml-1">
                        <label class="form-check-label">
                          <input class="form-check-input opt-multi" name="bucin[]" value="A" type="checkbox">
                          <span class="form-check-sign"></span>
                          <span class="font-weight-bold text-uppercase">A</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                      <div class="form-check mt-1 ml-1">
                        <label class="form-check-label">
                          <input class="form-check-input opt-multi" name="bucin[]" value="B" type="checkbox">
                          <span class="form-check-sign"></span>
                          <span class="font-weight-bold text-uppercase">B</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="display-member">
                <label for="exampleInputEmail1">Jumlah Member</label>
                <div class="form-group">
                  <label for="exampleInputEmail1">A</label>
                  <input type="number" class="form-control opt-desc mb-1" name="member_1" value="{{old('member_1')}}" placeholder="Jumlah">
                  <label for="exampleInputEmail1" class="mt-0">B</label>
                  <input type="number" class="form-control opt-desc" name="member_2" value="{{old('member_2')}}" placeholder="Jumlah">
                  <!-- <input type="text" class="form-control opt-multi" name="description" value="{{old('description')}}" placeholder="Contoh : B 5,A 3" required> -->
              </div>
            </div>
            </div>
                <div class="clearfix"></div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Proof Of Payment (Bukti Pembayaran)</label>
                    <input type="text" class="form-control" placeholder="Sender Name (Nama Rekening Pengirim)" id="sendername" name="sendername" required="">
                </div>
                  <div class="custom-file text-left mb-3">
                    <input type="file" accept="image/jpg,image/png,image/jpeg" class="custom-file-input form-control" id="tfslip" name="tfslip" required>
                    <label class="custom-file-label" for="customFile">Choose image (Max 2MB)</label>
                    </div>
                    <input type="hidden" name="shift_form" id="shift_form" value="">
                    <input type="hidden" name="day_form" id="day_form" value="">
                    <input type="hidden" name="ganci_form" id="ganci_form" value="">
                  <div class="form-group text-center">
                    <button id="back_btn" class="btn btn-danger btn-round btn-lg float-left">Back</button>
                  <button type="submit" id="submit" class="btn btn-warning btn-round btn-lg float-right" disabled>Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="register-bg"></div>
        <div id="square1" class="square square-1"></div>
        <div id="square2" class="square square-2"></div>
        <div id="square3" class="square square-3"></div>
        <div id="square4" class="square square-4"></div>
        <div id="square5" class="square square-5"></div>
        <div id="square6" class="square square-6"></div>
      </div>
    </div>
  </div>
  @push('scripts')
  <script>
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
function copyToClipboard(text, el) {
  var copyTest = document.queryCommandSupported('copy');
  var elOriginalText = el.attr('data-original-title');

  if (copyTest === true) {
    var copyTextArea = document.createElement("textarea");
    copyTextArea.value = text;
    document.body.appendChild(copyTextArea);
    copyTextArea.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'Copied!' : 'Whoops, not copied!';
      el.attr('data-original-title', msg).tooltip('show');
    } catch (err) {
      console.log('Oops, unable to copy');
    }
    document.body.removeChild(copyTextArea);
    el.attr('data-original-title', elOriginalText);
  } else {
    // Fallback if browser doesn't support .execCommand('copy')
    window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
  }
}
  $(document).ready(function(){
    var step = 1;
    var current_rsvp = localStorage.getItem('happinessrv_rsvp');
    if(step == 2){
        $("#paymentinfo").hide();
        $("#rsvp_form").fadeIn();
    }else{
        $("#paymentinfo").fadeIn();
        $("#rsvp_form").hide();    
    }
    $('.js-copy').click(function() {
    var text = $(this).attr('data-copy');
    var el = $(this);
    copyToClipboard(text, el);
    });
    $("#next_btn").on("touchstart click", function() {
        if($('#day-step').val() === null || $("#shift-step").val() === null){
         $("#day-step").focus().select();
         $("#shift-step").focus().select();
          return false;
        }
        $("#paymentinfo").hide();
        $("#rsvp_form").fadeIn();
        $("#full_name").focus();
        localStorage.setItem('happinessrv_step', 2);
    });
    $("#back_btn").on("touchstart click", function(e) {
        e.preventDefault();
        $("#rsvp_form").hide();
        $("#paymentinfo").fadeIn();
        $("#jumlah_peserta").focus();
        localStorage.setItem('happinessrv_step', 1);
    });
    $("#peserta_form").on("change keyup", function() {
      var val = $(this).val();
      $("#jumlah_peserta").val(val).trigger('change');
    });
    $("#jumlah_peserta").on("change", function() {
        var val = $(this).val();
        if(val < 1 || val > 50){
            $("#rsvpcol").fadeOut(50);
            $("#next_btn").attr("disabled", true);
            $("#paymentinfo").fadeIn();
            $("#rsvp_form").hide(); 
            return false;
        } else {
            $("#rsvpcol").fadeIn();
            //$("#next_btn").removeAttr("disabled");
         }
        $("#people").html("("+val+" "+(val > 1 ? 'Persons' : 'Person')+")");
        $("#peserta_form").val(val);
        var total = val*25000;
        $("#nominal-ganci").html(convertToRupiah(val*10000));
        if($('#ganci').is(':checked')){
          total = total + (10000*val);
        }
        $('#day-step').trigger('change');
        if(val > 1){
          console.log(val);
          $("#multi-member").fadeIn();
          $("#single-member").css("display", "none");
          $(".opt-single").attr("disabled",true);
          $(".opt-multi").removeAttr("disabled");
          $(".opt-desc").attr("disabled",true);
          if(val == 2){
            $("#display-member").hide();
          }else{
            $(".opt-desc").attr("required",true);
            $(".opt-desc").removeAttr("disabled");
            $("#display-member").show();
          }
        }else{
          $("#single-member").fadeIn();
          $("#multi-member").css("display", "none");
          $(".opt-multi").attr("disabled",true);
          $(".opt-single").removeAttr("disabled");
        }
        $("#rsvpfee").html(convertToRupiah(total));
        localStorage.setItem('happinessrv_rsvp', val);
    });

    $('#day-step').on("change", function() {
      $('#shift-row').hide();
        var day = $(this).val();
        if(day === null) return false;
        var person = $("#peserta_form").val();
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "{{url('')}}/api/shift",
          "method": "GET",
          "data": {'day': day},
          beforeSend: function(xhr) {
              $("#shift-step").html('');
              //xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
          },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(data) {
        var options = "";
        options += "<option disabled selected>Select Shift</option>";
        $.each(data, function(i, elem) {
         options += "<option value="+i+" "+(elem.left <= 0 || person > elem.left ? 'disabled' : '')+">"
         +elem.name+(elem.left <= 0 ? ' (Full)' : (person > elem.left ? ' (Exceed)' : ' Sisa : '+elem.left))+"</option>";
        });

      $("#shift-step").html(options);
      $('#shift-row').fadeIn();
      }).fail(function(response) {
        $('#alert-message').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html(response.message);
      });
      });

      $('#shift-step').on("change", function() {
        $("#shift_form").val($(this).val());
        $("#day_form").val($("#day-step").val());
      });

    $('#ganci').on("change", function() {
        var jml_peserta = $("#jumlah_peserta").val();
        var total = jml_peserta*25000;
        if ($(this).is(':checked')) {
          total = total + (10000*jml_peserta);
          $("#ganci_form").val(1);
        }else{
          $("#ganci_form").val(0);
        }
        $("#rsvpfee").html(convertToRupiah(total));
      });

      $('#confirmation').on("change", function() {
        if ($(this).is(':checked')) {
          $("#next_btn").removeAttr("disabled");
        }else{
          $("#next_btn").attr("disabled", true);
        }
      });
    if(current_rsvp > 0){
      $("#jumlah_peserta").val(current_rsvp).trigger("change");
    }

    $(".custom-file-input").on("change", function() {
        $("#submit").prop("disabled", false);
        if(this.files[0].size > 2097152){
            $("#submit").prop("disabled", true);
            $(this).val('');
            $(this).siblings(".custom-file-label").addClass("selected").html('Choose image (Max 2MB)');
            $('#alert-msg').addClass("alert-danger");
            $('#alert-msg').html("Image file is too big!");
            $('#alert-msg').show();
            alert("File is too big!");
        return false;
        }
     $('#alert-msg').hide();
     $("#submit").removeAttr("disabled");
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("form").on("submit", function (e) {
        if(!$("#tfslip").val()){
        $("#submit").prop("disabled", true);
        $('#alert-msg').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html("Image Can't Be Empty");
        return false;
         }
      $('#alert-msg').hide();
      $('#back').attr("disabled", true);
      $("#submit").prop("disabled", true);
      $("#submit").html(
      `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
      );
    });
  });
  </script>
  @endpush