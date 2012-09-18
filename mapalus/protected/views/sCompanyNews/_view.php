<?php
/* @var $this SCompanyNewsController */
/* @var $data SCompanyNews */
?>

<div class="span12">
	<h3>
	<?php echo CHtml::link(CHtml::encode($data->title),Yii::app()->createUrl('/sCompanyNews/view',array('id'=>$data->id))); ?>
	</h3>
	
	<div class="row">
	<div class="span1">
		<?php
			$this->widget('ext.espaceholder.ESpaceHolder', array(
					'size' => '100x200', // you can also do 300x250
					'text' => CHtml::encode($data->author_id),
					'htmlOptions' => array( 'title' => 'image' )
			));
		?>
		TEST
	</div>
	<div class="span11">
		<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
		<?php echo CHtml::encode($data->created_date); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
		<?php echo CHtml::encode($data->author_id); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
		<?php echo CHtml::encode($data->tags); ?>
		<br />
		<?php echo CHtml::encode($data->content); ?>
		<br />
		<br />



	</div>
	</div>

</div>