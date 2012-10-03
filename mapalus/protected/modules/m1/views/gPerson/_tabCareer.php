<?php $this->widget('bootstrap.widgets.BootGridView',array(
		'id'=>'g-karir-grid',
		'dataProvider'=>gPersonCareer::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				'start_date',
				array(
						'header'=>'Status',
						'value'=>'isset($data->status->name) ? $data->status->name : ""',
				),
				array(
						'header'=>'Company',
						'value'=>'isset($data->company->name) ? $data->company->name : ""',
				),
				array(
						'header'=>'Department',
						'value'=>'isset($data->department->name) ? $data->department->name : ""',
				),
				//'department_id',
				array(
						'header'=>'Level',
						'value'=>'isset($data->level->name) ? $data->level->name : ""',
				),
				'job_title',
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gPerson/deleteCareer",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gPerson/updateCareer',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Career',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 530
						),
				),
		),
)); ?>

