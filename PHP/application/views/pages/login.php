<div class="w3-container">
	<h2>Inici de sessió</h2>

	<form method="post">
		<label>Nom d'usuari</label>
		<input class="w3-input" name="uname" type="text">
		<label>Contrasenya</label>
		<input class="w3-input" name="passwd" type="password">
		<input class="w3-input" name="remember" type="checkbox">
		<label>Recorda'm</label>
		<br>
		<input class="w3-button w3-gray" name="login" value="Iniciar sessió" type="submit">
	</form>

	<?php
	echo validation_errors();
	if (isset($error)) {
		echo "	<div class='w3-red'>
				<h5>" . $error . "</h5>
				</div>";
	}
	?>
</div>
