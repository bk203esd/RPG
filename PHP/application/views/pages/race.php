<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getRaceName(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getDescription(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador HP</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getMultiplyHp(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Ataque</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getMultiplyAttack();?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Defensa</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getMultiplyDefense();?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Precisión</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $race->getMultiplyAccuracy();?>
				</div>
			</div>
		</div>
	</div>
</div>
