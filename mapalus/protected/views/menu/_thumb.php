<li class="span1">
    <a href="<?php echo $data['url'] ?>" class="thumbnail" rel="tooltip" data-title="Tooltip">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/icons/big_icons/<?php echo $data['icon']; ?>" alt="">
    </a>
	<div style="text-align: center">
		<?php echo $data['label']; ?>
	</div>
<?php	
//echo CHtml::link(CHtml::image(http://placehold.it/50x50, "No Photo", array("class"=>"span1")),
//						Yii::app()->createUrl("/m1/gRecruitment/view",array("id"=>$data->id)))	

?>	
</li>