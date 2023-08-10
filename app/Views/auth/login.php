<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-4 offset-4">
        <h4>Sign In</h4>
        <hr>
        <form actoin="" class="form"
          method="post"
          class="form mb-3"
        >
          <?= csrf_field() ?>
          <div class="form-group mb-3">
              <label for="">Email</label>
              <input type="text" class="form-control"
                name="email"
                placeholder="Email Here"
              >
          </div>
          <div class="form-group  mb-3">
              <label for="">Password</label>
              <input type="text" class="form-control"
                name="password"
                placeholder="Password Here"
              >
          </div>
          <div class="form-group  mb-3">
              <input type="submit" class="btn btn-info"
                name="Sign In"
              >
          </div>
        </form>
        
        <br>
        <a href="<?= site_url('auth/register'); ?>">
          Create a new account
        </a>

      </div>
    </div>

  </div>
</body>
</html>