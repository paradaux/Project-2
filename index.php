<html>
	<head>
		<title>Rememberable Passphrase</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<?php require("logic.php"); ?>
		<style>
		body {
		  background-image: url("http://localhost/Sources/Images/AnimalBackgrounds/<?php echo sprintf("%02d",rand(1,15))?>.jpg");
		  background-size: cover;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="password-container">
				<?php

				foreach ($newPassword as $key => $value) {
					echo $value;
					if ($key != $_GET["maxLength"] -1) {
						echo " ";
					}
				}
				if ($_GET['symReq'] == 1){
					echo $symAppend;
				}
				if ($_GET['numReq'] == 1){
					echo $numAppend;
				}
				?>
			</div>
		</div>
		<div class="container">
			<div class="side-bar-menu">
				<form method="GET" action="index.php">
					<div class="header">
						<h1>This is a password generator!</h1>
					</div>
					<ul>
						<li>Hello and welcome to my passphrase generating website! This website is designed to generate an extremely memorable passphrase for you.</li>
						<li>The idea here is that a passphrase will be much more memorable than a password. Additionally a computer program trying to brute force guess the password will have to deal with many more bits of entropy. <a href="http://xkcd.com/936/">This XKCD comic</a> might explain it a little better!</li>
						<li></li>
						<li>To use the generator, please select the length of the passphrase (range 3-5). Then tell the program if you need it to append a symbol or a number to the password.</li>
					</ul>
					<label>Number of Words (Range 3-5)<font color="#000"><input type="number" name="maxLength" value="3" max="5" min="3" /></font></label><br>
					<label>Should the password include a symbol?
						<input type="hidden" name="symReq" value="0" />
						<input type="checkbox" name="symReq" value="1" />
					</label><br>
					<label>Should the password include a number?
						<input type="hidden" name="numReq" value="0" />
						<input type="checkbox" name="numReq" value="1" />
					</label><br>
					<input type="submit" value="Generate" />
				</form>
			</div>
		</div>
	</body>
</html>
