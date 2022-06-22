<?php
  session_start();

  if(isset($_SESSION['userId'])) {
    require('./config/db.php');

    $userId = $_SESSION['userId'];

    if( isset($_POST['edit']) ) {

      $userEmail = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL);
      $stmt = $pdo -> prepare('UPDATE users SET email=? WHERE id=?');
      $stmt->execute([$userEmail, $userId]);
    }

    $stmt = $pdo -> prepare('SELECT * from users WHERE id = ?');
    $stmt->execute([$userId]);

    $user = $stmt -> fetch();


  }

  
?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">

      <h2>Update Your Details</h2>

      <form class="register-form" action="profile.php" method="POST">

    <!-- name -->


              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" name="email" value="<?php echo $user->email ?>"> <br />
                <?php if (isset($emailTaken)) {?>

                <p style="color:red"><?php echo $emailTaken?></p>

              <?php } ?>
              </div>


              <button name="edit" type="submit" class="btn btn-primary">Update Details</button>




      </form>



    </main>


<?php require('./inc/footer.html') ?>
