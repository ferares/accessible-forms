// Default messages for the user
var messages = {
  inputError: 'Please correct the errors and try again.',
  submitting: 'Your data is being submitted.',
  serverErrors: 'Please correct the errors and try again.',
  serverFatalError: 'There was an error processing your request, please try again.',
};

/**
 * Displays a message inside a DOM element, setting its appropiate
 * class based on the type of message.
 * @prerequisite The $formMessage element needs to have the class 'alert'
 * @param $formMessage - jQuery element containing the DOM element in which to display the message.
 * @param message - Message to display.
 * @param type - Type of message ['danger', 'success', 'info'].
 */
function displayFormMessage($formMessage, message, type) {
  // 'Clean' the $formMessage's classes
  $formMessage.removeClass('alert-danger');
  $formMessage.removeClass('alert-success');
  $formMessage.removeClass('alert-info');
  // Set the appropiate class
  $formMessage.addClass('alert-' + type);
  // Display the desired message
  $formMessage.html(message);
}

/**
 * Displays an input error next to the target input
 * @param $input - jQuery element containing the input element.
 * @param message - Message to display.
 * @param i - Unique number identifier for the error for the given input.
 */
function displayInputError($input, message, i) {
  // Create an id for the error message
  var id = + 'input-' + $input.attr('name') + '-feedback-' + i;
  $input.attr('aria-describedby');
  // Create an element containing the error message
  var $error = $('<div>', { class: 'invalid-feedback js-server-feedback', role: 'alert', id: id }).append(message);
  // Insert the element containing the error message after the input
  $input.after($error);
  // Explicity mark the input as invalid
  $input.addClass('is-invalid');
  // Mark the input as invalid for screen readers
  $input.attr('aria-invalid', 'true');
}

function validatePasswordConfirmation($password, $confirmation) {
  if (($password.val() != $confirmation.val())) {
    $confirmation.addClass('is-invalid');
    $confirmation.attr('aria-invalid', 'false');
  }
}

/**
 * Validate a form element and mark its validity.
 * @param element - The form element to validate.
 * @return boolean - The validity of the element.
 */
function validateInput(element) {
  // Check the element's validity
  if (element.checkValidity()) {
    // Remove the explicit 'invalid' mark (if present)
    $(element).removeClass('is-invalid');
    // Mark the element as valid for screen readers
    $(element).attr('aria-invalid', 'false');
    return true;
  } else {
    // Mark the element as invalid for screen readers
    $(element).attr('aria-invalid', 'true');
    return false;
  }
}

/**
 * Validate a form by checking its required fields and emails format.
 * @param form - The form to validate.
 * @return boolean - The validity of the form.
 */
function validateForm(form) {
  var elements = form.elements; // Form controls
  // For each form control
  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    if (!validateInput(element)) {
      // Set the focus on the first invalid control
      element.focus();
      return false;
    }
  }

  return true;
}

/**
 * Tests the validity of a form and Submits it if it's valid.
 * @prerequisite The Form has a nested div with the class 'js-form-message' for displaying messages to the user
 * @prerequisite The form has a nested fieldset
 * @prerequisite The form has its 'action' and 'method' attributes populated
 * @param event - Form submit event.
 */
function submitForm(event) {
  event.preventDefault();
  var $form = $(event.currentTarget); // Get the form
  var $fieldset = $form.find('fieldset'); // Fieldset wrapper
  var $formMessage = $form.find('.js-form-message'); // Form message element

  // Check if form is valid
  if (!validateForm($form[0])) {
    // Signal the form as invalid
    $form.addClass('was-validated');
    // Alert the user that the form is invalid
    displayFormMessage($formMessage, messages.inputError, 'danger');
    return;
  }

  // Get form data
  var url = $form.attr('action');
  var method = $form.attr('method');
  var data = $form.serialize();

  // Disable the form
  $fieldset.attr('disabled', 'disabled');

  // Signal the user that we're waiting for a response
  displayFormMessage($formMessage, messages.submitting, 'info');

  // Remove all server error messages
  $('.js-server-feedback').remove();

  $.ajax({
    type: method,
    url: url,
    data: data,
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
    success: function (response) {
      if (response.error) {
        // Show the submission error messages to the user
        // For every input that has errors
        for (var error in response.body) {
          if (response.body.hasOwnProperty(error)) {
            // Get the input
            var $input = $form.find('[name="' + error + '"]');
            // Get every error for said input
            for (var i = 0; i < response.body[error].length; i++) {
              // Get an error
              var message = response.body[error][i];
              // Display the error to the user
              displayInputError($input, message, i);
            }
          }
        }
        // Show an error message to the user
        displayFormMessage($formMessage, messages.serverErrors, 'danger');
      } else {
        // Show submission response to the user
        displayFormMessage($formMessage, response.body, 'success');
        // Remove the was-validated class from the form so we don't show errors
        $form.removeClass('was-validated');
        // Reset the form
        $form[0].reset();
      }
    },
    error: function (response) {
      // Show an error message to the user
      displayFormMessage($formMessage, messages.serverFatalError, 'danger');

      // Log the error response
      console.error(response);
    },
    complete: function () {
      // Enable the form again
      $fieldset.removeAttr('disabled');
    }
  });
}

$(document).ready(function () {
  var $forms = $('form');

  // Hook the forms' submit event to the submitForm function
  $forms.on('submit', submitForm);

  // Update the validity of each form control on user input
  $forms.each(function (index, form) {
    $(form.elements).on('input', function (event) {
      validateInput(event.target);
    });
  });
});
