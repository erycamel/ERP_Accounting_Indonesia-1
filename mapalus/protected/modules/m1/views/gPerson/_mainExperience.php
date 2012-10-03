<?php echo $this->renderPartial('_tabExperience',array("model"=>$model,"modelExperience"=>$modelExperience)); ?>

<div class="page-header">
	<h3>New Experience</h3>
</div>
<?php echo $this->renderPartial('_formExperience',array('model'=>$modelExperience)); ?>