<?php if (isset($model->company->department_id)): ?>

	<div class="row-fluid">
	<div class="span12">
		
		<h3>Same Department (<?php echo gPerson::model()->sameDepartment($model->mDepartmentId())->totalItemCount ?>)</h3>
		<?php $this->widget('bootstrap.widgets.BootGridView',array(
				'id'=>'g-person1-grid',
				'dataProvider'=>gPerson::model()->sameDepartment($model->mDepartmentId()),
				'enableSorting'=>false,
				'template'=>'{items}{pager}',
				'columns'=>array(
					array(
						'type'=>'raw',
						'value'=>'CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$data->c_pathfoto, CHtml::encode($data->employee_name), array("width"=>"100%","id"=>"photo")),Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id)))',
						'htmlOptions'=>array("width"=>"60px"),
					),
					array(
						'header' => 'Name',
						'type' => 'raw',
						'value'=> function($data){
							return CHtml::tag('div', array('style'=>'font-weight: bold'), CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id))))
								. CHtml::tag('div', array('style'=>'color: #999; font-size: 11px'), $data->employee_code);
								//. $data->countJoinDate();
						}
					),					
					array(
						'header'=>'Job Title',
						'value'=>'$data->mJobTitle()',
					),
					array(
						'header'=>'Level',
						'value'=>'$data->mLevel()',
					),
				),
		)); ?>
	</div>
</div>

<?php endif; ?>

<?php /*
EQuickDlgs::contentButton(
 array(
     'content' => 'This is the help text', //$this->renderPartial('_help',array(),true),
     'dialogTitle' => 'Help',
     'dialogWidth' => 200,
     'dialogHeight' => 300,
     'openButtonText' => 'Help me',
      'closeButtonText' => 'Close', //comment to remove the close button from the dialog
     )
  );
 */
?>

<?php
		//$this->widget('ext.xupload.XUploadWidget', array(
		//$this->widget('ext.xupload.XUpload', array(
		//			'url' => Yii::app()->createUrl("/bphgbi/bPejabat/upload", array("folder" =>'photo','id'=>$model->id)),
                    //'model' => $model,
                    //'attribute' => 'file',
					//'multiple' => true,
//));
?>
