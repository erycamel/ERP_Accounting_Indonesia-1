<?php
/* @var $this GPersonPerformanceController */
/* @var $model gPersonPerformance */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/js/jquery-ui-1.8.16.custom.min.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css/2jui-bootstrap/jquery-ui.css');

Yii::app()->clientScript->registerScript('datepicker4', "
		$(function() {
		$( \"#".CHtml::activeId($model,'input_date')."\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
			
});

		");
?>

<div class="row-fluid">

<?php $form=$this->beginWidget('BootActiveForm', array(
	'id'=>'g-person-performance-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'input_date'); ?>

		<?php echo $form->textFieldRow($model,'year'); ?>

		<?php echo $form->textFieldRow($model,'predicate',array('class'=>'span1')); ?>

		<?php echo $form->textAreaRow($model,'remark',array('rows'=>3,'class'=>'span5')); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.BootButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
		</div>


<?php $this->endWidget(); ?>

</div><!-- form -->