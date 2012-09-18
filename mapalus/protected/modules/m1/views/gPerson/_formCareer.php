<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker3', "
		$(function() {
		$( \"#".CHtml::activeId($model,'start_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#".CHtml::activeId($model,'end_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
			
});

		");
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'g-karir-form',
		'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span2')); ?>

<?php echo $form->textFieldRow($model,'end_date',array('class'=>'span2')); ?>

<?php echo $form->dropDownListRow($model,'status_id',sParameter::items('cPromotion')); ?>

<?php //echo $form->dropDownListRow($model,'company_id',aOrganization::model()->companyDropDown()); ?>

<div class="control-group">
	<?php echo $form->labelEx($model,'company_id',array("class"=>"control-label")); ?>
	<div class="controls">
		<?php 
		echo $form->dropDownList($model, 'company_id', aOrganization::model()->companyDropDown(),
				array(
						'empty'=>'Select Company:',
						'ajax' => array(
								'type'=>'POST',
								'url'=>CController::createUrl('/m1/gPerson/deptUpdate'),
								'update'=>'#'.CHtml::activeId($model,'department_id'),
					 )
				)
		);
		?>
	</div>
</div>

<?php //echo $form->dropDownListRow($model,'department_id',aOrganization::model()->deptByCompany()); ?>

<?php echo $form->dropDownListRow($model,'department_id',array()); ?>

<?php echo $form->dropDownListRow($model,'level_id',gParamLevel::model()->levelDropDown()); ?>

<?php echo $form->textFieldRow($model,'job_title',array('class'=>'span4')); ?>

<?php echo $form->textAreaRow($model,'reason',array('class'=>'span4','rows'=>3)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>

<?php $this->endWidget(); ?>
