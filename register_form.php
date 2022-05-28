<h2>Hi !</h2>
<h4>Lets create your account</h4>
<form action="./register.php" class="loginform" method="post">
  <input type="text" class="login_input" placeholder="Your Name" maxlength="64" name="name" required>
  <br>
  <input type="text" class="login_input <?php if($_SESSION['mailError']=='yes'){echo'formErrorinp';} ?>" placeholder="Your Best Email" maxlength="99" name="email" required>
  <span class="<?php if($_SESSION['mailError']=='yes'){echo'formError';}else{echo'hide';} ?>">This email are already registered, please submit again</span>
  <br>
  <input type="text" class="login_input <?php if($_SESSION['phoneError']=='yes'){echo'formErrorinp';} ?>" placeholder="Phone" maxlength="20" name="phone" onkeypress="return onlyNumberKey(event)" required>
  <span class="<?php if($_SESSION['phoneError']=='yes'){echo'formError';}else{echo'hide';} ?>">This phone are already registered, please submit again</span>

  <br> <br>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault1" value="m" required>
    <label class="form-check-label" for="flexRadioDefault1">
      Boy
    </label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault2" value="w" required>
    <label class="form-check-label" for="flexRadioDefault2">
      Girl
    </label>
  </div>
  <p class="minifont">just for statistic</p>

  <input type="password" class="login_input" placeholder="Password" name="pwd" id="pwdfield" required>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="showpwd();">
  <label class="form-check-label" for="flexCheckDefault">
    Show password
  </label>
</div>
<br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
  <label class="form-check-label" for="flexCheckDefault">
    I agree to the <a href="./terms.html" target="_blank">terms and conditions</a>
  </label>
</div>
  <br>
  <button class="submit_button">Create</button>
</form>
<p class="registertext">Already have an account? <a href="login.php">Login here</a></p>

<script>
    function showpwd(){
        var element = document.getElementById("pwdfield");
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    }
</script>