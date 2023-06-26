<? class customSchema
{
    private $name;
    private $description;
    private $img_src;
    private $img_width;
    private $img_height;

    public function __construct($object = [
        'name', 'description', 'img_src', '$img_width', '$img_heigh'
    ])
    {
        $this->name = $object['name'];
        $this->description = $object['description'];
        $this->img_src = $object['img_src'];
        $this->img_width = $object['img_width'];
        $this->img_height = $object['img_height'];
    }

    public function ImageObject()
    {
        echo '<div style="display: none;" itemscope itemtype="http://schema.org/ImageObject">';
        echo '<meta itemprop="name" content="' . $this->name . '">';
        echo '<link src="' . $this->img_src . '" itemprop="contentUrl" />';

        if (!empty($this->description))
            echo '<meta itemprop="description" content="' . $this->description . '">';
        if (!empty($this->img_width))
            echo '<meta itemprop="width" content="' . $this->img_width . '">';
        if (!empty($this->img_height))
            echo '<meta itemprop="height" content="' . $this->img_height . '">';

        echo '</div>';
    }
}


//пример вывода 
$customSchema = new customSchema(
    array(
        'name' => $arResult['NAME'],
        'description' => $arResult['PREVIEW_TEXT'],
        'img_src' => $img['SRC'],
        'img_width' => $img['WIDTH'],
        'img_heigh' => $img['HEIGHT'],
    )
);
$customSchema->ImageObject();
