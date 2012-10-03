<?php
/* @var $this GPersonExperienceController */
/* @var $model gPersonExperience */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="span12">


		<?php $form=$this->beginWidget('BootActiveForm', array(
				'id'=>'g-person-experience-form',
				'enableAjaxValidation'=>false,
				'type'=>'horizontal',
		)); ?>

		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'industries',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'end_date',array('class'=>'span3')); ?>

		<?php echo $form->textFieldRow($model,'year_length',array('class'=>'span1')); ?>

		<?php echo $form->textFieldRow($model,'month_length',array('class'=>'span1')); ?>

		<?php echo $form->textFieldRow($model,'job_title',array('class'=>'span5')); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.BootButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
		</div>


		<?php $this->endWidget(); ?>

	</div>
</div>
<!-- form -->
