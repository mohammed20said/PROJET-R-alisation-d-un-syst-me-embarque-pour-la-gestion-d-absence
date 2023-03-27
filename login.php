<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #F8F8F8;
		}
		.container {
			max-width: 400px;
			margin: 0 auto;
			padding: 20px;
			background-color: #FFF;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			border-radius: 5px;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #DDD;
			border-radius: 3px;
			font-size: 16px;
			box-sizing: border-box;
		}
		input[type="submit"] {
			display: block;
			width: 100%;
			padding: 10px;
			background-color: #007BFF;
			color: #FFF;
			border: none;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #0069D9;
		}
		.error-message {
			color: #FF0000;
			font-size: 14px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<?php if (isset($_GET['error'])) : ?>
			<div class="error-message">Invalid login or password</div>
		<?php endif; ?>
		<form method="post" action="auth.php">
			<label>Login:</label>
			<input type="text" name="login">
			<label>Password:</label>
			<input type="password" name="password">
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
