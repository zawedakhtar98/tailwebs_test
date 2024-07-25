  @extends('layout.main')
  @section('title') Login  @endsection
  @section('main-section')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <h1 class="text-danger text-center py-2 mt-5">tailwebs.</h1>
            <div class="card mt-5">
                <div class="card-body">
                  @if (session('error'))
                  <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>                        
                  @endif
                  <form class="p-5" method="post" action="{{url('verify-login')}}">
                      @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="email" name="email" placeholder="Enter Username" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" id="password" required>
                                <span class="input-group-text" onclick="togglePasswordVisibility()"><i class="fas fa-eye" id="togglePassword"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                          <p  class="text-end m-0"><a href="#">Forgot Password?</a></p>
                        </div>
                        <div class="d-grind mt-3 text-center">
                          <button type="submit" class="btn col-md-7 btn-dark">Login</button>                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>      
  @endsection

