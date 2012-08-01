<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('guardianId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->guardianId), array('view', 'id'=>$data->guardianId)); ?>
	<br />


</div>