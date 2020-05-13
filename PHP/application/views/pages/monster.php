<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<input type="text" value="<?php echo $monster->getMonsterName(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<input type="text" value="<?php echo $monster->getDescription(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">HP</div>
				<input type="text" value="<?php echo $monster->getHp(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Vida</div>
				<input type="text" value="<?php echo $monster->getAttack(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Defensa</div>
				<input type="text" value="<?php echo $monster->getDefense(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Precisión</div>
				<input type="text" value="<?php echo $monster->getAccuracy(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Oro</div>
				<input type="text" value="<?php echo $monster->getGold(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Experiencia</div>
				<input type="text" value="<?php echo $monster->getXpGive(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
</div>
