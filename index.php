<!-- NAME: Yashesh Ray - 200522600
  PAIRED WITH: Om Patel  - 200556124 -->

<?php require ('./inc/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "robots" content = "noindex, nofollow">
    <meta name = "description" content = "index-page">
<link rel="stylesheet" href="./CSS/style.css">
  <main>
    <section class="masthead">
      <div>
        <h1>Aroma Magic perfumes</h1>
        <p class ="aroma">Aroma makes you feel special.</p>
      </div>
    </section>
    <section class="form-row row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h3>sing up get 10% off today!!
        </h3>
        <form method="post" action="save-admin.php">
        	<p><input class="form-control" name="first_name" type="text" placeholder="First Name" required/></p>
        	<p><input class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
        	<p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
        	<p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>

          <input class="btn btn-light" type="submit" name="submit" value="Register" />
        </form>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h3>Sign in !</h3>
        <form method="post" action="display.php">
        	<p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-light" type="submit" value="Login" />
        </form>
      </div>
    </section>
  </main>
  
<?php require ('./inc/footer.php'); ?>
