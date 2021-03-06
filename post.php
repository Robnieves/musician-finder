<?php


 require ('./config/db.php');

?>

  <?php require('./inc/header.html') ?>

  <main class="container mt-5">

    <h2>Post</h2>

    <form action="post.php" method="post">

  <!-- name -->

          <div class="d-flex justify-content-between">

            <div class="mb-3" style="width:49%">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName">
            </div>

            <div class="mb-3 mr-3" style="width:50%">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName">

            </div>


          </div>

  <!-- address     -->

  <div>

    <div class="mb-3 mr-3">
      <label for="streetAddress" class="form-label">Street Address</label>
      <input type="streetAddress" class="form-control" id="streetAddress">
    </div>

  </div>


  <div class="d-flex justify-content-between">

    <div class="mb-3 mr-3 me-1" style="width:69%">
      <label for="city" class="form-label">City</label>
      <input type="city" class="form-control" id="city">

    </div>

    <div class="mb-3 mr-3 me-1" style="width:9%">
      <label for="state" class="form-label">State</label>
      <input type="state" class="form-control" id="state">

    </div>

    <div class="mb-3 mr-3 me-1" style="width:19%">
      <label for="zipCode" class="form-label">Zip Code</label>
      <input type="zipCode" class="form-control" id="zipCode">

    </div>

  </div>

  <!-- Talents and Honorarium Request -->

  <div class="d-flex justify-content-between">

    <div class="mb-3" style="width:49%">
      <label for="talents" class="form-label">Talents</label>
      <input type="talents" class="form-control" id="talents">
    </div>

    <div class="mb-3 mr-3" style="width:50%">
      <label for="honorarium" class="form-label">Honorarium (including travel)</label>
      <input type="honorarium" class="form-control" id="honorarium">

    </div>


  </div>









          <button type="submit" class="btn btn-primary">Submit</button>
  </form>



  </main>


    <?php require('./inc/footer.html') ?>
