<?php foreach($this->getRecentData() as $data): ?>
	<div class="row">
	<div class="span1">
	<?php echo $data->photoPath ; ?>
	</div>
	<div class="span2">
	<?php echo CHtml::link($data->employee_name,array('/m1/gPerson/view','id'=>$data->id)) ; ?>
	<br/>
	<div style="font-size:10px;">
		<?php echo (isset($data->company)) ? $data->company->department->name : ''; ?>
		<br/>
		<?php echo $data->mStatus(); ?>
		<br/>
		<?php echo $data->mStatusEndDate() ; ?>
		<?php echo ' ('.$data->countContract().')' ; ?>
	</div>
	</div>
	</div>
<?php endforeach; ?>
<br />

