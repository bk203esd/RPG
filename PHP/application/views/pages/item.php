<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<input type="text" value="<?php echo $item->getItemName(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<input type="text" value="<?php echo $item->getDescription(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Ataque</div>
				<input type="text" value="<?php echo $item->getAttackIncrease(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Defensa</div>
				<input type="text" value="<?php echo $item->getDefenseIncrease(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Precisión</div>
				<input type="text" value="<?php echo $item->getAccuracyIncrease(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Precio</div>
				<input type="text" value="<?php echo $item->getPrice(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
</div>
