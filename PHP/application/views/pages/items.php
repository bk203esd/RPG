<div class="w3-container">
	<h3>Razas</h3>

	<table class="w3-table-all w3-hoverable">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Incremento Ataque</th>
			<th>Incremento Defensa</th>
			<th>Incremento Precisión</th>
			<th>Precio</th>
			<th>Imagen</th>
		</tr>
		<?php
		foreach ($items as $item) {
			echo "
						<tr>
							<td> " . $item->getItemName() . "</td>
							<td> " . $item->getDescription() . "</td>
							<td> " . $item->getAttackIncrease() . "</td>
							<td> " . $item->getDefenseIncrease() . "</td>
							<td> " . $item->getAccuracyIncrease() . "</td>
							<td> " . $item->getPrice() . "</td>
							<td> " . $item->getImg() . "</td>
							<td><a class=\"w3-button\" href=" . base_url('item/' . $item->getItemName()) . ">Veure</a></td>
";
		}
		?>
	</table>
	<a class="w3-button" href="<?php echo base_url('itemadd'); ?>">Añadir nuevo item</a>
</div>
