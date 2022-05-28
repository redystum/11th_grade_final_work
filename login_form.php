<h2>Hi !</h2>
<h4>Login your account</h4>
<form action="./login.php" class="loginform" method="post">
    <input type="text" class="login_input <?php if($_SESSION['userError']=='yes'){echo'formErrorinp';} ?>" placeholder="Email / Phone" name="email">
    <span class="<?php if($_SESSION['userError']=='yes'){echo'formError';}else{echo'hide';} ?>">This email don't exist.</span>
    <br>
    <input type="password" class="login_input <?php if($_SESSION['pwdError']=='yes'){echo'formErrorinp';} ?>" placeholder="Password" name="pwd" id="pwdfield">
    <span class="<?php if($_SESSION['pwdError']=='yes'){echo'formError';}else{echo'hide';} ?>">Wrong password</span>
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="showpwd();">
  <label class="form-check-label" for="flexCheckDefault">
    Show password
  </label>
</div>
    <br>
    <input class="submit_button" type="submit" value="Submit"></input>
</form>
<p class="registertext">Dont have an account? <a href="register.php">Register here</a></p>

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