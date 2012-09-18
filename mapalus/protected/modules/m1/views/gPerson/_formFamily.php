<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker1', "
		$(function() {
		$( \"#".CHtml::activeId($model,'birth_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
			
});

		");
?>

<?php $form=$this->beginWidget('BootActiveForm', array(
		'id'=>'g-person-family-form',
		'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>

<div class="row-fluid">
	<div class="span12">
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'f_name',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->dropDownListRow($model,'relation_id',sParameter::items('HK')); ?>

		<?php echo $form->textFieldRow($model,'birth_place',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'birth_date'); ?>

		<?php echo $form->dropDownListRow($model,'sex_id',sParameter::items('cKelamin')); ?>

		<?php echo $form->textAreaRow($model,'remark',array('class'=>'span4','rows'=>3)); ?>

		<?php echo $form->dropDownListRow($model,'payroll_cover_id',sParameter::items('cCover')); ?>
	</div>
</div>
<!-- form -->

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>

<?php $this->endWidget(); ?>

