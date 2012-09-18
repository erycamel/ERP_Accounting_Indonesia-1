<?php $this->widget('BootGridView', array(
		'id'=>'g-person-status-grid',
		'dataProvider'=>gPersonStatus::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				'cdate',
				array(
						'header'=>'Status',
						'value'=>'$data->status->name',
				),
				array(
						'header'=>'Valid',
						'value'=>'$data->valid->name',
				),
				'remark',
				//array(
				//	'class'=>'BootButtonColumn',
				//	'template'=>'{delete}',
				//	'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteStatus",array("id"=>$data->id))',
				//),
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteStatus",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gPerson/updateStatus',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Status',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 600,
						),
				),
		),
)); ?>


<div class="page-header">
	<h3>New Status</h3>
</div>

<?php echo $this->renderPartial('_formStatus',array('model'=>$modelStatus)); ?>