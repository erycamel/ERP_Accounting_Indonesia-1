<?php
/* @var $this GLeaveController */
/* @var $model gLeave */

$this->breadcrumbs=array(
	'G Leaves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List gLeave', 'url'=>array('index')),
	array('label'=>'Manage gLeave', 'url'=>array('admin')),
);
?>

<h1>Create gLeave</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>