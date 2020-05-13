<div class="w3-container">
	<h3>Mision</h3>

	<form method="post">
		<table class="w3-center">
			<tr>
				<td><label>Nombre:</label></td>
				<td><input class="w3-input" type="text" name="quest_name"><br></td>
			</tr>
			<tr>
				<td><label>Descripción:</label></td>
				<td><input class="w3-input" type="text" name="description"><br></td>
			</tr>
			<tr>
				<td><label>Item:</label></td>
				<td><input class="w3-input" type="text" name="item_reward"><br></td>
			</tr>
			<tr>
				<td><label>Cantidad:</label></td>
				<td><input class="w3-input" type="text" name="quantity_item"><br></td>
			</tr>
			<tr>
				<td><label>Oro:</label></td>
				<td><input class="w3-input" type="text" name="gold_reward"><br></td>
			</tr>
			<tr>
				<td><label>Monstruo:</label></td>
				<td><input class="w3-input" type="text" name="monster_name"><br></td>
			</tr>
			<tr>
				<td><label>Experiencia:</label></td>
				<td><input class="w3-input" type="text" name="xp_reward"><br></td>
			</tr>
			<tr>
				<td><label>Repetiblea:</label></td>
				<td><input class="w3-input" type="text" name="repeatable"><br></td>
			</tr>
		</table>
		<input class="w3-input" type="submit" value="Añadir Mision" class="w3-button">
	</form>
	<?php
	echo validation_errors();
	?>
</div>
