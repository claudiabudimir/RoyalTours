<?php include('functions_login.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>RegalTour</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
        <div class="body">
        </div>
		<div class="grad"></div>

		<div class="header">
			<div>Regal<span>Tour</span></div>
		</div>

		<br>
	<div class="login">
	<form method="post" action="home_login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
            <input type="text" placeholder="username" name="username"><br>
		</div>

		<div class="input-group">
            <input type="password" placeholder="password" name="password"><br>
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
	</form>
    </div>
</body>
</html>