

<?php
$this->widget('bootstrap.widgets.BootDetailView', array(
		//$this->widget('ext.XDetailView', array(
		//'ItemColumns' => 3,
		'data'=>array(
				'id'=>1,
				'unit_joindate'=>$model->companyfirst->start_date,
		),
		'attributes'=>array(
				array('name'=>'unit_joindate', 'label'=>'Unit Join Date'),
		),
)); ?>

<?php 
$this->widget('bootstrap.widgets.BootGridView', array(
		//$this->widget('ext.groupgridview.GroupGridView', array(
		//'extraRowColumns' => array('start_date'),
		'id'=>'g-person-grid',
		'dataProvider'=>GLeave::model()->search($model->id),
		//'filter'=>$model,
		'template'=>'{items}',
		'columns'=>array(
				//'start_date',
				'start_date',
				'end_date',
				'number_of_day',
				//'work_date',
				'leave_reason',
				'mass_leave',
				'person_leave',
				'balance',
				//'person.leaveBalance.balance',
				//'replacement',
				array(
						'header'=>'State',
						'value'=>'$data->approved->name',
				),
				array(
						'class'=>'BootButtonColumn',
						'template'=>'{approved}',
						'buttons'=>array
						(
								'approved' => array
								(
										'label'=>'Approved',
										'url'=>'Yii::app()->createUrl("/m1/gLeave/approved",array("id"=>$data->id,"pid"=>$data->person->id))',
										'visible'=>'$data->approved_id ==1',
										'options'=>array(
												'ajax'=>array(
														'type'=>'GET',
														'url'=>"js:$(this).attr('href')",
														'success'=>'js:function(data){
														$.fn.yiiGridView.update("g-person-grid", {
														data: $(this).serialize()
});
}',
												),
												'class'=>'btn btn-mini',
										),
								),
						),

				),
				array(
						'class'=>'EJuiDlgsColumn',
						'template'=>'{update}{delete}',
						//'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
						'deleteButtonUrl'=>'Yii::app()->createUrl("m1/gLeave/delete",array("id"=>$data->id))',
						'updateDialog'=>array(
								'controllerRoute' => 'm1/gLeave/update',
								'actionParams' => array('id'=>'$data->id'),
								'dialogTitle' => 'Update Leave',
								'dialogWidth' => 512, //override the value from the dialog config
								'dialogHeight' => 530
						),
				),
		),
)); ?>
