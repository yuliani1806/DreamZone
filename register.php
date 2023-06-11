<?php 
	session_start();
	include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | DreamZone</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Register</h2>

<!-- content -->
	<div class="section">
		<div class="container">
			<h3></h3>
			<div class="box">
				<form action="" method="POST">
					<!-- <input type="label" name="admin_id" placeholder="ID" class="input-control"> -->
					<input type="text" name="admin_name" placeholder="Nama Lengkap" class="input-control" required>
					<input type="text" name="username" placeholder="Nama Pengguna" class="input-control" required>
					<input type="text" name="admin_telp" placeholder="Nomor HP" class="input-control" required>
					<input type="text" name="admin_email" placeholder="Email" class="input-control" required>
					<input type="text" name="admin_address" placeholder="Alamat" class="input-control" required>
					<input type="text" name="password" placeholder="Kata Sandi" class="input-control" required>
					<input type="submit" name="submit" value="Daftar" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){
						$nama = ucwords($_POST['admin_name']);
						$user = ucwords($_POST['username']);
						$telp = ucwords($_POST['admin_telp']);
						$email = ucwords($_POST['admin_email']);
						$address = ucwords($_POST['admin_address']);
						$pass = ucwords($_POST['password']);
						$insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
											'','".$nama."',
											'".$user."','".MD5($pass)."','".$telp."','".$email."','".$address."') ");
						if($insert){
							echo '<script>alert("Registrasi Anda berhasil")</script>';
							echo '<script>window.location="login.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>
		</div>
	</div>


		</form>
<!-- 		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					echo '<script>window.location="dashboard.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
		?> -->
		<p class="login-register-text">Sudah Punya Akun? <a href="login.php">Login Disini</a>.</p>
	</div>
</body>
</html>