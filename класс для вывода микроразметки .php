<? class customSchema
{
	private $name;
	private $description;
	private $img_src;
	private $img_width;
	private $img_height;

	public function __construct($name, $description, $img_src, $img_width, $img_height)
	{
		$this->name = $name;
		$this->description = $description;
		$this->img_src = $img_src;
		$this->img_width = $img_width;
		$this->img_height = $img_height;

	}

	public function ImageObject()
	{
		echo '
			<div style="display: none;" itemscope itemtype="http://schema.org/ImageObject">
				<meta itemprop="name" content="' . $this->name . '">
				<link src="' . $this->img_src . '" itemprop="contentUrl" />
				<meta itemprop="description" content="' . $this->description . '">
				<meta itemprop="width" content="' . $this->img_width . '">
				<meta itemprop="height" content="' . $this->img_height . '">
			</div>
		';
	}
}


//пример вывода 
$customSchema = new customSchema($arResult['NAME'], $arResult['IPROPERTY_VALUES']['ELEMENT_META_TITLE'], $arResult['DETAIL_PICTURE']['SRC'], $arResult['DETAIL_PICTURE']['WIDTH'], $arResult['DETAIL_PICTURE']['HEIGHT'], );

$customSchema->ImageObject();