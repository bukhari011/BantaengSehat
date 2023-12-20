
@include('admin.includes.head')
<div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Register</h3>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control p_input @error('name') is-invalid @enderror" placeholder="Name" name="name">
                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group" hidden>
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="text" hidden class="form-control @error('role') is-invalid @enderror" name="role" value="Admin Klinik" required autocomplete="role" autofocus>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                <div class="form-group">
                  <input type="email" class="form-control p_input  @error('email') is-invalid @enderror" name="email" placeholder="Email" name="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">
                  <input type="password" class="form-control p_input" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control p_input @error('password') is-invalid @enderror" placeholder="Repeat Password" name="password_confirmation" >
                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check"><label><input type="checkbox" class="form-check-input">I Agree to the Terms & conditions</label></div>
                </div> --}}
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">SIG IN</button>
                </div>
                <p class="existing-user text-center pt-4 mb-0">Already have an acount?&nbsp;<a href="{{ route('login') }}">Sign up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.includes.script')