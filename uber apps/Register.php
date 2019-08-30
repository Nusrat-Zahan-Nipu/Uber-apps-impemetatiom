<?php 
  include("library.php");
  
?>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/tachyons/css/tachyons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration</title>
</head>
<body >
    <div id="particles-js" class="mainbg" style="height: 800px;" >
    <main class="loginform pa4 black-80" style="left:44%">
     
    <?php 
    if(isset($_POST['submit'])){
     register($_POST['First_Name'],$_POST['Last_Name'],$_POST['email-address'],$_POST['password'],$_POST['User'],$_POST['dob'],$_POST[usertype]"users_info");
    }
    else{
  
    }
    unset($_POST);
  ?>
    
    
    
    
    
    
    
    
    
  <form class="measure center" method="post">
    <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
      <legend class="f4 fw6 ph0 mh0 center">Sign Up</legend>
      <div class="mt3">
       
       
        <label class="db fw6 lh-copy f6" for="email-address">First Name</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="text" name="First_Name"  id="First_Name">
      </div>
       <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address" >Last Name</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="text" name="Last_Name"  id="Last-Name">
      </div>
       <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address">Email</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="email" name="email-address"  id="email-address" required>
      </div> 
       <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address">User Name</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="text" name="User"  id="User-Id">
      </div>
      <div class="mv3">
        <label class="db fw6 lh-copy f6" for="password">Password</label>
        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="password" name="password"  id="password">
      </div>
        <div class="mv3">
        <label class="db fw6 lh-copy f6" for="Dob">Date of Birth</label>
        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="date" name="dob"  id="password">
      </div>
       <div class="mv3">
        <label class="db fw6 lh-copy f6" for="Dob">User type</label>
<!--        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="" name="ut"  id="password">-->
     <select name="usertype">
  <option value="User">User</option>
  <option value="Stuff">Stuff</option>
  <option value="Authority">Authority</option>
  <option value="Admin">Admin</option>
</select>
      </div>
      <label class="pa0 ma0 lh-copy f6 pointer"><input type="checkbox"> Remember me</label>
    </fieldset>
    <div class="">
      <input class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6 dib" type="submit" value="Sign Up" name="submit">
    </div>
    <div class="lh-copy mt3">
      <a href="index.html" class="f6 link dim black db">Sign In</a>
      
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
