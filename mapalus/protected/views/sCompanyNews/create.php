<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Scompany News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Home', 'url'=>array('/sCompanyNews')),
);

$this->menu1=sCompanyNews::getTopUpdated();
$this->menu2=sCompanyNews::getTopCreated();

?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/preferences_desktop_notification.png') ?>
		Create
	</h1>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>