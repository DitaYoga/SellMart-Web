<link rel="stylesheet" href="assets/css/all.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form action="{{ route('login-process') }}" method="POST" class="form-signin">
              <div class="form-label-group">
                {{ csrf_field() }}
                <input type="text" id="inputUserame" name="name" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>


              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
            

              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Login</button>
              <hr class="my-4">
              <p>Don't Have an Account? <a href="{{ url('/register') }}">Sign Up</a></p>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
