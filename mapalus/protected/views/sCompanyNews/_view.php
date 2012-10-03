<?php
/* @var $this SCompanyNewsController */
/* @var $data SCompanyNews */
?>

<div class="span12">
	<h3>
	<?php echo CHtml::link(CHtml::encode($data->title),Yii::app()->createUrl('/sCompanyNews/view',array('id'=>$data->id))); ?>
	</h3>
	
	<div class="row">
	<div class="span2">
		<?php
			//$this->widget('ext.espaceholder.ESpaceHolder', array(
			//		'size' => '100x100', // you can also do 300x250
			//		'text' => CHtml::encode($data->id),
			//		'htmlOptions' => array( 'title' => 'image' )
			//));
		?>
		<?php	echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/FA-logo-APL-1_ONLY.jpg", CHtml::encode($data->id), array("width"=>"100%")); ?>
	</div>
	<div class="span9">
		<?php echo date('F j, Y',$data->created_date); ?>
		<br />
<?php
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
	$_desc = $data->content ? substr($data->content,0,420) ."..." : "";
	echo $_desc ;
	$this->endWidget();
?>
		<br />
		<br />



	</div>
	</div>

</div>