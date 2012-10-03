<?php
/* @var $this GPersonEducationNfController */
/* @var $model GPersonEducationNf */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('BootActiveForm', array(
	'id'=>'gperson-education-nf-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>


	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'education_name',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'category',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'start',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'end',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'sertificate',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'country',array('class'=>'span3')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->