<?php
$this->breadcrumbs=array(
	'Guardians',
);

$this->menu=array(
	array('label'=>'Create Guardian', 'url'=>array('create')),
	array('label'=>'Manage Guardian', 'url'=>array('admin')),
);
?>

<h1>Guardians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
