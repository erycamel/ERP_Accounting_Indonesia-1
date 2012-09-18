<div class="page-header">
	<h1>
		<?php echo Yii::app()->name; ?>
	</h1>
</div>

<div class="row-fluid" style="min-height:435px">
	<div class="span5">
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
				'slide3' => array(
					'id'=>'slide4',
					'caption'=>'Kick Off Kompas',
					'content'=> CHtml::link(CHtml::image(Yii::app()->baseUrl.'/shareimages/photo/photogal3.jpg'),
								Yii::app()->createUrl('/sGallery/list',array('dir'=>'photogal3'))),
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
		

	</div>

	<div class="span7">
		<h2>Company News</h2>
		<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_viewCompanyNews',
			'template'=>"{items}",
		));

		?>		
	</div>

</div>


	<p>
		<?php
			//$this->widget('ext.LanguagePicker.ELanguagePicker', array(
			//	'title'=>null
			//));
		?>
	</p>

	<div class="alert alert-info">
		<h4 class="alert-heading">Welcome!!</h4>
		<?php echo Yii::t('flogin',"Welcome to ").Yii::app()->name.Yii::t('flogin'," - HR and ACCOUNTING Application.</b>. This is a brand new ERP Accounting that exclusively designed for this company.... Relax, and enjoying the application") ?>
	</div>

	<br/>
	

<div class="row-fluid">
	<div class="span5">
		<?php $this->renderPartial("_tabLogin", array("model"=>$model)) ?>
	</div>
	<div class="span7">
		<?php $this->widget('bootstrap.widgets.BootTabbable', array(
				'type'=>'tabs', // 'tabs' or 'pills'
				'tabs'=>array(
						array('label'=>'Public Documents', 'content'=>$this->renderPartial("_tabPublic",array(),true),'active'=>true),
						array('label'=>'Features', 'content'=>$this->renderPartial("_tabFeatures",array("model"=>$model),true)),
				),
				'htmlOptions'=>array(
					'style'=>'min-height:300px',
				),
		));
		?>

	</div>
</div>

<hr/>
	
<div class="row-fluid">
	<div class="span12">

		<?php 
			//$_slide="slide".Yii::app()->dateFormatter->format("d",time()).".jpg";
			//echo CHtml::image(Yii::app()->request->baseUrl.'/images/photo/'.$_slide,'image',array('style'=>'width: 100%')); 
			if (isset($xml->photos->photo)) {
				echo "<h4>";
				echo "Powered by: <a href=\"http://www.flikr.com\" target=\"_blank\">Flickr</a>";
				echo "</h4>";
				echo "</br>";
				foreach ($xml->photos->photo as $photo) {
					$title = $photo['title'];
					$farmid = $photo['farm'];
					$serverid = $photo['server'];
					$id = $photo['id'];
					$secret = $photo['secret'];
					$owner = $photo['owner'];
					$thumb_url = "http://farm{$farmid}.static.flickr.com/{$serverid}/{$id}_{$secret}_t.jpg";
					//$image = "http://farm{$farmid}.static.flickr.com/{$serverid}/{$id}_{$secret}.jpg";
					$page_url = "http://www.flickr.com/photos/{$owner}/{$id}";
					$image_html= "<a href='{$page_url}' target='_blank'><img alt='{$title}' src='{$thumb_url}' height='160px' width='100%' /></a>";
					print "<div class='span1'>$image_html</div>";
				}
			}
		?>
</div>
</div>
