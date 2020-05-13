<div class="w3-container">
	<h3>Classe</h3>

	<form method="post">
		<table class="w3-center">
			<tr>
				<td><label>Nombre:</label></td>
				<td><input class="w3-input" type="text" name="clas_name"><br></td>
			</tr>
			<tr>
				<td><label>Descripción:</label></td>
				<td><input class="w3-input" type="text" name="description"><br></td>
			</tr>
			<tr>
				<td><label>Multiplicador HP:</label></td>
				<td><input class="w3-input" type="text" name="multiply_hp"><br></td>
			</tr>
			<tr>
				<td><label>Multiplicador Ataque:</label></td>
				<td><input class="w3-input" type="text" name="multiply_attack"><br></td>
			</tr>
			<tr>
				<td><label>Multiplicador Defensa:</label></td>
				<td><input class="w3-input" type="text" name="multiply_defense"><br></td>
			</tr>
			<tr>
				<td><label>Multiplicador Precisió:</label></td>
				<td><input class="w3-input" type="text" name="multiply_accuracy"><br></td>
			</tr>
		</table>
		<input class="w3-input" type="submit" value="Añadir classe" class="w3-button">
	</form>
	<?php
	echo validation_errors();
	?>
</div>
