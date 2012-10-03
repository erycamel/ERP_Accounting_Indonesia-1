<?php
/* @var $this GLeaveController */
/* @var $model gLeave */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_cuti'); ?>
		<?php echo $form->textField($model,'n_cuti',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_cuti'); ?>
		<?php echo $form->textField($model,'d_cuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_dari'); ?>
		<?php echo $form->textField($model,'d_dari'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_sampai'); ?>
		<?php echo $form->textField($model,'d_sampai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_jmlhari'); ?>
		<?php echo $form->textField($model,'n_jmlhari'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_h_masuk'); ?>
		<?php echo $form->textField($model,'c_h_masuk',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_h_masuk'); ?>
		<?php echo $form->textField($model,'d_h_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_cuti'); ?>
		<?php echo $form->textField($model,'r_cuti',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_cutiii'); ?>
		<?php echo $form->textField($model,'n_cutiii'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_masal'); ?>
		<?php echo $form->textField($model,'c_masal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_pribadi'); ?>
		<?php echo $form->textField($model,'c_pribadi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_sisacuti'); ?>
		<?php echo $form->textField($model,'n_sisacuti'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_ganti'); ?>
		<?php echo $form->textField($model,'c_ganti',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_ajukan'); ?>
		<?php echo $form->textField($model,'c_ajukan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_ketahui'); ?>
		<?php echo $form->textField($model,'c_ketahui',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_setuju'); ?>
		<?php echo $form->textField($model,'c_setuju',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_ajukan'); ?>
		<?php echo $form->textField($model,'d_ajukan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_ketahui'); ?>
		<?php echo $form->textField($model,'d_ketahui'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_setuju'); ?>
		<?php echo $form->textField($model,'d_setuju'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_keterangan'); ?>
		<?php echo $form->textField($model,'t_keterangan',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahunke'); ?>
		<?php echo $form->textField($model,'tahunke'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_id'); ?>
		<?php echo $form->textField($model,'approved_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->