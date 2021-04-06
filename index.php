<?php
if(isset($_GET['success']) && $_GET['success']){
  $saving_successful = true;
}else{
  $saving_successful = false;
}
?><!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>pineapple</title>
<link rel='stylesheet' type='text/css' href='style.css'>
<link rel='stylesheet' type='text/css' href='lib/fontawesome-free-5.15.3-web/css/all.css'>
</head>
<body>
<span class='widget'>
<header>
<a href='#' class='logotype'><img src='image/logotype.png'><h1>pineapple.</h1></a>
<nav>
  <a href='#'>About</a>
  <a href='#'>How it works</a>
  <a href='#'>Contact</a>
</nav>
</header>
<main>
  <section id='subscription-block'>
  <?php if(!$saving_successful){ ?>
    <h1 id='subscribtion-title'>Subscribe to newsletter</h1>
    <p id='subscribtion-text'>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
    <form id='subscribtion-form' method='post' action='subscription.php'>
      <input type='text' id='email' name='email' placeholder='Type your email address here...' onchange='triggerValidation()'>
      <span id='error-notification'><noscript>JavaScript is disabled. Please enable it.</noscript></span>
      <input id='subscribtion-form-submit' type='submit' value='&#8594;' onclick='blockSubmit(event);triggerValidation()'>
      <label>
      	<div class='checkbox'>
      		I agree to <a href='#'>terms of service</a>
      		<input type='checkbox' id='terms_agree' name='terms_agree' onclick='triggerValidation()'>
      		<div class='checkmark'></div>
      	</div>
      </label>
    </form>
  <?php }else{ ?>
  	<img src='image/icon_cup.png'>
    <h1 id='subscribtion-title'>Thanks for subscribing!</h1>
    <p id='subscribtion-text'>You have successfully subscribed to our email listing.<br>
    	Check your email for the discount code.</p>
  <?php } ?>
  </section>
  <nav id='social-bookmarks'>
    <a href='#'><i class="fab fa-facebook" aria-hidden="true"></i></a>
    <a href='#'><i class="fab fa-instagram" aria-hidden="true"></i></a>
    <a href='#'><i class="fab fa-twitter" aria-hidden="true"></i></a>
    <a href='#'><i class="fab fa-youtube" aria-hidden="true"></i></a>
  </nav>
</main>
</span>
<span class='presentation'>
</span>
<script>
function blockSubmit(event){
  event.preventDefault();
}
function validateEmail(email){
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function removeNotification(){
  var error_block = document.getElementById("error-notification");
  error_block.classList.remove('show');
  error_block.textContent = '';
}

function createNotification(content){
  var error_block = document.getElementById("error-notification");
  error_block.classList.toggle('show');
  error_block.textContent = content;
}

function inputHasError(input_email,input_terms){
  if(input_email.value.length == 0) {
    return 'Email address is required';
  }
  if(!validateEmail(input_email.value)) {
    return 'Please provide a valid e-mail address';
  }
  if(input_email.value.slice(-3) === '.co') {
    return 'We are not accepting subscriptions from Colombia';
  }
  if(input_terms.checked !== true) {
    return 'You must accept the terms and conditions';
  }
  return false;
}

function triggerValidation(){
  var input_valid = false;
  var error_text = '';
  var submit_button = document.getElementById("subscribtion-form-submit");
  var input_email = document.getElementById("email");
  var input_terms = document.getElementById("terms_agree");
  var error_state = inputHasError(input_email,input_terms);
  if(error_state){
    submit_button.disabled = true;
    createNotification(error_state);
  }else{
    submit_button.disabled = false;
    removeNotification();
    submit_button.onclick = '';
  }
}
</script>
</body>
</html>
