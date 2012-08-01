<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('groupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->groupId), array('view', 'id'=>$data->groupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abbr')); ?>:</b>
	<?php echo CHtml::encode($data->abbr); ?>
	<br />


</div>