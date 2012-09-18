<div class="well">

	<?php
	Yii::app()->clientScript->registerScript('search'.$data->id, "
			$('.hide-info'+$data->id).click(function(){
			$('.list'+$data->id).toggle('slow');
			return false;
});
			");
	?>


	<h4>
		<?php 
		//echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/live_journal.png') . CHtml::link(CHtml::encode($data->system_ref), array('view', 'id'=>$data->id));
		echo CHtml::link(CHtml::encode($data->system_reff()), array('view', 'id'=>$data->id));
		echo " ( ";

		if ($data->state_id != 4) {
			echo 	   CHtml::link('DELETE',"#", array("class"=>"btn btn-mini", "submit"=>array('delete', 'id'=>$data->id), 'confirm' => 'Are you sure?'));
			echo " | ";
			echo CHtml::link('UPDATE',Yii::app()->createUrl($this->module->id .'/'. $this->id.'/update',array("id"=>$data->id)),array("class"=>"btn btn-mini"));
			echo " | ";
		}

		echo CHtml::link('PRINT',Yii::app()->createUrl($this->module->id .'/'. $this->id.'/print',array("id"=>$data->id)),array('target'=>'_blank',"class"=>"btn btn-mini"));
		echo " ) ";

		?>
		<?php echo CHtml::link('detail<i class="icon-chevron-right"></i>','#',array('class'=>'hide-info'.$data->id));
		echo ($data->journalSum != $data->journalSumCek) ? " WARNING!!!... FAULT BY SYSTEM. JOURNAL IS NOT BALANCE, PLEASE DELETE.." : "";
		?>
	</h4>

	<?php if ($data->remark !=null) { ?>
	<div style="color: #999; font-size: 11px; margin: 5px 0">
		<?php echo CHtml::encode($data->remark); ?>
	</div>
	<?php }; ?>
	<br />


	<?php
	//$this->widget('bootstrap.widgets.BootDetailView', array(
	$this->widget('ext.XDetailView', array(
			'ItemColumns' => 3,
			'data'=>array(
					'id'=>1,
					'entity_id'=>$data->entity->name,
					'input_date'=>$data->input_date,
					'yearmonth_periode'=>$data->yearmonth_periode,
					'user_ref'=>$data->user_ref,
					'total'=>Yii::app()->indoFormat->number($data->journalSum),
			),
			'attributes'=>array(
					array('name'=>'entity_id', 'label'=>'Entity'),
					array('name'=>'input_date', 'label'=>'Input Date'),
					array('name'=>'yearmonth_periode', 'label'=>'Periode'),
					array('name'=>'user_ref', 'label'=>'Rec\'er/Rec\'ed From'),
					array('name'=>'total', 'label'=>'Total'),
			),
	)); ?>

	<div class="list<?php echo $data->id ?>" style="display: none">

		<?php echo $this->renderPartial('/uJournal/_viewDetail', array('id'=>$data->id)); ?>
	</div>
</div>

