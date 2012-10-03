<?php 
		$this->widget('bootstrap.widgets.BootDetailView', array(
		//$this->widget('ext.XDetailView', array(
		//		'ItemColumns' => 2,
		'data'=>$model,
		'attributes'=>array(
				array(
						'header'=>'Basic Info',
				),
				'employee_code',
				array(
						'label'=>'Birth Place',
						'value'=>$model->birth_place,
				),
				'birth_date',
				array(
						'label'=>'Sex',
						'value'=>isset($model->sex) ? $model->sex->name : "",
				),
				array(
						'label'=>'Religion',
						'value'=>$model->religion->name,
				),
				//array(
				//		'label'=>'Marital Status',
				//		'value'=>$model->maritalstatus->name,
				//),
				'blood_id',
		array(
				'header'=>'Address and Domisili',
		),
		'address1',
		'address2',
		'address3',
		'pos_code',
		'identity_number',
		'identity_valid',
		'identity_address1',
		'identity_address2',
		'identity_address3',
		'identity_pos_code',
		array(
				'header'=>'Contact',
		),
		'email',
		'email2',
		'home_phone',
		'handphone',
		'handphone2',
		array(
				'header'=>'Bank Information',
		),
		'account_number',
		'account_name',
		'bank_name',
),
));

?>


