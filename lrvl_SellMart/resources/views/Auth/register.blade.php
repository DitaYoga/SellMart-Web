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
            <h5 class="card-title text-center">Register</h5>
            <form action="{{ route('register-process') }}" method="POST" class="form-signin">
              {{ csrf_field() }}
              <div class="form-label-group">
                <input type="text" id="inputNama" name="name" class="form-control" placeholder="Nama" required>
                <label for="inputNama">Nama</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputUserame" name="email" class="form-control" placeholder="Username" required>
                <label for="inputUserame">Email</label>
              </div>


              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
            

              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Register</button>
              <hr class="my-4">
              <p>Already Have an Account? <a href="{{ url('/') }}">Sign In</a></p>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
