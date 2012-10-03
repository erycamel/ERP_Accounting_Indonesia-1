<?php echo $this->renderPartial('_tabStatus',array("model"=>$model,"modelStatus"=>$modelStatus)); ?>

<div class="page-header">
	<h3>New Status</h3>
</div>
<?php echo $this->renderPartial('_formStatus',array('model'=>$modelStatus)); ?>