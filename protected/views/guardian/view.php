<?php
if ($user -> isGuardian == 1 && $guardian === NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('user/edit/' . $user -> userId . '#User_isActive'), array(
		'rel' => 'tooltip',
		'title' => Yii::t('app', 'Error: inconsistent data, please fix.')
	));
}
elseif ($guardian !== NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('guardian/view/' . $teacher -> teacherId), array(
		'data-title' => 'Info',
		'data-content' => $this -> widget('bootstrap.widgets.BootDetailView', array(
			'data' => $guardian,
			'attributes' => array(
				'guardianId',
			),
		), true),
		'rel' => 'popover'
	));
}

