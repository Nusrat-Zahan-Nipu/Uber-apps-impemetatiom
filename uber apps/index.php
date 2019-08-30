<?php
session_start();
?>
<?php 
  include("library.php");
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/tachyons/css/tachyons.min.css">
   
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/all.min.css">

    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<body class="mainbg">
     <div id="particles-js" >
     <h1 class="logo center"><img src="img/bus-stop.png" alt="" height="30px" width="30px">Uber apps</h1>
     
     
     <?php 
    if(isset($_POST['lemail'])){
      $i = login($_POST['lemail'],$_POST['lpassword'],"user");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "home.php" </script>';
      }
    }
     
     
     else{
  
    }
    unset($_POST);
  ?>
     
     
     
    
     
     
     
     
    <main class=" loginform pa4 black-80">
  <form class="measure center" method="post">
    <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
      <legend class="f4 fw6 ph0 mh0">Sign In</legend>
      <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address">Email</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="email" name="lemail"  id="email-address">
      </div>
      <div class="mv3">
        <label class="db fw6 lh-copy f6" for="password">Password</label>
        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="password" name="lpassword"  id="password">
      </div>
      <label class="pa0 ma0 lh-copy f6 pointer"><input type="checkbox"> Remember me</label>
    </fieldset>
    <div class="">
      <input class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6 dib" type="submit" value="Sign in" >
    </div>
    <div class="lh-copy mt3">
      <a href="Register.php" class="f6 link dim black db">Sign up  or Use  </a>
      <h2><img src="img/001-facebook.png" alt="Create" title="create account Using facebook"> <img src="img/002-search.png" alt="" title="Create account using google"></h2>
      
      <a href="#0" class="f6 link dim black db">Forgot your password?</a>
    </div>
  </form>
</main>
    </div>
</body>
</html>
<script src="js/particles.min.js"></script>
<script>
        particlesJS.load('particles-js', 'js/config.json', function() {
  console.log('particle js loades succesfully');
});
    </script>
