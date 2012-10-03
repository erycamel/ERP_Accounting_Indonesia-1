
<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>
<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		HR Parameter
	</h1>
</div>

<?php
$this->widget('bootstrap.widgets.BootTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'placement'=>'left',
	'tabs'=>array(
		array('id'=>'tab1','label'=>'Mass Leave Generator','content'=>$this->renderPartial('_tabMassLeave',array(),true),'active'=>true),
		array('id'=>'tab2','label'=>'Absence Time Block','content'=>'Testing'),
		array('id'=>'tab3','label'=>'Absence Work Pattern','content'=>'Testing'),
		array('id'=>'tab4','label'=>'OverTime Process','content'=>'Testing'),
		array('id'=>'tab5','label'=>'Absence Recapitulation','content'=>'Testing'),
	),
));

?>

