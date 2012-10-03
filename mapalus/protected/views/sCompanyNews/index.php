<?php
/* @var $this SCompanyNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'company News',
);

$this->menu=array(
	array('label'=>'Home', 'url'=>array('/site/login')),
);

$this->menu1=sCompanyNews::getTopUpdated();
$this->menu2=sCompanyNews::getTopCreated();
$this->menu5=array('Company News');

?>

<div class="page-header">
<h1>Company News</h1>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
