<div class="no-page-header header-filter m-0">
</div>
<div class="main">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 mt-2">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-capitalize" style="color:#fded36">Payment Info</h4>
              </div>
              <div class="card-body">
                <p class="text-center mb-3">Hello <b>{{$data->email}}</b><br>
                <span class="font-weight-bold">Please Save and Remember This Link For Your Payment Confirmation <br>
                <a href="{{url("order/{$data->hash}")}}">{{url("order/{$data->hash}")}}</a></span>
                <br>
                Please make payment to the following account below<br>
                </p>
                <div class="">
                <table class="table table-hover">
                <tbody>
                <tr>
                <td><b>Bank Name</b></td>
                <td><img draggable="false" src="{{url('assets/img/bca.svg')}}" alt="Bank BCA" width="82" length="82"></td>
                </tr>
                <tr>
                <td><b>Account Number</b></td>
                <td>5475212379</td>
                </tr>
                <tr>
                <td><b>Account Holder Name</b></td>
                <td>Rizkyka M Alvi</td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>
              <!--
              <div class="card-footer text-center">
              </div>
              -->
            </div>
          </div>
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-capitalize" style="color:#fded36">Rincian Pembyaran</h4>
              </div>
              <div class="card-body">
                <div class="">
                    <table class="table table-hover">
                    <tbody>
                    <tr>
                    <td><b>Nama</b></td>
                    <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                    <td><b>Email</b></td>
                    <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                    <td width="61%"><b>RSVP Fee ({{$data->people}} {{($data->people > 1 ? 'Persons' : 'Person')}})</b></td>
                    <td>{{number_format($data->total, 0, ".", ".")}}</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    <td class="float-right font-weight-bold">Total Transfer</td>
                    <td class="font-weight-bold">{{number_format($data->total, 0, ".", ".")}}
                    <small id="senderHelp" class="form-text text-muted">Mohon Transfer Sesuai Nominal</small>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <form class="form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('order_confirm') }}">
                        @csrf
                        <input type="hidden" name="hash" value="{{$data->hash}}">
                        <div class="form-group">
                    <label for="exampleInputEmail1">Proof Of Payment (Bukti Pembayaran)</label>
                    <input type="text" class="form-control" placeholder="Account Holder Name" id="sendername" name="sendername" required="">
                  </div>
                  <div class="custom-file text-left">
                    <input type="file" accept="image/jpg,image/png,image/jpeg" class="custom-file-input form-control" id="tfslip" name="tfslip" required>
                    <label class="custom-file-label" for="customFile">Choose image (Max 2MB)</label>
                    </div>
                  <div class="form-group text-center mt-3">
                  <button type="submit" class="btn btn-warning btn-round btn-lg">Submit</button>
                </div>
                </form>
              </div>
              <!--
              <div class="card-footer text-center">
              </div>
              -->
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
  $(document).ready(function(){
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
  });
  </script>
  @endpush