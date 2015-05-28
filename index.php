<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="My_PhpMyAdmin" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" media="screen" type="text/css" title="style1" href="css/style.css">
    <script type="text/javascript" src="js/functions.js"></script>
	<title>My_PhpMyAdmin</title>
</head>
<body>
    <div class="container">
  
      <div class="row" id="pwd-container">
        <div class="col-md-4"></div>
        
        <div class="col-md-4">
          <section class="login-form">
            <form action="check_session/auth.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" role="login">
              <img src="img/logo_left.png" class="img-responsive" alt="" />
              <input type="login" name="user" placeholder="Votre login" required class="form-control input-lg" />
              
              <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Votre mot de passe" required="" />
              
              
              <div class="pwstrength_viewport_progress"></div>
              
              
              <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Connexion</button>
              
            </form>
            
          </section>  
          </div>
          
          <div class="col-md-4"></div>
          

      </div>
      
      <p>
        <br>
        <br>
        
      </p>     
      
      
    </div>
</body>
<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</footer>