<?php
$this->breadcrumbs=array(
		'G people',
);

$this->menu=array(
		array('label'=>'Home','url'=>array('/m1/gPerson')),
		//array('label'=>'Manage gPerson','url'=>array('admin')),
);



$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();
$this->menu5=array('Person');

?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		Person
	</h1>
</div>


<?php 
	$this->widget('bootstrap.widgets.BootListView',array(
	//$this->widget('ext.EColumnListView', array(
		//'columns' => 3,
		'dataProvider'=>$dataProvider,
		'itemView'=>'/gPerson/_view',
)); ?>
