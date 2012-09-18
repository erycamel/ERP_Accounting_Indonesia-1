<?php
$this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>'Personal Folder','url'=>Yii::app()->createUrl('/sFileBrowser')),
				array('label'=>'Public Folder','url'=>Yii::app()->createUrl('/sFileBrowser/publicFolder'),'active'=>true),
				array('label'=>'System Folder','url'=>Yii::app()->createUrl('/sFileBrowser/systemFolder')),
				array('label'=>'System Folder Upload','url'=>Yii::app()->createUrl('/sFileBrowser/systemFolder'),'visible'=>Yii::app()->user->name == 'admin'),

		),
));
?>

<?php
// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
        'connectorRoute' => 'sFileBrowser/connectorPublicFolder',
        )
);

?>