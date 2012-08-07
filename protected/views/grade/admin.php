<?php
$this->breadcrumbs=array(
	'grades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List grades', 'url'=>array('index')),
	array('label'=>'Create grade', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gradegrid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage grades</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'gradegrid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'periodId',
        'studentId',
        'teacherId',
        'gradeBehaviour',
        'lastEdit',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("grade/view/", 
                                            array("periodId"=>$data->periodId, "subjectId"=>$data->subjectId, "studentId"=>$data->studentId, "retentionId"=>$data->retentionId
											))',
                ),
                'update' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("grade/update/", 
                                            array("periodId"=>$data->periodId, "subjectId"=>$data->subjectId, "studentId"=>$data->studentId, "retentionId"=>$data->retentionId
											))',
                ),
                'delete'=> array
                (
                    'url'=>
                    'Yii::app()->createUrl("grade/delete/", 
                                            array("periodId"=>$data->periodId, "subjectId"=>$data->subjectId, "studentId"=>$data->studentId, "retentionId"=>$data->retentionId
											))',
                ),
            ),
        ),
    ),
)); ?>
