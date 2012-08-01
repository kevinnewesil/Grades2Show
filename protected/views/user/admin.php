<?php
$this -> breadcrumbs = array(
	'Users' => array('index'),
	'Manage',
);

$this -> menu = array(
	array('label' => Yii::t('app', 'Administration')),
	array(
		'label' => Yii::t('app', 'Manage Users'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => 'Create User',
		'icon' => 'pencil',
		'url' => array('create')
	),
	array(
		'label' => Yii::t('app', 'Manage Students'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => 'Manage Groups',
		'icon' => 'th-list',
		'url' => array('create')
	),
	array(
		'label' => 'Create Group',
		'icon' => 'pencil',
		'url' => array('create')
	),
	array(
		'label' => Yii::t('app', 'Manage Teachers'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => Yii::t('app', 'Manage Guardians'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => Yii::t('app', 'Manage Administrators'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => Yii::t('app', 'Manage Subjects'),
		'icon' => 'th-list',
		'url' => array('admin'),
	),
	array(
		'label' => Yii::t('app', 'Create Subjects'),
		'icon' => 'pencil',
		'url' => array('admin'),
	),
	array('label' => Yii::t('app', 'Student Administration')),
	array(
		'label' => '',
		'icon' => '',
		'url' => '',
	),
	array('label' => Yii::t('app', 'Guardian Administration')),
	array(
		'label' => '',
		'icon' => '',
		'url' => '',
	),
	array('label' => Yii::t('app', 'Teacher Administration')),
	array(
		'label' => 'View Mentor Groups',
		'icon' => 'th-list',
		'url' => '',
	),
	array(
		'label' => 'View Group',
		'icon' => 'th-list',
		'url' => '',
	),
	array(
		'label' => 'View Subject',
		'icon' => 'th-list',
		'url' => '',
	),
);

Yii::app() -> clientScript -> registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('user-grid', {
			data: $(this).serialize()
		});
		return false;
	});
");
?>

<h1>Manage Users</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this -> renderPartial('_search', array('model' => $model, )); ?>
</div><!-- search-form -->

<?php
$this -> widget('bootstrap.widgets.BootGridView', array(
	'type' => 'striped bordered condensed',
	'dataProvider' => $model -> search(),
	'filter' => $model,
	'template' => '{items}{pager}', // Define the layout of your grid
	'pager' => array(
		'class' => 'bootstrap.widgets.BootPager',
		'displayFirstAndLast' => TRUE,
	),
	'columns' => array(
		'email',
		'firstName',
		'lastName',
		array(
			'name' => 'isStudent',
			'filter' => array(
				'1' => 'Yes',
				'0' => 'No'
			),
			'value' => array(
				$this,
				'studentInfo'
			),
			'type' => 'raw',
			'htmlOptions' => array('style' => 'text-align: center;', ),
		),
		array(
			'name' => 'isTeacher',
			'filter' => array(
				'1' => 'Yes',
				'0' => 'No'
			),
			'value' => array(
				$this,
				'teacherInfo'
			),
			'type' => 'raw',
			'htmlOptions' => array('style' => 'text-align: center;', ),
		),
		array(
			'name' => 'isGuardian',
			'filter' => array(
				'1' => 'Yes',
				'0' => 'No'
			),
			'value' => array(
				$this,
				'guardianInfo'
			),
			'type' => 'raw',
			'htmlOptions' => array('style' => 'text-align: center;'),
		),
		/*array(
		 'name' => 'isAdministrator',
		 'filter' => array(
		 '1' => 'Yes',
		 '0' => 'No'
		 ),
		 ),*/
		array(
			'name' => 'isActive',
			'filter' => array(
				'1' => 'Yes',
				'0' => 'No'
			),
			'value' => 'CHTML::tag("i",array("class"=>($data->isActive)?"icon-ok":""),FALSE,TRUE)',
			'type' => 'raw',
			'htmlOptions' => array('style' => 'text-align: center;'),
		),
		array(
			'class' => 'bootstrap.widgets.BootButtonColumn',
			'template' => '{edit}{delete}',
			'buttons' => array('edit' => array(
					'id' => 'edit',
					'url'=>"CHtml::normalizeUrl(array('edit', 'id'=>\$data->userId))",
                    'label' => CHTML::tag("i",array("class"=> "icon-pencil"),'',TRUE),
					'options' => array(
						'rel' => 'tooltip',
						'title' => 'Edit'
					),
				))
		),
	),
));
?>