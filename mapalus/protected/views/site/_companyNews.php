<h2>Company News</h2>
<?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_companyNewsD',
//	'template'=>"{items}",
//));

?>
	
<?php foreach ($dataProvider->getData() as $data) { ?>
<div class="row-fluid">
<div class="span1">
<?php	echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/FA-logo-APL-1_ONLY.jpg", CHtml::encode($data->id), array("width"=>"100%")); ?>
</div>
<div class="span11">
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

<?php } ?>
