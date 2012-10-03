<div class="row">
<div class="span1">
<?php	echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/FA-logo-APL-1_ONLY.jpg", CHtml::encode($data->id), array("width"=>"100%")); ?>
</div>
<div class="span6">
<?php echo CHtml::link(CHtml::encode($data->title), Yii::app()->createUrl('/sCompanyNews/view', array("id"=>$data->id))); ?>
<br/>
<?php echo date('F j, Y',$data->created_date); ?>
<br/>
<?php
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
	$_desc = $data->content ? substr($data->content,0,210) ."..." : "";
	echo $_desc ;
	$this->endWidget();
?>
</div>
</div>
