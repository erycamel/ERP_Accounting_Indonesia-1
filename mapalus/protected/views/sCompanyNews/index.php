<?php
/* @var $this SCompanyNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'company News',
);

$this->menu=array(
	array('label'=>'Create SCompanyNews', 'url'=>array('create')),
	array('label'=>'Manage SCompanyNews', 'url'=>array('admin')),
);
?>

<div class="page-header">
<h1>Company News</h1>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
