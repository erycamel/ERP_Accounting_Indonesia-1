<?php $this->widget('bootstrap.widgets.BootGridView',array(
		'id'=>'g-person-grid',
		'dataProvider'=>gLeave::model()->onWaiting(),
		//'filter'=>$model,
		'template'=>'{items}{pager}',
		'columns'=>array(
				array(
						'header'=>'Name',
						'type'=>'raw',
						'value'=>'CHtml::link($data->person->employee_name,Yii::app()->createUrl("/m1/gLeave/view",array("id"=>$data->parent_id)))',
				),
				//array(
				//		'header'=>'Unit',
				//		'value'=>'isset($data->person->company) ? $data->person->company->company->name: ""',
				//),
				'person.company.department.name',
				'start_date',
				'end_date',
				'number_of_day',
				'balance',
				array(
						'header'=>'Status',
						'value'=>'$data->approved->name',
				),
				array(
						'class'=>'bootstrap.widgets.BootButtonColumn',
						'template'=>'{update}{delete}',
						'updateButtonUrl'=>'Yii::app()->createUrl("/m1/gLeave/update",array("id"=>$data->id))',
						'deleteButtonUrl'=>'Yii::app()->createUrl("/m1/gLeave/delete",array("id"=>$data->id))',
				),
				array(
						'class'=>'BootButtonColumn',
						'template'=>'{approved}',
						'buttons'=>array
						(
								'approved' => array
								(
										'label'=>'Approved',
										'url'=>'Yii::app()->createUrl("/m1/gLeave/approved",array("id"=>$data->id,"pid"=>$data->parent_id))',
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

		),
)); ?>
