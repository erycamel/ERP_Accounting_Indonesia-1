<?php
/* @var $this GLeaveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'G Leaves',
);

$this->menu=array(
	array('label'=>'Create gLeave', 'url'=>array('create')),
	array('label'=>'Manage gLeave', 'url'=>array('admin')),
);
?>

<h1>G Leaves</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
