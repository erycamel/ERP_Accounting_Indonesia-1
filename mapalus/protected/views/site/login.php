<div class="page-header">
	<h1>
		<?php echo Yii::app()->name; ?>
	</h1>
</div>

<div class="row-fluid" style="min-height:435px">
	<div class="span5">
		<?php $this->renderPartial("_photoSlider", array()) ?>
	</div>
	<div class="span7">
		<?php $this->renderPartial("_companyNews", array('dataProvider'=>$dataProvider)) ?>
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
		<?php $this->widget('bootstrap.widgets.BootTabs', array(
				'type'=>'tabs', // 'tabs' or 'pills'
				'tabs'=>array(
						array('label'=>'Public Documents', 'content'=>$this->renderPartial("_tabPublic",array(),true),'active'=>true),
						array('label'=>'Features', 'id'=>'features', 'content'=>$this->renderPartial("_tabFeatures",array("model"=>$model),true)),
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

<?php //Yii::app()->cache->flush() ?>