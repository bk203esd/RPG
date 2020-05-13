<div class="w3-container">
	<h3>Item</h3>

	<form method="post">
		<table class="w3-center">
			<tr>
				<td><label>Nombre:</label></td>
				<td><input class="w3-input" type="text" name="item_name"><br></td>
			</tr>
			<tr>
				<td><label>Descripción:</label></td>
				<td><input class="w3-input" type="text" name="description"><br></td>
			</tr>
			<tr>
				<td><label>Incremento Ataque:</label></td>
				<td><input class="w3-input" type="text" name="attack_increase"><br></td>
			</tr>
			<tr>
				<td><label>Incremento Defensa:</label></td>
				<td><input class="w3-input" type="text" name="defense_increase"><br></td>
			</tr>
			<tr>
				<td><label>Incremento Precisión:</label></td>
				<td><input class="w3-input" type="text" name="accuracy_increase"><br></td>
			</tr>
			<tr>
				<td><label>Precio:</label></td>
				<td><input class="w3-input" type="text" name="price"><br></td>
			</tr>
		</table>
		<input class="w3-input" type="submit" value="Añadir item" class="w3-button">
	</form>
	<?php
	echo validation_errors();
	?>
</div>
