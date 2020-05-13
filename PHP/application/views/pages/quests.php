<div class="w3-container">
	<h3>Misiones</h3>

	<table class="w3-table-all w3-hoverable">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Item</th>
			<th>Cantidad</th>
			<th>Oro</th>
			<th>Experiencia</th>
			<th>Repetible</th>
		</tr>
		<?php
		foreach ($quests as $quest) {
			echo "
						<tr>
							<td> " . $quest->getQuestName() . "</td>
							<td> " . $quest->getDescription() . "</td>
							<td> " . $quest->getItemReward() . "</td>
							<td> " . $quest->getQuantityItem() . "</td>
							<td> " . $quest->getGoldReward() . "</td>
							<td> " . $quest->getXpReward() . "</td>
							<td> " . $quest->getRepeatable() . "</td>
							<td><a class=\"w3-button\" href=" . base_url('quest/' . $quest->getQuestName()) . ">Veure</a></td>
";
		}
		?>
	</table>
	<a class="w3-button" href="<?php echo base_url('questadd'); ?>">Añadir nueva Misión</a>
</div>
