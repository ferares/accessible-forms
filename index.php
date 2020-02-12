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
        <!-- Page title -->
        <div class="row">
          <div class="col-12">
            <h1 class="my-4">
              Accessible forms
            </h1>
          </div>
        </div>

        <!-- Section #1 - Labeled form -->
        <section id="labeled-form" class="row mb-4" aria-labelledby="labeled-form-title">
          <div class="col-12">
            <form action="/server.php" method="post" novalidate disabled="disabled">
              <fieldset>
                <legend id="labeled-form-title">
                  1) Labeled form
                </legend>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="input-email">Email (required)</label>
                    <input id="input-email" type="email" class="form-control" name="email" required aria-describedby="input-email-feedback" autocomplete="email">
                    <div id="input-email-feedback" class="invalid-feedback" role="alert">
                      Please input a valid email address.
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-password">Password (required)</label>
                    <input id="input-password" type="password" class="form-control" name="password" required aria-describedby="input-password-feedback" autocomplete="off">
                    <div id="input-password-feedback" class="invalid-feedback" role="alert">
                      Please input a password.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="input-country">Country</label>
                    <select id="input-country" name="country" class="custom-select" autocomplete="country" value="1">
                      <option hidden value=""></option>
                      <?php foreach ($countries as $iso => $name) : ?>
                        <option value="<?php echo $iso ?>">
                          <?php echo $name ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-state">State/Province</label>
                    <input id="input-state" type="text" class="form-control" name="state" autocomplete="address-level1">
                  </div>
                  <div class="form-group col-12">
                    <label for="input-city">City</label>
                    <input id="input-city" type="text" class="form-control" name="city" autocomplete="address-level2">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-address">Street</label>
                    <input id="input-address" type="" class="form-control" name="address" autocomplete="street-address">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="input-address2">Apartment</label>
                    <input id="input-address2" type="text" class="form-control" name="address2" autocomplete="address-line1">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="input-zip">Zip code</label>
                    <input id="input-zip" type="text" class="form-control" name="zip" autocomplete="postal-code">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input id="input-terms" class="form-check-input" type="checkbox" name="terms" required autocomplete="off" aria-describedby="input-terms-feedback">
                    <label class="form-check-label" for="input-terms">
                      I accept the
                      <a href="/terms.php" class="btn btn-link p-0" data-toggle="modal" data-target="#modal-terms">
                        terms and conditions
                      </a>
                      (required)
                    </label>
                    <div id="input-terms-feedback" class="invalid-feedback" role="alert">
                      Please accept the terms and conditions.
                    </div>
                  </div>
                </div>
                <div class="alert js-form-message" role="alert">
                  <!-- Form validation & AJAX response messages -->
                </div>
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </fieldset>
            </form>
          </div>
        </section>
        <!-- Section #1 - Labeled form -->
        <section id="labelless-form" class="row mb-4">
          <div class="col-12">
            <h2>
              2) Label-less
            </h2>
          </div>
          <div class="col-12">
          </div>
        </section>
      </div>
    </main>

    <!-- Terms and conditions modal -->
    <!-- Modal -->
    <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-terms-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="modal-terms-title" class="modal-title">
              Terms and conditions
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo $terms ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <?php require_once('partials/_scripts.php') ?>
  </body>
</html>
