	<?php
	// ElFinder widget
	$this->widget('ext.elFinder.ElFinderWidget', array(
			'connectorRoute' => 'sFileBrowser/connectorPersonalFolder',
			)
	);

	?>
	<br/>
	
	<div class="well">
		<?php echo $this->renderPartial("_tabPersonal", array("model"=>$model,"dataProvider"=>$dataProvider),true) ?>
	</div>
	<?php /*	
		<?php echo $this->renderPartial("_tabSystem", array("model3"=>$model3,"dataProvider"=>$dataProvider3),true) ?>
	*/ ?>

	<div class="well">
		<?php echo $this->renderPartial("_tabReminder", array("model"=>$model,"modeltask"=>$modeltask),true) ?>
	</div>

		<?php 
			$this->Widget('ext.highcharts.HighchartsWidget', array(
			   'options'=>array(
				  'title' => array('text' => 'Property Demand'),
				  'xAxis' => array(
					 'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Augt','Sept')
				  ),
				  'yAxis' => array(
					 'title' => array('text' => 'Demand')
				  ),
				  'series' => array(
					 array('name' => 'Land Houses', 'data' => array(1,2,4,6,5,9,12,18,20)),
					 array('name' => 'Apartments', 'data' => array(5,6,7,8,7,9,10,12,15)),
					 array('name' => 'Super Block', 'data' => array(6,7,8,6,9,6,8,10,12))
				  )
			   )
			));		
		?>

