<?php
$this->breadcrumbs=array(
	'Guardians'=>array('index'),
	$model->guardianId=>array('view','id'=>$model->guardianId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guardian', 'url'=>array('index')),
	array('label'=>'Create Guardian', 'url'=>array('create')),
	array('label'=>'View Guardian', 'url'=>array('view', 'id'=>$model->guardianId)),
	array('label'=>'Manage Guardian', 'url'=>array('admin')),
);
?>

<h1>Update Guardian <?php echo $model->guardianId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>