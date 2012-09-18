<div class="row-fluid">
	<div class="span2 well">
		<?php 
		if ($data->c_pathfoto == null || (!is_file(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$data->c_pathfoto))) {
			echo CHtml::image(Yii::app()->request->baseUrl . "/images/nophoto.jpg", "No Photo", array("class"=>"100%"));
			//$this->widget('ext.espaceholder.ESpaceHolder', array(
			//		'size' => '100%', // you can also do 300x250
			//		'text' => CHtml::encode($data->employee_name),
			//		'htmlOptions' => array( 'title' => 'test image' )
			//));

		} else {
			echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$data->c_pathfoto, CHtml::encode($data->employee_name), array("width"=>"100%"));
		}
		?>
	</div>
	<div class="span9">
		<?php echo CHtml::encode($data->employee_code); ?>
		<?php //echo CHtml::encode($data->c_proyek); ?>
		<?php //echo CHtml::encode($data->c_pt); ?>
		<?php //echo CHtml::encode($data->c_direktorat); ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('birth_place')); ?>:</b>
		<?php echo CHtml::encode($data->birth_place); ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
		<?php echo CHtml::encode($data->birth_date); ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('sex_id')); ?>:</b>
		<?php echo isset($data->sex) ? $data->sex->name : ""; ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
		<?php echo isset($data->religion) ? $data->religion->name : ""; ?>

		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
		<?php echo CHtml::encode($data->address1); ?>
		<?php echo CHtml::encode($data->address2); ?>
		<?php echo CHtml::encode($data->address3); ?>
		<?php echo CHtml::encode($data->pos_code); ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
		<?php echo CHtml::encode($data->userid); ?>

	</div>


</div>
<?php /*
EQuickDlgs::ajaxIcon(
		Yii::app()->baseUrl .'images/view.png',
		array(
				'controllerRoute' => '/m1/gPerson/view', //'member/view'
				'actionParams' => array('id'=>$data->id), //array('id'=>$model->member->id),
				'dialogTitle' => 'Detailview',
				'dialogWidth' => 800,
				'dialogHeight' => 600,
				'openButtonText' => 'View record',
				'closeButtonText' => 'Close',
		)
);
		*/
		?>