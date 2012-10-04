<br/>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-pills">
		<li class="active"><a href="#mtab1" data-toggle="tab">Probation</a></li>
		<li><a href="#mtab2" data-toggle="tab">Contract</a></li>
		<li><a href="#mtab3" data-toggle="tab">Birthday</a></li>
		<li><a href="#mtab4" data-toggle="tab">Employee Out</a></li>
		<li><a href="#mtab5" data-toggle="tab">Employee In</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="mtab1">
			<p> <?php $this->widget('probation'); ?> </p>
		</div>
		<div class="tab-pane" id="mtab2">
			<p> <?php $this->widget('contract'); ?> </p>
		</div>
		<div class="tab-pane" id="mtab3">
			<p> <?php $this->widget('birthday'); ?> </p>
		</div>
		<div class="tab-pane" id="mtab4">
			<p> <?php $this->widget('employeeOut'); ?> </p>
		</div>
		<div class="tab-pane" id="mtab5">
			<p> <?php $this->widget('employeeIn'); ?> </p>
		</div>
	</div>
</div>

