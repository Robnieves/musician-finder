<?php

if (isset ( $_POST['register'])){
  require ('./config/db.php');

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
  $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
  $email = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL );
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

  if( filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $stmt = $pdo->prepare('SELECT * from users WHERE email = ?');
    $stmt->execute([$email]);
    $totalUsers = $stmt->rowCount();

    // echo $totalUsers . '<br />';

    if ( $totalUsers > 0 ) {

      $emailTaken = "This email has already been taken";
    } else {
      $stmt = $pdo -> prepare('INSERT into users(firstName, lastName, email, password) VALUES(? , ?, ? ,?) ');
      $stmt -> execute( [ $firstName, $lastName, $email, $passwordHashed] );
      header ('location: login.php');
    }

  }
}



?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">

      <h2>Register</h2>

      <form class="register-form" action="register.php" method="POST">

    <!-- name -->


              <div class="mt-">


                <label for="firstName" class="form-label">First Name</label>
                <input required type="type" class="form-control" name="firstName"><br />

                <label for="lastName" class="form-label">Last Name</label>
                <input required type="type" class="form-control" name="lastName"><br />


                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" name="email"><br />
                <?php if (isset($emailTaken)) {?>

                <p style="color:red"><?php echo $emailTaken?></p>

                <?php } ?>

              <label for="password" class="form-label">Password</label>
              <input required type="password" class="form-control" name="password"><br />

              <label for="post" class="form-label">Would you like to post your talents? yes or no</label>
              <input required type="type" class="form-control" name="post"><br />

              <label for="state" class="form-label">State</label>
              <input required type="type" class="form-control" name="state"><br />

              <label for="honorarium" class="form-label">Honorarium</label>
              <input required type="type" class="form-control" name="honorarium"><br />





              <div class="mb-3 mr-3">


              </div>

              <button name="register" type="submit" class="btn btn-primary">Register</button>




      </form>



    </main>


<?php require('./inc/footer.html') ?>
