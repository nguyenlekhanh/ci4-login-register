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
        <form action="<?= base_url('auth/registerUser') ?>" class="form"
          method="post"
          class="form mb-3"
        >
          <?= csrf_field() ?>
          <div class="form-group mb-3">
              <label for="">Name</label>
              <input type="text" class="form-control"
                name="name"
                value="<?= set_value('name') ?>"
                placeholder="Name Here"
              >
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'name') : '' ?>
              </span>
          </div>

          <div class="form-group mb-3">
              <label for="">Email</label>
              <input type="text" class="form-control"
                name="email"
                value="<?= set_value('email') ?>"
                placeholder="Email Here"
              >
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
              </span>
          </div>
          <div class="form-group  mb-3">
              <label for="">Password</label>
              <input type="text" class="form-control"
                name="password"
                value="<?= set_value('people') ?>"
                placeholder="Password Here"
              >
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
              </span>
          </div>
          <div class="form-group  mb-3">
              <label for="">Password</label>
              <input type="text" class="form-control"
                name="passwordConf"
                value="<?= set_value('passwordConf') ?>"
                placeholder="Confirm Password Here"
              >
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'passwordConf') : '' ?>
              </span>
          </div>
          <div class="form-group  mb-3">
              <input type="submit" class="btn btn-info"
                name="Sign In"
              >
          </div>
        </form>

        <br>
        <a href="<?= site_url('auth'); ?>">
          I already have an account, login
        </a>
      </div>
    </div>

  </div>
</body>
</html>