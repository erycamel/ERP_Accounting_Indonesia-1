<div class="row">
<div class="span1">
PHOTO
</div>
<div class="span6">
<?php echo CHtml::link(CHtml::encode($data->title), Yii::app()->createUrl('/sCompanyNews/view', array("id"=>$data->id))); ?>
<br/>
<?php echo $data->id . ' on ' . date('F j, Y',$data->created_date); ?>
<br/>
<?php
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
	$_desc = $data->content ? substr($data->content,0,210) ."..." : "";
	echo $_desc ;
	$this->endWidget();
?>
</div>
</div>
