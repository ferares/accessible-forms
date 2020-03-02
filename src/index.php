<?php require_once('config.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Accessible forms</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/assets/style.css">
  </head>
  <body>

    <!-- Main content -->
    <main>
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
                    <label for="input-username">Username (required)</label>
                    <input id="input-username" type="username" class="form-control" username="username" required aria-describedby="input-username-feedback" autocomplete="username">
                    <div id="input-username-feedback" class="invalid-feedback" role="alert">
                      Please input a username.
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-email">Email (required)</label>
                    <input id="input-email" type="email" class="form-control" name="email" required aria-describedby="input-email-feedback" autocomplete="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}">
                    <div id="input-email-feedback" class="invalid-feedback" role="alert">
                      Please input a valid email address.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="input-password">Password (required)</label>
                    <input id="input-password" type="password" class="form-control" name="password" required aria-describedby="input-password-feedback" autocomplete="off">
                    <div id="input-password-feedback" class="invalid-feedback" role="alert">
                      Please input a password.
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-password2">Confirm password (required)</label>
                    <input id="input-password2" type="password2" class="form-control" name="password2" required aria-describedby="input-password2-feedback" autocomplete="off">
                    <div id="input-password2-feedback" class="invalid-feedback" role="alert">
                      Password and password confirmation don't match or are empty.
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
            These are the terms and conditions
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Custom script -->
    <script src="/assets/script.js"></script>
  </body>
</html>
