<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Responsive Admin Dashboard | Redesign</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<?php
error_reporting(0);
?>
<?php session_start();
if ($_SESSION['role'] == "") {
	header("location:login.php");
}

$current_page = isset($_GET['halaman']) ? $_GET['halaman'] : 'dashboard';
?>

<body>
	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<a href="index.php?halaman=dashboard">
						<span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
						<span class="title" style="font-size: 1.5em;font-weight: 500;">Brand Name</span>
					</a>
				</li>
				<li class="<?= $current_page == 'dashboard' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=dashboard">
						<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="<?= $current_page == 'customer' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=customer">
						<span class="icon"><ion-icon name="people-outline"></ion-icon></span>
						<span class="title">Customers</span>
					</a>
				</li>
				<li class="<?= $current_page == 'message' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=message">
						<span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
						<span class="title">Message</span>
					</a>
				</li>
				<li class="<?= $current_page == 'help' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=help">
						<span class="icon"><ion-icon name="help-outline"></ion-icon></span>
						<span class="title">Help</span>
					</a>
				</li>
				<li class="<?= $current_page == 'settings' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=settings">
						<span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
						<span class="title">Settings</span>
					</a>
				</li>
				<li class="<?= $current_page == 'password' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=password">
						<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
						<span class="title">Password</span>
					</a>
				</li>
				<li class="<?= $current_page == 'logout' ? 'hovered' : '' ?>">
					<a href="index.php?halaman=logout">
						<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>

		<!-- main -->
		<div class="main">
			<?php
			if (isset($_GET['halaman'])) {
				if ($_GET['halaman'] == 'dashboard') {
					include 'content/dashboard.php';
				} elseif ($_GET['halaman'] == 'customer') {
					include 'content/customer.php';
				} elseif ($_GET['halaman'] == 'message') {
					include 'content/message.php';
				} elseif ($_GET['halaman'] == 'help') {
					include 'content/help.php';
				} elseif ($_GET['halaman'] == 'settings') {
					include 'content/settings.php';
				} elseif ($_GET['halaman'] == 'password') {
					include 'content/password.php';
				} elseif ($_GET['halaman'] == 'logout') {
					include 'logout.php';
				}
			}
			?>
		</div>
	</div>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
	<script src="assets/js/my_chart.js"></script>
	<script>
		// MenuToggle
		let toggle = document.querySelector('.toggle');
		let navigation = document.querySelector('.navigation');
		let main = document.querySelector('.main');

		toggle.onclick = function () {
			navigation.classList.toggle('active');
			main.classList.toggle('active');
		}

		// add hovered class in selected list item
		let list = document.querySelectorAll('.navigation li');
		function activeLink() {
			list.forEach((item) =>
				item.classList.remove('hovered'));
			this.classList.add('hovered');
		}
		list.forEach((item) =>
			item.addEventListener('mouseover', toggle));
	</script>
</body>

</html>