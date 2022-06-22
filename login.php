<?php

session_start();

if (isset ( $_POST['login'])) {
  require ('./config/db.php');

  // $email = $_POST['email'];
  // $password = $_POST['password'];

  $email = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL );
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


  $stmt = $pdo->prepare ('SELECT * FROM users WHERE email = ?');
  $stmt->execute ([$email]);
  $user = $stmt->fetch();
  $totalUsers = $stmt->rowCount();

if ($totalUsers == 0){
  $wrongLogin = "The Login Email or Password is wrong";
} else {
  if(isset($user)) {
    if(password_verify($password, $user->password)){
      echo "The Password is correct";
      $_SESSION ['userId'] = $user->ID;
      header ('location: drummers.php');
    } else {
      $wrongLogin = "The Login Email or Password is wrong";
    }


}

}
}

//   if( filter_var($email, FILTER_VALIDATE_EMAIL)) {
//
//     $stmt = $pdo->prepare('SELECT * from users WHERE email = ?');
//     $stmt->execute([$email]);
//     $totalUsers = $stmt->rowCount();
//
//     // echo $totalUsers . '<br />';
//
//     if ( $totalUsers > 0 ) {
//
//       $emailTaken = "This email has already been taken";
//     } else {
//       $stmt = $pdo->prepare('INSERT into users (email, password) VALUES (?,?)');
//       $stmt->execute([$email, $passwordHashed]);
//     }
//
//   }
// }


?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">

      <h2>Login</h2>

      <form class="register-form" action="login.php" method="POST">

    <!-- name -->


              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" name="email"><br />
                <?php if (isset($wrongLogin)) {?>

                <p style="color:red"><?php echo $wrongLogin?></p>

              <?php } ?>
              </div>



              <div class="mb-3 mr-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" class="form-control" name="password">

              </div>

              <button name="login" type="submit" class="btn btn-primary">Login</button>




      </form>



    </main>


<?php require('./inc/footer.html') ?>
