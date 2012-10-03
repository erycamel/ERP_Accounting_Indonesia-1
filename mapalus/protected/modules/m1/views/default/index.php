
<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>

<?php $this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Employee', 'url'=>Yii::app()->createUrl('/m1/default'), 'active'=>true),
        array('label'=>'Graphics', 'url'=>Yii::app()->createUrl('/m1/default/index2')),
        array('label'=>'Report', 'url'=>'#'),
    ),
)); ?>
<hr/>
		<?php
		$this->widget('bootstrap.widgets.BootTabs', array(
			'type'=>'tabs', // 'tabs' or 'pills'
			'tabs'=>array(
				array('id'=>'tab1','label'=>'Employee Out','content'=>$this->renderPartial("_employeeOut", array(), true),'active'=>true),
				array('id'=>'tab2','label'=>'Employee In','content'=>$this->renderPartial("_employeeIn", array(), true)),
				array('id'=>'tab3','label'=>'Employee Mutation','content'=>'#'),
			),
		));

		?>


