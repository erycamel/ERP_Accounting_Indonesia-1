<?php $this->widget('ext.bootstrap.widgets.BootGridView', array(
	'id'=>'g-person-other-grid',
	'dataProvider'=>gPersonOther::model()->search($model->id),
	//'filter'=>$model,
	'columns'=>array(
		'category_name',
		'document_number',
		'issued_date',
		'valid_to',
		'custom_info1',
		//'custom_info2',
		//'custom_info3',
		'remark',
		array(
				'class'=>'EJuiDlgsColumn',
				'template'=>'{update}{delete}',
				//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
				'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteOther",array("id"=>$data->id))',
				'updateDialog'=>array(
						'controllerRoute' => 'm1/gPerson/updateOther',
						'actionParams' => array('id'=>'$data->id'),
						'dialogTitle' => 'Update Other',
						'dialogWidth' => 512, //override the value from the dialog config
						'dialogHeight' => 530
				),
		),
	),
)); ?>

<div class="page-header">
	<h3>New Other Info</h3>
</div>
<?php echo $this->renderPartial('_formOther',array('model'=>$modelOther)); ?>