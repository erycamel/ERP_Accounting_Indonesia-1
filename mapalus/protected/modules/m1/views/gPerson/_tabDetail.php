
<?php echo CHtml::link('Update',$this->createUrl('update',array('id'=>$model->id)),array('class'=>'btn btn-mini')); ?>


<br />
<br />

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
				'address1',
		'address2',
		'address3',
		'pos_code',
		array(
				'header'=>'Other Information',
		),
		'identity_number',
		'identity_valid',
		'identity_address1',
		'identity_address2',
		'identity_address3',
		'identity_pos_code',
		'email',
		'email2',
		'blood_id',
		'home_phone',
		'handphone',
		'handphone2',
),
));

?>


