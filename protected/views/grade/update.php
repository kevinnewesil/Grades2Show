<?php
$this->breadcrumbs=array(
	'grades'=>array('index'),
	'View'=>array('view', 'periodId'=>$model->periodId, 'subjectId'=>$model->subjectId, 'studentId'=>$model->studentId, 'retentionId'=>$model->retentionId),
	'Update',
);

$this->menu=array(
	array('label'=>'List grade', 'url'=>array('index')),
	array('label'=>'Create grade', 'url'=>array('create')),
	array('label'=>'View grade', 'url'=>array('view', 'periodId'=>$model->periodId, 'subjectId'=>$model->subjectId, 'studentId'=>$model->studentId, 'retentionId'=>$model->retentionId)),
	array('label'=>'Manage grade', 'url'=>array('admin')),
); 
?>

<h1>Update Client</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
