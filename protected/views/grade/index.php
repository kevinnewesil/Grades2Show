<?php
$this->breadcrumbs=array(
	'grades',
);

$this->menu=array(
	array('label'=>'Create grade', 'url'=>array('create')),
	array('label'=>'Manage grade', 'url'=>array('admin')),
);
?>

<h1>grades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
