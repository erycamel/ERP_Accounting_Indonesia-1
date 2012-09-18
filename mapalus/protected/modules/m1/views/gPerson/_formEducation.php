<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'g-education-form',
		'enableAjaxValidation'=>false,
		'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model,'level_id',sParameter::items('edu')); ?>

<?php echo $form->textFieldRow($model,'school_name',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'city',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'interest',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'graduate',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'country',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'institution',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'ipk',array('class'=>'span3')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>

<?php $this->endWidget(); ?>
