<div class="row-fluid">
	<div class="span2 well">
		<?php 
			echo $data->photoPath;
		?>
	</div>
	<div class="span9">
		<?php echo CHtml::encode($data->employee_code); ?>
		<br/>
		<?php
			if (isset($data->company)) {
				echo CHtml::encode($data->mCompany());
				echo "<br/>";
				echo CHtml::encode($data->mLevel()); 
				echo "<br/>";
				echo CHtml::encode($data->mJobTitle()); 
			}
		?>
		<br/>
		<?php
			if (isset($data->status)) {
				echo CHtml::encode($data->mStatus()); 
			} else
				echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		?>

		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('sex_id')); ?>:</b>
		<?php echo isset($data->sex) ? $data->sex->name : ""; ?>
		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
		<?php echo isset($data->religion) ? $data->religion->name : ""; ?>

		<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
		<?php echo CHtml::encode($data->address1); ?>
		<?php echo CHtml::encode($data->address2); ?>
		<?php echo CHtml::encode($data->address3); ?>
		<?php echo CHtml::encode($data->pos_code); ?>
		<br/>
		

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