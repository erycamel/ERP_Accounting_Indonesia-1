<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker4', "
		$(function() {
		$( \"#".CHtml::activeId($model,'issued_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});
		$( \"#".CHtml::activeId($model,'valid_to')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});
			
});

		");
?>


<?php
/* @var $this GPersonOtherController */
/* @var $model gPersonOther */
/* @var $form CActiveForm */
?>

<div class="row-fluid">

<?php $form=$this->beginWidget('BootActiveForm', array(
	'id'=>'g-person-other-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'category_name',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'document_number',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'issued_date',array('class'=>'span2')); ?>
		<?php echo $form->textFieldRow($model,'valid_to',array('class'=>'span2')); ?>
		<?php echo $form->textFieldRow($model,'custom_info1',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'custom_info2',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'custom_info3',array('class'=>'span3')); ?>
		<?php echo $form->textAreaRow($model,'remark',array('rows'=>4,'class'=>'span5')); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.BootButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
		</div>


<?php $this->endWidget(); ?>

</div><!-- form -->