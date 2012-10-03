<?php echo $this->renderPartial('_tabFamily',array("model"=>$model,"modelFamily"=>$modelFamily)); ?>

<div class="page-header">
	<h3>New Family</h3>
</div>
<?php echo $this->renderPartial('_formFamily',array('model'=>$modelFamily)); ?>