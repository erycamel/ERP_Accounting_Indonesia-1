<div style="border:1px solid #DDD; padding: 15px">
		<?php $form=$this->beginWidget('BootActiveForm', array(
				'id'=>'login-form',
				//'type'=>'horizontal',
				'enableAjaxValidation'=>true,
		)); ?>

		<?php echo $form->textFieldRow($model,'username',array('size'=>'25')); ?>
		<?php echo $form->passwordFieldRow($model,'password',array('size'=>'25')); ?>
		<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

		<div class="form-actions">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Submit', array('class'=>'btn', 'type'=>'submit')); ?>
		</div>

		<?php $this->endWidget(); ?>
	
		<div class="alert alert-warning">
			<h4 class="alert-heading">Note!!</h4>
			For technical and speed development reason, this application has designed to open with Chrome, Firefox or Opera Browser. so, Internet Explorer browser will not works here. We are sorry..
		</div>
	
</div>


