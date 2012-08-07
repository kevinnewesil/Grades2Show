<?php
$this->breadcrumbs=array(
	'grades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List grades', 'url'=>array('index')),
    array('label'=>'Manage grade', 'url'=>array('admin')),
);
?>

<h1>Create grade</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
