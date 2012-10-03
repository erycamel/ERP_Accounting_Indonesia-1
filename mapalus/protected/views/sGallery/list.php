<?php
/* @var $this SCompanyNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Photo Gallery',
);

$this->menu=array(
	array('label'=>'Home', 'url'=>array('/site/login')),
);

$this->menu1=sCompanyNews::getTopUpdated();

?>

<?php
$this->widget('ext.gallery.EGallery',
    array(
		'path' => 'shareimages/photo',
		'name' => 'Photo Gallery',
		'imagesPerPage' => 40,
		'imagesPerRow' => 5,
		//'albumsPerPage' = 20,
		//'albumsPerRow' = 0,
	)
);
?>