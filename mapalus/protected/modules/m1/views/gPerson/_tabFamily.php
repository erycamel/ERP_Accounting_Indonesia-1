<?php $this->widget('BootGridView', array(
		'id'=>'g-person-family-grid',
		'dataProvider'=>gPersonFamily::model()->search($model->id),
		//'filter'=>$model,
		'columns'=>array(
				'f_name',
				array(
						'header'=>'Relation',
						'value'=>'$data->relation->name',
				),
				'birth_place',
				'birth_date',
				'sex_id',
				'remark',
				//'payroll_cover_id',
				//array(
				//	'class'=>'BootButtonColumn',
						//	'template'=>'{delete}',
						//	'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteFamily",array("id"=>$data->id))',
						//),
						array(
								'class'=>'EJuiDlgsColumn',
								'template'=>'{update}{delete}',
								//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
								'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteFamily",array("id"=>$data->id))',
								'updateDialog'=>array(
										'controllerRoute' => 'm1/gPerson/updateFamily',
										'actionParams' => array('id'=>'$data->id'),
										'dialogTitle' => 'Update Family',
										'dialogWidth' => 512, //override the value from the dialog config
										'dialogHeight' => 600,
								),
						),
		),
)); ?>

<div class="page-header">
	<h3>New Family</h3>
</div>

<?php echo $this->renderPartial('_formFamily',array('model'=>$modelFamily)); ?>