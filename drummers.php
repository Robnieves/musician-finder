<?php

  session_start();

  if (isset($_SESSION['userId'])) {
    require ('./config/db.php');

    $userId = $_SESSION['userId'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    $totalUsers = $stmt->rowCount();

    $currentUser = $user->firstName;


    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    $posts = $stmt->fetchAll();


  }





?>

<?php require('./inc/header.html') ?>

    <main class="container mt-5">


      <?php if (isset($currentUser)) {?>

      <p><?php echo "Welcome, ".$currentUser?></p>

    <?php } ?>


      <h2>Drummers Page</h2>
      <p>
        This will be our starting page for drummers.
      </p>


<div class="container">

    <?php foreach($posts as $post) {?>

      <?php if ($post->post === "yes") { ?>

      <div class="card">
          <div class="card-header bg-light mb-3"><strong><?php echo $post->firstName . " " . $post->lastName?><br /></strong> </div>
          <div class="card-body">

            <em><?php echo $post->talents ?><br /></em>
            <p><strong>State: </strong><?php echo $post->state ?></p>
            <p><?php echo "$" . $post->honorarium . " per hour"?> </p>



          </div>

           <?php } ?>

        <?php } ?>

    </div>

    </main>

</div>

<?php require('./inc/footer.html') ?>
