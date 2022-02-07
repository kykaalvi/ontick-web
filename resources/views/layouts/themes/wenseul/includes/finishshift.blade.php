<div class="page-header">
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 mb-5 mt-5">
            </div>
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 mt-5">
            <div id="square7" class="square square-7"></div>
            <div id="square8" class="square square-8"></div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-capitalize" style="color:#fded36"></h4>
              </div>
              <div class="card-body">
                <div class="text-center mb-3">Thank you {{$data->name}}.
                </div>
                <p class="text-center">
                    Silahkan Datang Sesuai Dengan Shift Yang Telah Dipilih .<br>
					          See You At Universe 👋🏻
                </p>
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
   $(document).ready(function(){
    localStorage.setItem('wenseul_step', 1);
   });
   </script>
  @endpush