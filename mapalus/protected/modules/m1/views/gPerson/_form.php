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
	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Basic Info'
    )); ?>   
		
		<?php echo $form->textFieldRow($model,'employee_code',array()); ?>

		<?php echo $form->textFieldRow($model,'employee_name',array()); ?>

		<?php echo $form->textFieldRow($model,'birth_place',array()); ?>

		<?php echo $form->textFieldRow($model,'birth_date'); ?>

		<?php echo $form->dropDownListRow($model,'sex_id',sParameter::items("cKelamin")); ?>

		<?php echo $form->dropDownListRow($model,'religion_id',sParameter::items("cAgama")); ?>

	<?php $this->endWidget(); ?><!-- collabsible fieldset -->
	
	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Address'
    )); ?>   
		<?php echo $form->textFieldRow($model,'address1',array('class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'address2',array()); ?>

		<?php echo $form->textFieldRow($model,'address3',array()); ?>

		<?php echo $form->textFieldRow($model,'pos_code',array('class'=>'span2')); ?>

	<?php $this->endWidget(); ?><!-- collabsible fieldset -->
	
	</div>
	<div class="span6">
	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Identity'
    )); ?>   
		<?php echo $form->textFieldRow($model,'identity_number',array()); ?>

		<?php echo $form->textFieldRow($model,'identity_valid'); ?>

		<?php echo $form->textFieldRow($model,'identity_address1',array()); ?>

		<?php echo $form->textFieldRow($model,'identity_address2',array()); ?>

		<?php echo $form->textFieldRow($model,'identity_address3',array()); ?>

		<?php echo $form->textFieldRow($model,'identity_pos_code',array('class'=>'span2')); ?>

	<?php $this->endWidget(); ?><!-- collabsible fieldset -->

	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Contact'
    )); ?>   
		<?php echo $form->textFieldRow($model,'email',array()); ?>

		<?php echo $form->textFieldRow($model,'email2',array()); ?>

		<?php echo $form->textFieldRow($model,'blood_id',array()); ?>

		<?php echo $form->textFieldRow($model,'home_phone',array()); ?>

		<?php echo $form->textFieldRow($model,'handphone',array()); ?>

		<?php echo $form->textFieldRow($model,'handphone2',array()); ?>
		
	<?php $this->endWidget(); ?><!-- collabsible fieldset -->

	<?php $this->beginWidget('ext.coolfieldset.JCollapsibleFieldset', array(
        'legend'=>'Bank'
    )); ?>   
		<?php echo $form->textFieldRow($model,'account_number',array()); ?>

		<?php echo $form->textFieldRow($model,'account_name',array()); ?>

		<?php echo $form->textFieldRow($model,'bank_name',array()); ?>
		
	<?php $this->endWidget(); ?><!-- collabsible fieldset -->

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

