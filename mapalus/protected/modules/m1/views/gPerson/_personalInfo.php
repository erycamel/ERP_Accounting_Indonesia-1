	<div class="well">
		<p>
		<?php
		echo "<h6>Department</h6>";
		if (isset($model->company)) {
			echo $model->company->department->name;
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		?>
		</p>
		<p>
		<?php
		echo "<h6>Job Title</h6>";
		if (isset($model->company)) {
			echo $model->company->job_title;
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		?>
		</p>
		<p>
		<?php
		echo "<h6>Level</h6>";
		if (isset($model->company)) {
			echo $model->company->level->name;
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		?>
		</p>
		<p>
		<?php
		echo "<h6>Status</h6>";
		if (isset($model->status)) {
			echo $model->mStatus();
			echo "<br/>";
			echo $model->countContract();
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		
		?>
		</p>
		<p>
		<?php
		echo "<h6>Join Date</h6>";
		if (isset($model->companyfirst)) {
			echo $model->companyfirst->start_date;
			echo "<br/>";
			echo $model->countJoinDate();
		} else
			echo CHTML::tag('div',array('style'=>'color:red;'),".::INCOMPLETE::.");
		?>
		</p>
	</div>
	
