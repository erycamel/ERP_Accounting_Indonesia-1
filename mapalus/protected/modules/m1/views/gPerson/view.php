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
			echo $model->photoPath;
		?>

		<p>
		</p>
		
	<?php 
		$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('/m1/gPerson/upload',array('id'=>$model->id)),
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>5*1024*1024,// maximum file size in bytes
               //'minSizeLimit'=>1*1024*1024,// minimum file size in bytes
               //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",)); }",
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               //'showMessage'=>"js:function(message){ alert(message); }"
              ),
		)); 
	?>
		
	<?php echo $this->renderPartial('/gPerson/_personalInfo',array('model'=>$model)); ?>	
	
	</div>
	<div class="span10">
		<?php
		$this->widget('bootstrap.widgets.BootTabs', array(
			'type'=>'tabs', // 'tabs' or 'pills'
			'tabs'=>array(
				array('id'=>'tab1','label'=>'Detail','content'=>$this->renderPartial("_tabDetail", array("model"=>$model), true),'active'=>true),
				array('id'=>'tab2','label'=>'Internal Career','content'=>$this->renderPartial("_mainCareer", array("model"=>$model,"modelCareer"=>$modelCareer), true)),
				array('id'=>'tab3','label'=>'Family','content'=>$this->renderPartial("_mainFamily", array("model"=>$model,"modelFamily"=>$modelFamily), true)),
				array('id'=>'tab4','label'=>'Education','content'=>$this->renderPartial("_mainEducation", array("model"=>$model,"modelEducation"=>$modelEducation), true)),
				array('id'=>'tab5','label'=>'Non Formal Edu','content'=>$this->renderPartial("_mainEducationNf", array("model"=>$model,"modelEducationNf"=>$modelEducationNf), true)),
				array('id'=>'tab6','label'=>'Experience','content'=>$this->renderPartial("_mainExperience", array("model"=>$model,"modelExperience"=>$modelExperience), true)),
				array('id'=>'tab7','label'=>'Status','content'=>$this->renderPartial("_mainStatus", array("model"=>$model,"modelStatus"=>$modelStatus), true)),
				array('id'=>'tab8','label'=>'Other Info','content'=>$this->renderPartial("_tabOther", array("model"=>$model,"modelOther"=>$modelOther), true)),
			),
		));
		?>
		
	</div>
</div>

<hr/>

<div class="row-fluid">
	<div class="span6">
		<?php echo $this->renderPartial('/gPerson/_sameDepartment',array('model'=>$model)); ?>	
	</div>
	<div class="span6">
		<?php echo $this->renderPartial('/gPerson/_sameLevel',array('model'=>$model)); ?>	
	</div>
</div>
