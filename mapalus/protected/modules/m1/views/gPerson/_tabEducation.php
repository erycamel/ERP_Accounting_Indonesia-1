<?php $this->widget('bootstrap.widgets.BootGridView',array(
		'id'=>'g-education-grid',
		'dataProvider'=>gPersonEducation::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				array(
						'header'=>'Level',
						'value'=>'$data->edulevel->name',
				),
				'school_name',
				'city',
				'interest',
				'graduate',
				'country',
				'institution',
				//'ipk',
				//array(
				//		'class'=>'bootstrap.widgets.BootButtonColumn',
				//		'template'=>'{delete}',
				//		'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteEducation",array("id"=>$data->id))',
				//),
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteEducation",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gPerson/updateEducation',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Education',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 600,
						),
				),
		),
)); ?>

<div class="page-header">
	<h3>New Education</h3>
</div>

<?php echo $this->renderPartial('_formEducation',array('model'=>$modelEducation)); ?>