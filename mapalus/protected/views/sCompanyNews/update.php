<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Scompany News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SCompanyNews', 'url'=>array('index')),
	array('label'=>'Create SCompanyNews', 'url'=>array('create')),
	array('label'=>'View SCompanyNews', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SCompanyNews', 'url'=>array('admin')),
);
?>

<h1>Update SCompanyNews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>