<?php
$this->breadcrumbs=array(
		$this->module->id,
);
?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/company.png') ?>
		Welcome!!
	</h1>
</div>

<div class="row-fluid">
	<div class="span12">
		<?php
		echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/accounting.jpg','image',array('style'=>'width: 100%'));
		?>
	</div>
</div>

<br />

<div class="row-fluid">
	<div class="span12">
		<?php $this->beginWidget('bootstrap.widgets.BootHeroUnit', array(
				//'heading'=>'Welcome!!',
		)); ?>

		<p>Welcome to Accounting Module. This page has been reserved for
			future use. Thank you for using this product</p>

		<p>
			<?php $this->widget('bootstrap.widgets.BootButton', array(
					'type'=>'primary',
					'size'=>'large',
					'label'=>'Learn more',
			)); ?>
		</p>

		<?php $this->endWidget(); ?>
	</div>
</div>

