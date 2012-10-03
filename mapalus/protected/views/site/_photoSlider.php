<?php /*
	$this->widget('bootstrap.widgets.BootCarousel', array(
		'items'=>array(
			array('image'=>Yii::app()->baseUrl.'/shareimages/photo/0012.jpg', 
				'caption'=>Yii::app()->name,
				'label'=>Yii::app()->createUrl(Yii::app()->name,array('test')),
				'url'=>Yii::app()->createUrl('/sCompanyNews'),
				'imageOptions'=>array(
					'width'=>'100%',
				),
			),
			array('image'=>Yii::app()->baseUrl.'/shareimages/photo/0016.jpg', 
				'caption'=>'Second Menu label',
				'imageOptions'=>array(
					'width'=>'100%',
				),
			),
			array('image'=>Yii::app()->baseUrl.'/shareimages/photo/0028.jpg', 
				'caption'=>'Third Menu label',
				'imageOptions'=>array(
					'width'=>'100%',
				),
			),
		),
		//'options'=>array(
		//	'interval'=>5000,
		//),
	)); 
*/

$this->widget('ext.xflexslider.XFlexSlider',array(
	'slides'=>array(
		//use content
		'slide1' => array(
			'id'=>'slide1',
			'caption'=>'Landscape Sample',
			'content'=> CHtml::link(CHtml::image(Yii::app()->baseUrl.'/shareimages/photo/peter.jpg'),
						Yii::app()->createUrl('/sGallery/list',array('dir'=>'peter'))),
		),
		'slide2' => array(
			'id'=>'slide2',
			'caption'=>'Buka Puasa 1',
			'content'=> CHtml::link(CHtml::image(Yii::app()->baseUrl.'/shareimages/photo/photogal.jpg'),
						Yii::app()->createUrl('/sGallery/list',array('dir'=>'photogal'))),
		),
		'slide3' => array(
			'id'=>'slide3',
			'caption'=>'Buka Puasa 2',
			'content'=> CHtml::link(CHtml::image(Yii::app()->baseUrl.'/shareimages/photo/photogal2.jpg'),
						Yii::app()->createUrl('/sGallery/list',array('dir'=>'photogal2'))),
		),
		'slide4' => array(
			'id'=>'slide4',
			'caption'=>'Kick Off Kompas',
			'content'=> CHtml::link(CHtml::image(Yii::app()->baseUrl.'/shareimages/photo/office1.jpg'),
						Yii::app()->createUrl('/sGallery/list',array('dir'=>'office1'))),
		),
		//use view
		//'slide2'=>array(
		//	'caption'=>'This image is wrapped in a link!',
		//	'view'=>'_slide2',
		//),
	),
 
	'flexsliderOptions'=>array(
		//'animation' => "'slide'",
		//'slideDirection' => 'vertical',
		'mousewheel' => true,
		'slideshowSpeed' => 3000,
		'animationDuration' => 300,
	),
));		
	
?>

