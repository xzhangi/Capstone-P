var loginUser = document.getElementById('username');
var loginPassword = document.getElementById('password');

var signUpUser = document.getElementById('newUser');
var signUpNRIC = document.getElementById('newNRIC');
var signUpPW = document.getElementById('newPass');
var signUpName = document.getElementById('newName');
var signUpEmail = document.getElementById('newEmail');
var signUpPhone = document.getElementById('newPhone');

//Google captcha enable submit button
function recaptchaCallback() {
    $('#signUpBtn').removeAttr('disabled');
};

//Confirm password validation
function check(input) {
    if (input.value != document.getElementById('newPass').value) {
        input.setCustomValidity('Password does not match.');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
}

//JS Validations
//---Login---
function currLogIn() {
    loginUser.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid username consisting of 7 to 12 characters.');
    }
    loginPassword.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid password.');
    }
}
function newSignUp() {  
//---Signup---
    signUpUser.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid username consisting of 7 to 12 characters.');
    }
    signUpNRIC.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid NRIC.');
    }
    signUpPW.oninvalid = function(event) {
        event.target.setCustomValidity('Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.');
    }
    signUpName.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid name.');
    }
    signUpEmail.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid email address.');
    }
    signUpPhone.oninvalid = function(event) {
        event.target.setCustomValidity('Please enter a valid phone number.');
    }
}

function scaleCaptcha(elementWidth) {
  // Width of the reCAPTCHA element, in pixels
  var reCaptchaWidth = 800;
  // Get the containing element's width
    var containerWidth = $('.container').width();
  
  // Only scale the reCAPTCHA if it won't fit
  // inside the container
  if(reCaptchaWidth > containerWidth) {
    // Calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // Apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')'
    });
  }
}

$(function() { 
 
  // Initialize scaling
  scaleCaptcha();
  
  // Update scaling on window resize
  // Uses jQuery throttle plugin to limit strain on the browser
  $(window).resize( $.throttle( 100, scaleCaptcha ) );
  
});