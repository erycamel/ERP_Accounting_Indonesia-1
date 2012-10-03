<?php $this->widget('BootGridView', array(
		'id'=>'g-person-experience-grid',
		'dataProvider'=>gPersonExperience::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				'company_name',
				'industries',
				'start_date',
				'end_date',
				'year_length',
				'month_length',
				'job_title',
				//array(
				//	'class'=>'BootButtonColumn',
				//	'template'=>'{delete}',
				//	'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteExperience",array("id"=>$data->id))',
				//),
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteExperience",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gPerson/updateExperience',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Experience',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 530
						),
				),
		),
)); ?>


