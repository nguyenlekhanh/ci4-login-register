<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <title>Dashboard</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
        <h4> <?=$title;?></h4>
        <hr>
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <td>
                <img src="/images/<?=$userInfo['avatar']?>" alt="" width="200px" height="150px">
                <form action="<?= base_url('auth/uploadImage') ?>"
                  method="post"
                  enctype="multipart/form-data"
                >
                  
                  <input type="file"
                    class="form-control"
                    name="userImage"
                    size="10"
                  />
                  <hr>
                  <input type="submit" />
                </form>
              </td>
              <td><?= $userInfo['name'] ?></td>
              <td><?= $userInfo['email'] ?></td>
              <td><a href="<?= site_url('auth/logout'); ?>">Logout</a></td>
            </tr>
          </tbody>
        </table>

        <?php 
          if(!empty(session()->getFlashData('notification'))) {
            ?>
              <div class="alert alert-success">
                <?=
                  session()->getFlashData('notification')
                ?>
              </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>  
</body>
</html>