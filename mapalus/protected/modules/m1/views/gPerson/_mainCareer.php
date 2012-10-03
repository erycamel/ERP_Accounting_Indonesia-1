<?php echo $this->renderPartial('_tabCareer',array("model"=>$model,"modelCareer"=>$modelCareer)); ?>

<div class="page-header">
	<h3>New Career</h3>
</div>
<?php echo $this->renderPartial('_formCareer',array('model'=>$modelCareer)); ?>