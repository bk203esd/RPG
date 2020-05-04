<div class="w3-container">
	<h3>Classes</h3>

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
		foreach ($classes as $class) {
			echo "
						<tr>
							<td> " . $class->getClasName() . "</td>
							<td> " . $class->getDescription() . "</td>
							<td> " . $class->getMultiplyHp() . "</td>
							<td> " . $class->getMultiplyAttack() . "</td>
							<td> " . $class->getMultiplyDefense() . "</td>
							<td> " . $class->getMultiplyAccuracy() . "</td>
";
		}
		?>
	</table>
	<a class="w3-button" href="<?php echo base_url('class/add'); ?>">Añadir nueva classe</a>
</div>
