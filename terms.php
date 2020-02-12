<?php require_once('config.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('partials/_head.php') ?>
  <body>
    <!-- Page header -->
    <?php require_once('partials/_header.php') ?>

    <!-- Main content -->
    <main id="main" tabindex="-1">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="my-4">
              Terms & conditions
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="lead">
              <?php echo $terms ?>
            </p>
          </div>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <?php require_once('partials/_scripts.php') ?>
  </body>
</html>
