<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- CSS from Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card">
					<div class="card-header">
						<h1 class="text-center">Login</h1>
					</div>
					<div class="card-body">
						<form action="login.php" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<div class="text-center mt-3">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="register.php" class="btn btn-secondary ml-3">Register</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>