<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */
/* @var $form CActiveForm */
?>

<?php 
$form=$this->beginWidget('BootActiveForm', array(
		'id'=>'sNotification-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'title',array('class'=>'span6')); ?>

		<?php //echo $form->textAreaRow($model,'content',array('class'=>'span10', 'rows'=>16)); ?>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
			<div class="controls">
			<?php 
				$this->widget('ext.tinymce.TinyMce', array(
					'model' => $model,
					'attribute' => 'content',
					// Optional config
					'compressorRoute' => 'sCompanyNews/compressor',
					'spellcheckerRoute' => 'sCompanyNews/spellchecker',
					//'fileManager' => array(
					//	'class' => 'ext.elFinder.TinyMceElFinder',
					//	'connectorRoute'=>'sFileBrowser/connectorPublicFolder',
					//),
					//'htmlOptions' => array(
					//	'rows' => 6,
					//	'cols' => '100%',
					//),
				));
			?>
		</div>
		</div>

		<?php echo $form->textFieldRow($model,'tags',array('class'=>'span3')); ?>

		<div class="form-actions">
			<?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="icon-ok"></i> Create':'<i class="icon-ok"></i> Save', array('class'=>'btn', 'type'=>'submit')); ?>
		</div>


<?php $this->endWidget(); ?>
