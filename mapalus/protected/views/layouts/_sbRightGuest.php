<ul class="nav nav-list">
	<li class="nav-header">Company News</li>
</ul>
<?php $this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'list',
		'items'=>$this->menu1,
)); ?>
<br />


<ul class="nav nav-list">
	<li class="nav-header">Public Documents</li>
</ul>
<?php $this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'list',
		'items'=>$this->menu2,
)); ?>
<br />

<ul class="nav nav-list">
	<li class="nav-header">Photo Gallery</li>
</ul>
<?php $this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'list',
		'items'=>$this->menu3,
)); ?>
<br />

