<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Task Job</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
            </ul>
              <a href="{{ route('manager_login') }}" class="btn btn-outline-info" type="submit">Manager Login</a>
          </div>
        </div>
      </nav>

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">Employee Login</div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="">
                        @csrf
                        <div class="col-md-12">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="col-md-12">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-12">
                        <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>