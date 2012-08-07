<?php
$this->breadcrumbs=array(
	'grades'=>array('index'),
	'View',
);

$this->menu=array(
	array('label'=>'List grade', 'url'=>array('index')),
	array('label'=>'Create grade', 'url'=>array('create')),
	array('label'=>'Update grade', 'url'=>array('update', 'periodId'=>$model->periodId, 'subjectId'=>$model->subjectId, 'studentId'=>$model->studentId, 'retentionId'=>$model->retentionId)),
	array('label'=>'Delete grade', 'url'=>'delete', 
	      'linkOptions'=>array('submit'=>array('delete',
	                                           'periodId'=>$model->periodId, 'subjectId'=>$model->subjectId, 'studentId'=>$model->studentId, 'retentionId'=>$model->retentionId),
									'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage grade', 'url'=>array('admin')),
);
?>

<h1>View grade</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'periodId',
		'studentId',
		'teacherId',
		'gradeBehaviour',
		'lastEdit',
	),
)); ?>
