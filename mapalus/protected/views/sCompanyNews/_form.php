<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scompany-news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_date'); ?>
		<?php echo $form->textField($model,'updated_date'); ?>
		<?php echo $form->error($model,'updated_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->