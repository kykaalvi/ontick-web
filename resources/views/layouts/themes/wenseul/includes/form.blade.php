<div class="no-page-header header-filter m-0">
</div>
<div class="main">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card card-register">
              <div class="card-header">
                <img class="card-img" src="{{url('assets/blk/img/square1.png')}}" alt="Card image">
                <h5 class="card-title text-capitalize" style="color:#fded36">RSVP</h5>
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
                <input type="text" class="form-control" name="full_name" value="{{old('full_name')}}" placeholder="Full Name" required>
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
                    <label for="exampleInputEmail1">Instagram / Twitter</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Instagram / Twitter Username" required>
                  </div>
                  <small id="emailHelp" class="form-text text-muted">Enter Your Instagram or Twitter Username.</small>
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
                    <input type="number" max="50" min="1" value="1" name="people" value="{{old('people')}}" class="form-control" placeholder="Jumlah peserta" required>
                  </div>
                  <small id="emailHelp" class="form-text text-muted">Jumlah peserta (Jika lebih dari 1)</small>
                  @error('people')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Member</label>
                    <select class="form-control" name="bucin" placeholder="Member Pilihan Kamu" required>
                      <option style="color:gray" selected disabled>Select Member</option>
                      <option style="color:gray" value="Seulgi">Seulgi</option>
                      <option style="color:gray" value="Wendy">Wendy</option>
                    </select>
                  <small id="emailHelp" class="form-text text-muted">Pilih Paket Member Pilihan Kamu</small>
                  @error('bucin')
                  <span class="invalid-feedback" style="display:block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Proof Of Payment (Bukti Pembayaran)</label>
                    <input type="text" class="form-control" placeholder="Account Holder Name" id="sendername" name="sendername" required="">
                  </div>
                  <div class="custom-file text-left">
                    <input type="file" accept="image/jpg,image/png,image/jpeg" class="custom-file-input form-control" id="tfslip" name="tfslip" required>
                    <label class="custom-file-label" for="customFile">Choose image (Max 2MB)</label>
                    </div>
                  <div class="form-group text-center">
                  <button type="submit" class="btn btn-warning btn-round btn-lg">Submit</button>
                </div>
                </form>
              </div>
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
                    <td width="61%"><b>RSVP Fee ({people} {{(1> 1 ? 'Persons' : 'Person')}})</b></td>
                    <td>{{number_format(10000, 0, ".", ".")}}</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    <td class="float-right font-weight-bold">Total Transfer</td>
                    <td class="font-weight-bold">{{number_format(10000, 0, ".", ".")}}
                    <small id="senderHelp" class="form-text text-muted">Mohon Transfer Sesuai Nominal</small>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <form class="form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('order_confirm') }}">
                        @csrf
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