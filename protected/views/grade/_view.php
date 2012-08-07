<div class="view">
	<b>
	<?php echo CHtml::link(">> ", array('view', 
	'periodId'=>$data->periodId, 'subjectId'=>$data->subjectId, 'studentId'=>$data->studentId, 'retentionId'=>$data->retentionId)); ?><br/></b>
	
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('periodId')); ?>:</b>
	<?php echo CHtml::encode($data->periodId); ?><br />
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('studentId')); ?>:</b>
	<?php echo CHtml::encode($data->studentId); ?><br />
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('teacherId')); ?>:</b>
	<?php echo CHtml::encode($data->teacherId); ?><br />
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('gradeBehaviour')); ?>:</b>
	<?php echo CHtml::encode($data->gradeBehaviour); ?><br />
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('lastEdit')); ?>:</b>
	<?php echo CHtml::encode($data->lastEdit); ?><br />
</div>
