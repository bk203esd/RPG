<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getMonsterName(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getDescription(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">HP</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getHp(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Vida</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getAttack(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Defensa</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getDefense(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Precisión</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getAccuracy(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Oro</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getGold(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Experiencia</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $monster->getXpGive(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
