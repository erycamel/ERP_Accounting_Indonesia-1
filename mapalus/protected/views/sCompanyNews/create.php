<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Scompany News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SCompanyNews', 'url'=>array('index')),
	array('label'=>'Manage SCompanyNews', 'url'=>array('admin')),
);
?>

<h1>Create SCompanyNews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>