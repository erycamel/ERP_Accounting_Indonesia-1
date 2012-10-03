<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'gperson-education-nf-grid',
	'dataProvider'=>gPersonEducationNf::model()->search($model->id),
	//'filter'=>$model,
	'template'=>'{items}',
	'columns'=>array(
		'education_name',
		'category',
		'start',
		'end',
		'sertificate',
		'country',
		array(
				'class'=>'EJuiDlgsColumn',
				'template'=>'{update}{delete}',
				//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
				'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteEducationNf",array("id"=>$data->id))',
				'updateDialog'=>array(
						'controllerRoute' => 'm1/gPerson/updateEducationNf',
						'actionParams' => array('id'=>'$data->id'),
						'dialogTitle' => 'Update Non Formal Education',
						'dialogWidth' => 512, //override the value from the dialog config
						'dialogHeight' => 530
				),
		),
	),
)); ?>

