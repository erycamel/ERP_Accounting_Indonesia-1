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
	<div class="span2 well">
		<?php 
		if ($model->c_pathfoto == null || (!is_file(Yii::app()->basePath . "/../shareimages/hr/employee/" .$model->c_pathfoto))) {
		//if ($model->c_pathfoto == null) {
			echo CHtml::image(Yii::app()->request->baseUrl . "/images/nophoto.jpg", "No Photo", array("class"=>"100%"));
		//	$this->widget('ext.espaceholder.ESpaceHolder', array(
		//			'size' => '140x200', // you can also do 300x250
		//			'text' => CHtml::encode($model->employee_name),
		//			'htmlOptions' => array( 'title' => 'test image' )
		//	));
				
		} else {
			echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$model->c_pathfoto, CHtml::encode($model->employee_name), array("width"=>"100%"));
		}		
		?>
		
	</div>
	<div class="span9">

		<?php
		$this->widget('bootstrap.widgets.BootTabbable', array(
				'type'=>'tabs', // 'tabs' or 'pills'
				'tabs'=>array(
						array('id'=>'tab1','label'=>'Detail','content'=>$this->renderPartial("_tabDetail", array("model"=>$model), true),'active'=>true),
						array('id'=>'tab2','label'=>'Internal Career','content'=>$this->renderPartial("_tabCareer", array("model"=>$model,"modelCareer"=>$modelCareer), true)),
						array('id'=>'tab3','label'=>'Family','content'=>$this->renderPartial("_tabFamily", array("model"=>$model,"modelFamily"=>$modelFamily), true)),
						array('id'=>'tab4','label'=>'Education','content'=>$this->renderPartial("_tabEducation", array("model"=>$model,"modelEducation"=>$modelEducation), true)),
						array('id'=>'tab5','label'=>'Experience','content'=>$this->renderPartial("_tabExperience", array("model"=>$model,"modelExperience"=>$modelExperience), true)),
						array('id'=>'tab6','label'=>'Status','content'=>$this->renderPartial("_tabStatus", array("model"=>$model,"modelStatus"=>$modelStatus), true)),
				),
		));
		?>
		
	</div>
</div>

<hr/>

<?php if (isset($model->company->department_id)): ?>

	<div class="row-fluid">
	<div class="span12">
		<h3>Same Department (<?php echo gPerson::model()->search($model->company->department_id)->totalItemCount ?>)</h3>
		<?php $this->widget('bootstrap.widgets.BootGridView',array(
				'id'=>'g-person-grid',
				'dataProvider'=>gPerson::model()->search($model->company->department_id),
				'enableSorting'=>false,
				'template'=>'{items}{pager}',
				'columns'=>array(
					array(
						'type'=>'raw',
						'value'=>'CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/shareimages/hr/employee/".
							$data->c_pathfoto,null,array("width"=>"50px")),
							Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id)))',
						'htmlOptions'=>array("width"=>"60px"),
					),
					array(
						'header' => 'Name',
						'type' => 'raw',
						'value'=> function($data){
							return CHtml::tag('div', array(), CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id))))
								. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->employee_code);
						}
					),					
					//array(
					//	'header'=>'Department',
					//	'value'=>'$data->company->department->name',
					//),
					'company.job_title',
					array(
						'header'=>'Level',	
						'name'=>'company.level.name',
					),
					
				),
		)); ?>
	</div>
</div>

<?php endif; ?>

<?php /*
EQuickDlgs::contentButton(
 array(
     'content' => 'This is the help text', //$this->renderPartial('_help',array(),true),
     'dialogTitle' => 'Help',
     'dialogWidth' => 200,
     'dialogHeight' => 300,
     'openButtonText' => 'Help me',
      'closeButtonText' => 'Close', //comment to remove the close button from the dialog
     )
  );
 */
?>