<div class="w3-container">
	<h3>Razas</h3>

	<table class="w3-table-all w3-hoverable">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Multiplicador HP</th>
			<th>Multiplicador Ataque</th>
			<th>Multiplicador Defensa</th>
			<th>Multiplicador Precisión</th>
		</tr>
		<?php
		foreach ($races as $race) {
			echo "
						<tr>
							<td> " . $race->getRaceName() . "</td>
							<td> " . $race->getDescription() . "</td>
							<td> " . $race->getMultiplyHp() . "</td>
							<td> " . $race->getMultiplyAttack() . "</td>
							<td> " . $race->getMultiplyDefense() . "</td>
							<td> " . $race->getMultiplyAccuracy() . "</td>
							<td><a class=\"w3-button\" href=" . base_url('race/' . $race->getRaceName()) . ">Veure</a></td>
";
		}
		?>
	</table>
	<a class="w3-button" href="<?php echo base_url('raceadd'); ?>">Añadir nueva raza</a>
</div>
