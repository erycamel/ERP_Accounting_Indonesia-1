<div class="row-fluid">
	<?php 
	//$this->widget('bootstrap.widgets.BootGridView', array(
	$this->widget('ext.groupgridview.BootGroupGridView', array(
		'extraRowColumns' => array('tMonth'),  
			'id'=>'employee-grid',
			'dataProvider'=>gPerson::model()->employeeOut(),
			'template'=>'{items}',
			'enableSorting'=>false,
			'columns'=>array(
				array(
				'name' => 'tMonth',
				'value' => 'date("M-Y", strtotime($data->status->start_date))',
				'headerHtmlOptions' => array('style' => 'display: none'),
				'htmlOptions' => array('style' => 'display: none'),
				),
				array(
					'type'=>'raw',
					'value'=>'CHtml::link($data->photoPath,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id)))',
					'htmlOptions'=>array("width"=>"55px"),
				),
				array(
					'header' => 'Name',
					'type' => 'raw',
					'value'=> function($data){
						return CHtml::tag('div', array('style'=>'font-weight: bold'), CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id))))
							. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->company->department->name)
							. $data->company->level->name;
					}
				),					
				array(
					'header'=>'Join Date',
					'value'=>'$data->company->start_date',
				),
				array(
					'header'=>'Resign Date',
					'value'=>'$data->status->start_date',
				),
				//'company.company.name',
				//array(
				//	'header'=>'Status',
				//	'name'=>'status.status.name',
				//),
				//'status.remark',
			),
	)); ?>
</div>
