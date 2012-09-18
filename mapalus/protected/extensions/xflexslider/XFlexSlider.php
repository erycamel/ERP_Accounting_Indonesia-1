<?php
/**
 * XFlexSlider class file.
 *
 * @author rootbear
 * @link http://www.yiiframework.com/
 *
 * Ver. 2.0 Aug. 07, 2012
 *     - Upgrade FlexSlider to 2.0
 *     - fix code as per suggestion by Clem & Extj
 *
 * Ver. 2.1 Aug. 21, 2012
 *     - support `Thumbnail ControlNav Pattern` - thanks to @got 2 doodle
 *     - support `Carousel Slider as Navigation`
 *
 * Ver. 2.1.1 Sep. 4, 2012
 *     - fix `$js_thumb` not defined;
 */

class XFlexSlider extends CWidget
{
	/**
	 * Default CSS class for the tab container
	 */
	const CSS_CLASS='flexslider';
	const DEFAULT_SLIDER_ID='slider';
	const DEFAULT_THUMB_SLIDER_ID='carousel';

	/**
	 * @var array the data that will be passed to the partial view rendered by each tab.
	 */
	public $viewData;

	/**
	 * @var array additional HTML options to be rendered in the container tag.
	 */
	public $htmlOptions;

	/**
	 * @var array additional HTML options to be rendered for the block inside <li> tag.
	 */
	public $innerHtmlOptions;

	public $slides=array();

	/**
	 * @var array flexsliderOptions for customizing FlexSlider's behavior.
	 */
	public $flexsliderOptions=array();

	/**
	 * @var array thumbsliderOptions for customizing Thumbslider Nav behavior.
	 */
	public $thumbsliderOptions=array();

	private $_baseAssetsUrl;

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if(empty($this->slides))
			return;

		$this->htmlOptions['id']=$this->getId();
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']=self::CSS_CLASS;

		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=self::DEFAULT_SLIDER_ID;

		//prepare thumbsliderOptions before registerClientScript
		if ($this->thumbsliderOptions){
			if (!isset($this->thumbsliderOptions['id'])){
				//$thumbslider_id = $this->thumbsliderOptions['id'];
				//unset($this->thumbsliderOptions['id']);
				//} else {
				$this->thumbsliderOptions['id'] = self::DEFAULT_THUMB_SLIDER_ID;
			}
			$thumbslider_id = $this->thumbsliderOptions['id'];
				
			if (isset($this->thumbsliderOptions['htmlOptions'])){
				$thumbslider_htmlOptions = $this->thumbsliderOptions['htmlOptions'];
				unset($this->thumbsliderOptions['htmlOptions']);
			}
				
			if (isset($this->thumbsliderOptions['innerHtmlOptions'])){
				$thumbslider_innerHtmlOptions = $this->thumbsliderOptions['innerHtmlOptions'];
				unset($this->thumbsliderOptions['innerHtmlOptions']);
			}
				
			$thumbslider_htmlOptions['id'] = $thumbslider_id;
			$thumbslider_htmlOptions['class'] = 'flexslider';
		}

		$this->registerClientScript();

		echo CHtml::openTag('div',$this->htmlOptions)."\n";
		$this->renderSlides();
		echo CHtml::closeTag('div');

		//v2.1 support `Carousel Slider as Navigation'
		if ($this->thumbsliderOptions){
			echo CHtml::openTag('div', $thumbslider_htmlOptions)."\n";
			$this->renderThumbSlides();
			echo CHtml::closeTag('div');
		}
	}

	/**
	 * Registers the needed CSS and JavaScript.
	 */
	public function registerClientScript()
	{
		$assets_path = dirname(__FILE__) . '/FlexSlider';
		$this->_baseAssetsUrl = Yii::app()->assetManager->publish( $assets_path );

		$cs=Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');

		//script, css for flexslider
		$this->registerAsset('flexslider.css');
		$this->registerAsset('jquery.flexslider-min.js');
		//$this->registerAsset('jquery.flexslider.js');

		//by Clem: http://www.yiiframework.com/extension/xflexslider#c9337
		//$param = $this->prepareFlexSliderOptions();
		$param = CJavaScript::encode($this->flexsliderOptions);

		if ($this->thumbsliderOptions){

			$thumb_slide_id	= $this->thumbsliderOptions['id'];
			$this->thumbsliderOptions['asNavFor'] = '#' . $this->htmlOptions['id'];

			$param_thumb = CJavaScript::encode($this->thumbsliderOptions);
			$js_thumb =  '$(\'#' . $thumb_slide_id . '\').flexslider(' . $param_thumb  . ');';
		} else {
			//v2.2.1
			$js_thumb =  '';
		}

		//trigger the slider
		$cs->registerScript(
		  'flexslider_trigger',
		  '
				$(window).load(function() {
				//$(\'.flexslider\').flexslider(' . $param  . ');
				$(\'#' . $this->htmlOptions['id'] . '\').flexslider(' . $param  . ');
				' . $js_thumb . '
	});
		  ',
		  CClientScript::POS_END
		);
	}

	/**
	 * Renders slides.
	 */
	protected function renderSlides()
	{
		echo "<ul class=\"slides\">\n";
		foreach($this->slides as $id=>$slide)
		{
			//by @got 2 doodle
			//http://www.yiiframework.com/extension/xflexslider/#c9398
			if(isset($slide['thumb']))
				echo '<li data-thumb="'.$slide['thumb'].'" >'."\n";
			else
				echo "<li>\n";
			//echo '<div id="block" style="width:300px;height:250px;">';

			echo '<div id="flexslide-block-' . $id . '"';
			if (isset($this->innerHtmlOptions)){
				foreach($this->innerHtmlOptions as $key=>$value)
				{
					echo ' ' . $key . '="' . str_replace('"','\"',$value) . '"';
				}
			}
			echo ">\n";

			if(isset($slide['content']))
				echo $slide['content'];
			else if(isset($slide['url']))
			{
				echo '<iframe src="' . $slide['url'] . '"></iframe>';
			}
			else if(isset($slide['imgurl']))
			{
				echo '<img src="' . $slide['imgurl'] . '" />';
			}
			else if(isset($slide['view']))
			{
				if(isset($slide['data']))
				{
					if(is_array($this->viewData))
						$data=array_merge($this->viewData, $slide['data']);
					else
						$data=$slide['data'];
				}
				else
					$data=$this->viewData;
				$this->getController()->renderPartial($slide['view'], $data);
			}
				
			//add caption if there is
			if(isset($slide['caption']))
				echo "<p class=\"flex-caption\">" . $slide['caption'] . "</p>";
				
			echo "\n</div>\n";
			echo "</li>\n";
		}
		echo "</ul>\n";
		//echo '</div>';
	}

	/**
	 * Renders thumbnail slides.
	 */
	protected function renderThumbSlides()
	{
		echo "<ul class=\"slides\">\n";
		foreach($this->slides as $id=>$slide)
		{
			echo "<li>\n";
			echo '<img src="' . $slide['thumb'] . '" />';
			echo "</li>\n";
		}
		echo "</ul>\n";
	}

	/**
	 * Prepare FlexSlider's flexsliderOptions.
	 */
	protected function prepareFlexSliderOptions()
	{
		$param = "";
		foreach($this->flexsliderOptions as $key=>$value)
		{
			//normalize $value, since some of the value FlexSlider/JS requires to be quoted up
			//like 'vertical' or "vertical"
			if (strlen($value) >=2){
				if (substr($value,0,1) === '\'' && substr($value,-1) === '\'')
					$value = substr($value,1,strlen($value)-2);
					
				if (substr($value,0,1) === '"' && substr($value,-1) === '"')
					$value = substr($value,1,strlen($value)-2);
					
				if (!is_numeric($value) && !($value === 'true' || $value === 'false'))
					$value = "'" . $value . "'";
			}

			//by extj: http://www.yiiframework.com/extension/xflexslider#c9333
			if($value === false)
				$param .= $key . ":" . "false" . ",\n";
			else
				$param .= $key . ":" . $value . ",\n";

		}

		//by extj: For IE7 remove last ','
		//http://www.yiiframework.com/extension/xflexslider#c9333
		if ($param)
		{
			// For IE7 remove last ','
			$param = substr($param, 0, strlen($param)-2);
			$param = "{\n" . $param . "}";
		}
			
		return $param;
	}

	/**
	 * generic function to register css or js
	 */
	protected function registerAsset($file)
	{
		$asset_path = $this->_baseAssetsUrl . '/' . $file;
		if(strpos($file, '.js') !== false)
			return Yii::app()->clientScript->registerScriptFile($asset_path);
		else if(strpos($file, '.css') !== false)
			return Yii::app()->clientScript->registerCssFile($asset_path);

		return $asset_path;
	}
}
