<div class="w3-container">
	<h3>Monstruo</h3>

	<form method="post">
		<table class="w3-center">
			<tr>
				<td><label>Nombre:</label></td>
				<td><input class="w3-input" type="text" name="monster_name"><br></td>
			</tr>
			<tr>
				<td><label>Descripción:</label></td>
				<td><input class="w3-input" type="text" name="description"><br></td>
			</tr>
			<tr>
				<td><label>HP:</label></td>
				<td><input class="w3-input" type="text" name="hp"><br></td>
			</tr>
			<tr>
				<td><label>Ataque:</label></td>
				<td><input class="w3-input" type="text" name="attack"><br></td>
			</tr>
			<tr>
				<td><label>Defensa:</label></td>
				<td><input class="w3-input" type="text" name="defense"><br></td>
			</tr>
			<tr>
				<td><label>Precisión:</label></td>
				<td><input class="w3-input" type="text" name="accuracy"><br></td>
			</tr>
			<tr>
				<td><label>Oro:</label></td>
				<td><input class="w3-input" type="text" name="gold"><br></td>
			</tr>
			<tr>
				<td><label>Experiencia:</label></td>
				<td><input class="w3-input" type="text" name="xp_give"><br></td>
			</tr>
		</table>
		<input class="w3-input" type="submit" value="Añadir monster" class="w3-button">
	</form>
	<?php
	echo validation_errors();
	?>
</div>
