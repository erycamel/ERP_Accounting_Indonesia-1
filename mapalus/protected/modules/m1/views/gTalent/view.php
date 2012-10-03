<?php
$this->breadcrumbs=array(
		'G people'=>array('index'),
		$model->id,
);

$this->menu=array(
		array('label'=>'Home', 'icon'=>'home', 'url'=>array('/m1/gPerson')),

		array('label'=>'Update', 'icon'=>'edit', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete', 'icon'=>'remove', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),
		),
);


$this->menu1=gPerson::getTopUpdated();
$this->menu2=gPerson::getTopCreated();
$this->menu5=array('Person');

?>

<?php /*
<div class="pull-right">
<?php $this->widget('bootstrap.widgets.BootButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
				array('label'=>'Person', 'items'=>array(
						array('label'=>'Leave', 'url'=>Yii::app()->createUrl("/m1/gLeave/view",array("id"=>$model->id))),
						array('label'=>'Absence', 'url'=>'#'),
						array('label'=>'Payroll', 'url'=>'#'),
						array('label'=>'Other Module', 'url'=>'#'),
				)),
		),
)); ?>
</div>
*/ ?>

<div class="pull-right">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
	)); ?>
</div>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/user.png') ?>
		<?php echo $model->employee_name; ?>
	</h1>
</div>

<div class="row-fluid">
	<div class="span2">
		<?php 
		if ($model->c_pathfoto == null || (!is_file(Yii::app()->basePath . "/../shareimages/hr/employee/" .$model->c_pathfoto))) {
		//if ($model->c_pathfoto == null) {
			echo CHtml::image(Yii::app()->request->baseUrl . "/images/nophoto.jpg", "No Photo", array("class"=>"100%",'id'=>'photo'));
		//	$this->widget('ext.espaceholder.ESpaceHolder', array(
		//			'size' => '140x200', // you can also do 300x250
		//			'text' => CHtml::encode($model->employee_name),
		//			'htmlOptions' => array( 'title' => 'test image' )
		//	));
				
		} else {
			echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$model->c_pathfoto, CHtml::encode($model->employee_name), array("width"=>"100%",'id'=>'photo'));
		}
		?>

		<p>
		</p>
		
		
	<?php echo $this->renderPartial('/gPerson/_personalInfo',array('model'=>$model)); ?>	

	</div>
	<div class="span9">

		<?php
		$this->widget('bootstrap.widgets.BootTabs', array(
			'type'=>'tabs', // 'tabs' or 'pills'
			'tabs'=>array(
				array('id'=>'tab1','label'=>'Detail','content'=>$this->renderPartial("/gPerson/_tabDetail", array("model"=>$model), true),'active'=>true),
				array('id'=>'tab2','label'=>'Career-Experience-Status','content'=>$this->renderPartial("_mainCareerExperienceStatus", array("model"=>$model), true)),
				array('id'=>'tab3','label'=>'Education','content'=>$this->renderPartial("_mainEducation", array("model"=>$model), true)),
				array('id'=>'tab4','label'=>'Family','content'=>$this->renderPartial("/gPerson/_tabFamily", array("model"=>$model), true)),
				array('id'=>'tab5','label'=>'Performance','content'=>$this->renderPartial("_tabPerformance", array("model"=>$model,"modelPerformance"=>$modelPerformance), true)),
			),
		));
		?>
		
	</div>
</div>

<hr/>

<?php echo $this->renderPartial('/gPerson/_sameDepartment',array('model'=>$model)); ?>	
