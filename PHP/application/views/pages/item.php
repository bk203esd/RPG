<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getItemName(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getDescription(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Ataque</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getAttackIncrease(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Defensa</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getDefenseIncrease(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Incremento Precisión</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getAccuracyIncrease(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Precio</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getPrice(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Imagen</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $item->getImg(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
