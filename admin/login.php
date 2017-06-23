<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>faithMASH - Admin Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" id="bulma" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="login-wrapper columns">
    <div class="column is-8 is-hidden-mobile hero-banner">
      <section class="hero is-fullheight is-dark" style="background: url('https://unsplash.it/2000/1000');">
        <div class="hero-body">
          <div class="container section">
            <div class="has-text-right">
              <h1 class="title is-1">Login</h1> <br>
              <p class="title is-3">Admin Login Page</p>
            </div>
          </div>
        </div>
      </section>  
    </div>
    <div class="column is-4">
      <section class="hero is-fullheight">
        <div class="hero-heading">
          <div class="section has-text-centered title is-2">
            faith<strong>MASH</strong>
          </div>
        </div>
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-8 is-offset-2">
                <h1 class="avatar has-text-centered section">
                  <img src="https://cdn.pixabay.com/photo/2013/07/13/12/07/avatar-159236_960_720.png" width="128" height="128">
                </h1>

                <?php
                if(isset($_GET['error'])){
                ?>
                  <div class="notification is-danger">
                    <button class="delete deleteNotif"></button>
                    Login Failed!
                  </div>
                <?php  
                }
                ?>

                <form class="login-form" method="POST" action="action/login.php">
                  <p class="control has-icon has-icon-right">
                    <input class="input email-input" type="text" name="username" placeholder="Username">
                    <span class="icon user">
                      <i class="fa fa-user"></i>
                    </span>
                  </p>
                  <p class="control has-icon has-icon-right">
                    <input class="input password-input" name="password" type="password" placeholder="●●●●●●●">
                    <span class="icon user">
                      <i class="fa fa-lock"></i>
                    </span>
                  </p>
                  <p class="control login">
                    <input type="submit" class="button is-primary is-outlined is-large is-fullwidth" value="Login">
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>  
    </div>
  </div>

</body>
</html>
