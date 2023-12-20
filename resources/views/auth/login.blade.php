@include('admin.includes.head')

<div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control p_input" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control p_input" name="password" placeholder="Password">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check"><label><input type="checkbox" class="form-check-input">Remember me</label></div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">LOG IN</button>
                </div>
                <a href="{{ route('register') }}" class="google-login btn btn-create-account btn-block">Create An Account</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('admin.includes.script')