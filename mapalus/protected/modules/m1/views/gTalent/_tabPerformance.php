<?php $this->widget('BootGridView', array(
	'id'=>'g-person-performance-grid',
	'dataProvider'=>gPersonPerformance::model()->search($model->id),
	//'filter'=>$model,
	'template'=>'{items}',
	'columns'=>array(
		'input_date',
		'year',
		'predicate',
		'remark',
		array(
				'class'=>'EJuiDlgsColumn',
				'template'=>'{update}{delete}',
				//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
				'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gTalent/deletePerformance",array("id"=>$data->id))',
				'updateDialog'=>array(
						'controllerRoute' => 'm1/gTalent/updatePerformance',
						'actionParams' => array('id'=>'$data->id'),
						'dialogTitle' => 'Update Performance',
						'dialogWidth' => 512, //override the value from the dialog config
						'dialogHeight' => 530
				),
		),
	),
)); ?>

<div class="page-header">
	<h3>New Performance</h3>
</div>
<?php echo $this->renderPartial('_formPerformance',array('model'=>$modelPerformance)); ?>