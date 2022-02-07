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
                <h4 class="card-title text-capitalize" style="color:#fded36">Informasi</h4>
              </div>
              <div class="card-body">
               <!-- <p class="text-center mb-3">Hello <b>{{$data->email}}</b><br>
                <span class="font-weight-bold">Please Save and Remember This Link For Your Payment Confirmation <br>
                <a href="{{url("order/{$data->hash}")}}">{{url("order/{$data->hash}")}}</a></span>
                <br>
                Please make payment to the following account below<br>
                </p> -->
                <div class="mb-3">
                <p class="text-center">
                Hai {{$data->name}}, Berhubung yang RSVP banyak sekali dan venue takutnya tidak cukup
                maka kita bakal bikin 3 shift acara WenSeul Universe Jakarta agar semua nyaman dan acara dapat berjalan dengan teratur
                </p>
                <br>
                <div style="color:rgba(255, 255, 255, 0.8)">
                    <ul>
                <li><span class="font-weight-bold">SHIFT TIDAK TERIKAT,</span>
                kita gak bakal ngusir kalau kamu datang telat atau mau stay lebih lama, asal jika yang punya shift sudah datang mohon dikasih space ya buat yang punya shift
                </li>
                <li class="font-weight-bold">Semua SHIFT ADA games dan hadiah</li>
                <li class="font-weight-bold">Semua RSVP dapat CUPHOLDER</li>
            </ul>
                </div>
                <p class="text-center">
                    Doorprize wendy blanket dari wenever akan di undi buat semua yang hadir dan post foto menggunakan hashtag #WenSeulUniverse + tag twitter 
                    <a href="https://twitter.com/nnaasappi" class="font-weight-bold" target="_blank">@nnaasappi</a> / <a href="https://twitter.com/ddigiday_ina94" class="font-weight-bold" target="_blank">@ddigiday_ina94</a>
                </p>
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
                <h4 class="card-title text-capitalize" style="color:#fded36">Pengisian Shift</h4>
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
                    <td width="61%"><b>RSVP</b></td>
                    <td>{{$data->people}} {{($data->people > 1 ? 'Persons' : 'Person')}}</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    @php
                    $shift_1 = (!empty($data->jml_shift[0]) ? $data->jml_shift[0]->jml : 0);
                    $shift_2 = (!empty($data->jml_shift[1]) ? $data->jml_shift[1]->jml : 0);
                    $shift_3 = (!empty($data->jml_shift[2]) ? $data->jml_shift[2]->jml : 0);
                    $sisa_1 = 50 - $shift_1;
                    $sisa_2 = 50 - $shift_2;
                    $sisa_3 = 60 - $shift_2;
                    @endphp
                    <form class="form" role="form" method="POST" action="{{ route('shift_submit') }}">
                        @csrf
                        <input type="hidden" name="hash" value="{{$data->hash}}">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pilih Shift</label>
                          <select class="form-control" name="shift" id="shift" placeholder="Shift" autofocus required>
                            <option style="color:gray" selected disabled>Pilih Shift</option>
                            <option style="color:gray" value="1" id="s_1" {{$sisa_1 <= 0 ? 'disabled' : ''}}>SHIFT 1 : 11.00-12.30 {{$sisa_1 <= 0 ? '(Full)' : ''}}</option>
                            <option style="color:gray" value="2" id="s_2" {{$sisa_2 <= 0 ? 'disabled' : ''}}>SHIFT 2 : 12.50-14.20 {{$sisa_2 <= 0 ? '(Full)' : ''}}</option>
                            <option style="color:gray" value="3" id="s_3" {{$sisa_3 <= 0 ? 'disabled' : ''}}>SHIFT 3 : 14.40-16.10 {{$sisa_3 <= 0 ? '(Full)' : ''}}</option>
                          </select>
                        <small id="emailHelp" class="form-text text-muted">Pilih Shift</small>
                        @error('shift')
                        <span class="invalid-feedback" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pilih Shift Alternatif</label>
                          <select class="form-control" name="alternate_shift" id="alternate_shift" placeholder="Shift" required>
                            <option style="color:gray" selected disabled>Pilih Shift Alternatif</option>
                            <option style="color:gray" class="as" value="1" id="as_1">SHIFT 1 : 11.00-12.30 {{$sisa_1 <= 0 ? '(Full)' : ''}}</option>
                            <option style="color:gray" class="as" value="2" id="as_2">SHIFT 2 : 12.50-14.20 {{$sisa_2 <= 0 ? '(Full)' : ''}}</option>
                            <option style="color:gray" class="as" value="3" id="as_3">SHIFT 3 : 14.40-16.10 {{$sisa_3 <= 0 ? '(Full)' : ''}}</option>
                          </select>
                        <small id="emailHelp" class="form-text text-muted">Jika pilihan shift pertama sudah full akan dialihkan sesuai pilihan alternatif shift, mohon pilih yg berbeda dari pilihan pertama ya.</small>
                        @error('alternate_shift')
                        <span class="invalid-feedback" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                  <div class="form-group text-center mt-3">
                  <button type="submit" id="submit" class="btn btn-warning btn-round btn-lg">Submit</button>
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
    $("form").on("submit", function (e) {
    $("#submit").prop("disabled", true);
    $("#submit").html(
    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
    });
    $("#shift").on("change", function() {
      var shift = $("#shift").val();
      $(".as").removeAttr('disabled');
      if(shift != ''){
        $("#as_"+shift).attr('disabled',true);
        console.log("disabling "+shift);
      }
    });
  });
  </script>
  @endpush