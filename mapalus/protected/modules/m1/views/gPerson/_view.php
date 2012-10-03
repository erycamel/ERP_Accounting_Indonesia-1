		<h3>
			<?php echo CHtml::link(CHtml::encode($data->employee_name),array('view','id'=>$data->id)); ?>
		</h3>
		
<?php echo $this->renderPartial('/gPerson/_viewDetail',array('data'=>$data)); ?>