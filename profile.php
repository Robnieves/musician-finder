<?php
  session_start();

  if(isset($_SESSION['userId'])) {
    require('./config/db.php');

    $userId = $_SESSION['userId'];


    if( isset($_POST['edit']) ) {

      $firstName = filter_var( $_POST["firstName"], FILTER_SANITIZE_STRING);
      $lastName = filter_var( $_POST["lastName"], FILTER_SANITIZE_STRING);
      $userEmail = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL);
      $post = filter_var( $_POST["post"], FILTER_SANITIZE_STRING);
      $talents = filter_var( $_POST["talents"], FILTER_SANITIZE_STRING);
      $state = filter_var( $_POST["state"], FILTER_SANITIZE_STRING);
      $honorarium = filter_var( $_POST["honorarium"], FILTER_SANITIZE_STRING);


      $stmt = $pdo -> prepare('UPDATE users SET firstName=?, lastName=?, email=?, post=?, talents=?, state=?, honorarium=? WHERE id=?');
      $stmt->execute([$firstName, $lastName, $userEmail, $post, $talents, $state, $honorarium, $userId]);
    }

    $stmt = $pdo -> prepare('SELECT * from users WHERE id = ?');
    $stmt->execute([$userId]);
    $totalUsers = $stmt->rowCount();

    $user = $stmt -> fetch();




  }


?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">

      <h2>Update Your Details</h2>

      <form class="register-form" action="profile.php" method="POST">

    <!-- name -->


              <div class="mb-3">


                <label for="firstName" class="form-label">First Name</label>
                <input  type="text" class="form-control" name="firstName" value="<?php echo $user->firstName ?>"> <br />

                <label for="lastName" class="form-label">Last Name Name</label>
                <input  type="text" class="form-control" name="lastName" value="<?php echo $user->lastName ?>"> <br />

                <label for="email" class="form-label">Email</label>
                <input  type="email" class="form-control" name="email" value="<?php echo $user->email ?>"> <br />
                <?php if (isset($emailTaken)) {?>

                <p style="color:red"><?php echo $emailTaken?></p>

              <?php } ?>

              <label for="post" class="form-label">Post Talent? yes/no</label>
              <input  type="text" class="form-control" name="post" value="<?php echo $user->post ?>"> <br />

              <label for="talents" class="form-label">Talents</label>
              <input  type="text" class="form-control" name="talents" value="<?php echo $user->talents ?>"> <br />

              <label for="state" class="form-label">State</label>
              <input  type="text" class="form-control" name="state" value="<?php echo $user->state ?>"> <br />

              <label for="honorarium" class="form-label">Honorarium</label>
              <input  type="text" class="form-control" name="honorarium" value="<?php echo $user->honorarium ?>"> <br />

              </div>


              <button name="edit" type="submit" class="btn btn-primary">Update Details</button>




      </form>



    </main>


<?php require('./inc/footer.html') ?>
