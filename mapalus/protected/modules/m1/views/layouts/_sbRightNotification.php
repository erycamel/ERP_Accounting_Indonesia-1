<br/>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#mtab1" data-toggle="tab">Probation</a></li>
		<li><a href="#mtab2" data-toggle="tab">Contract</a></li>
		<li><a href="#mtab3" data-toggle="tab">Birthday</a></li>
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
	</div>
</div>

