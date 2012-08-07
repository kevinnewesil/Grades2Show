<?php
$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->name=>array('view','id'=>$model->subjectId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subject','url'=>array('index')),
	array('label'=>'Create Subject','url'=>array('create')),
	array('label'=>'View Subject','url'=>array('view','id'=>$model->subjectId)),
	array('label'=>'Manage Subject','url'=>array('admin')),
);
?>

<h1>Update Subject <?php echo $model->subjectId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>