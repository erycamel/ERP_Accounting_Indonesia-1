<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker4', "
		$(function() {
		$( \"#".CHtml::activeId($model,'birth_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
			
});

		");
?>

<?php $form=$this->beginWidget('BootActiveForm', array(
		'id'=>'g-person-form',
		'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row-fluid">
	<div class="span6">
		<?php echo $form->textFieldRow($model,'employee_name',array('class'=>'span3','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'birth_place',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'birth_date'); ?>

		<?php echo $form->dropDownListRow($model,'sex_id',sParameter::items("cKelamin")); ?>

		<?php echo $form->dropDownListRow($model,'religion_id',sParameter::items("cAgama")); ?>

		<?php echo $form->textFieldRow($model,'address1',array('class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'address2',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'address3',array('class'=>'span2','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'pos_code',array('size'=>5,'maxlength'=>5)); ?>

	</div>
	<div class="span6">
		<?php echo $form->textFieldRow($model,'identity_number',array('size'=>25,'maxlength'=>25)); ?>

		<?php echo $form->textFieldRow($model,'identity_valid'); ?>

		<?php echo $form->textFieldRow($model,'identity_address1',array('class'=>'span3','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'identity_address2',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'identity_address3',array('class'=>'span2','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'identity_pos_code',array('size'=>5,'maxlength'=>5)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span3','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'email2',array('class'=>'span3','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'blood_id',array('class'=>'span2','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'home_phone',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'handphone',array('class'=>'span3','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'handphone2',array('class'=>'span3','maxlength'=>50)); ?>

		<?php //echo $form->textFieldRow($model,'userid'); ?>

		<?php //echo $form->textFieldRow($model,'t_status'); ?>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.BootButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>

		</div>
	</div>
</div>

<?php $this->endWidget(); ?>

