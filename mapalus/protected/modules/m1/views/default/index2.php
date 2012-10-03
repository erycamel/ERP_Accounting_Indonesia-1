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
        array('label'=>'Employee', 'url'=>Yii::app()->createUrl('/m1/default')),
        array('label'=>'Graphics', 'url'=>Yii::app()->createUrl('/m1/default/index2'), 'active'=>true),
        array('label'=>'Report', 'url'=>'#'),
    ),
)); ?>
<hr/>

<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Sex'),
		  'xAxis' => array(
			 'categories' => array('Male', 'Female')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Sex', 'data' => gPerson::compSex())
		  )
	   )
	));		
?>
<br/>		
<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
	   'options'=>array(
		  'chart' => array('defaultSeriesType' => 'column'),
		  'title' => array('text' => 'Employee Composition by Age'),
		  'xAxis' => array(
			 'categories' => array('<26','26-30','31-35','36-40','41-45','46-50','>50')
		  ),
		  'yAxis' => array(
			 'title' => array('text' => 'Total')
		  ),
		  'series' => array(
			 array('name' => 'Age', 'data' => gPerson::compAge())
		  )
	   )
	));		
?>
