<?php  
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/peter_custom.css');

?>

<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>

<?php $this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Graphics', 'url'=>Yii::app()->createUrl('/m1/default')),
        array('label'=>'Report', 'url'=>Yii::app()->createUrl('/m1/default/index2'), 'active'=>true),
        array('label'=>'Other', 'url'=>'#'),
    ),
)); ?>
<hr/>

<?php echo CHtml::link('Report per Department',Yii::app()->createUrl('/m1/gPerson/report1'),array('target'=>'_blank'))  ?>