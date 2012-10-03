<?php
/* @var $this GLeaveController */
/* @var $model gLeave */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'g-leave-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_cuti'); ?>
		<?php echo $form->textField($model,'n_cuti',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'n_cuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_cuti'); ?>
		<?php echo $form->textField($model,'d_cuti'); ?>
		<?php echo $form->error($model,'d_cuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_dari'); ?>
		<?php echo $form->textField($model,'d_dari'); ?>
		<?php echo $form->error($model,'d_dari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_sampai'); ?>
		<?php echo $form->textField($model,'d_sampai'); ?>
		<?php echo $form->error($model,'d_sampai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_jmlhari'); ?>
		<?php echo $form->textField($model,'n_jmlhari'); ?>
		<?php echo $form->error($model,'n_jmlhari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_h_masuk'); ?>
		<?php echo $form->textField($model,'c_h_masuk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'c_h_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_h_masuk'); ?>
		<?php echo $form->textField($model,'d_h_masuk'); ?>
		<?php echo $form->error($model,'d_h_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_cuti'); ?>
		<?php echo $form->textField($model,'r_cuti',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'r_cuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_cutiii'); ?>
		<?php echo $form->textField($model,'n_cutiii'); ?>
		<?php echo $form->error($model,'n_cutiii'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_masal'); ?>
		<?php echo $form->textField($model,'c_masal'); ?>
		<?php echo $form->error($model,'c_masal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_pribadi'); ?>
		<?php echo $form->textField($model,'c_pribadi'); ?>
		<?php echo $form->error($model,'c_pribadi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_sisacuti'); ?>
		<?php echo $form->textField($model,'n_sisacuti'); ?>
		<?php echo $form->error($model,'n_sisacuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_ganti'); ?>
		<?php echo $form->textField($model,'c_ganti',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'c_ganti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_ajukan'); ?>
		<?php echo $form->textField($model,'c_ajukan',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'c_ajukan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_ketahui'); ?>
		<?php echo $form->textField($model,'c_ketahui',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'c_ketahui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_setuju'); ?>
		<?php echo $form->textField($model,'c_setuju',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'c_setuju'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_ajukan'); ?>
		<?php echo $form->textField($model,'d_ajukan'); ?>
		<?php echo $form->error($model,'d_ajukan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_ketahui'); ?>
		<?php echo $form->textField($model,'d_ketahui'); ?>
		<?php echo $form->error($model,'d_ketahui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_setuju'); ?>
		<?php echo $form->textField($model,'d_setuju'); ?>
		<?php echo $form->error($model,'d_setuju'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_keterangan'); ?>
		<?php echo $form->textField($model,'t_keterangan',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'t_keterangan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahunke'); ?>
		<?php echo $form->textField($model,'tahunke'); ?>
		<?php echo $form->error($model,'tahunke'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approved_id'); ?>
		<?php echo $form->textField($model,'approved_id'); ?>
		<?php echo $form->error($model,'approved_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->