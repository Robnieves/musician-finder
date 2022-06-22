<?php

  session_start();

  if (isset($_SESSION['userId'])) {
    require ('./config/db.php');

    $userId = $_SESSION['userId'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$userId]);

    $user = $stmt->fetch();

    $currentUser = $user->email;


  }





?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">

      <?php if (isset($currentUser)) {?>

      <p><?php echo "<strong>Current User: </strong>".$currentUser?></p>

    <?php } ?>


      <h2>Welcome</h2>
      <p>
        This will be the page before logging into the system.
      </p>



    </main>


<?php require('./inc/footer.html') ?>
