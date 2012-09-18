<?php
$this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'Assignment','url'=>Yii::app()->createUrl('/rights/assignment')),
				array('label'=>'Permission','url'=>$this->createUrl('/rights/authItem/permissions')),
				array('label'=>'Roles','url'=>$this->createUrl('/rights/authItem/roles')),
				array('label'=>'Tasks','url'=>$this->createUrl('/rights/authItem/tasks')),
				array('label'=>'Operations','url'=>$this->createUrl('/rights/authItem/operations')),
		),
));
?>
