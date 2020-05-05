<div class="w3-container">
	<h3>Monstruo</h3>

	<table class="w3-table-all w3-hoverable">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>HP</th>
			<th>Ataque</th>
			<th>Defensa</th>
			<th>Precisión</th>
			<th>Oro</th>
			<th>Experiencia</th>
		</tr>
		<?php
		foreach ($monsters as $monster) {
			echo "
						<tr>
							<td> " . $monster->getMonsterName() . "</td>
							<td> " . $monster->getDescription() . "</td>
							<td> " . $monster->getHp() . "</td>
							<td> " . $monster->getAttack() . "</td>
							<td> " . $monster->getDefense() . "</td>
							<td> " . $monster->getAccuracy() . "</td>
							<td> " . $monster->getGold() . "</td>
							<td> " . $monster->getXpGive() . "</td>
							<td><a class=\"w3-button\" href=" . base_url('monster/' . $monster->getMonsterName()) . ">Veure</a></td>
";
		}
		?>
	</table>
	<a class="w3-button" href="<?php echo base_url('monsteradd'); ?>">Añadir nuevo monstruo</a>
</div>
