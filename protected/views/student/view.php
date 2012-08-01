<h1>View Student details of <?php echo $student->user->firstName . ' '. $student->user->lastName; ?></h1>

<?php

$this->widget('bootstrap.widgets.BootDetailView', array(
	'data' => $student,
	'attributes' => array (
		'studentCode',
	),
));
