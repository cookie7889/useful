<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("robots", "noindex");
?>
<? if ($USER->IsAdmin()) { ?>
	<? $ibloc_id = 18;
	$elem_rs = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => $ibloc_id, 'ACTIVE' => 'Y'),
		false,
		false,
		array('DETAIL_PICTURE', 'PREVIEW_PICTURE', 'CODE')
	);

	while ($elem_arr = $elem_rs->Fetch()) {
		$file[] = array(
			'CODE' => $elem_arr['CODE'],
			'DETAIL_PICTURE' =>  str_replace('/iblock/', '/iblock-old/', CFile::GetPath($elem_arr['DETAIL_PICTURE'])),
			'PREVIEW_PICTURE' =>  str_replace('/iblock/', '/iblock-old/', CFile::GetPath($elem_arr['PREVIEW_PICTURE']))
		);
	}
	echo "<pre>";
	//print_r($file);
	echo "</pre>";

	

	// Создаем XML объект
	$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

	// Перебираем элементы массива и добавляем их в XML
	foreach ($file as $file_item) {
		$xmlItem = $xml->addChild('item');
		$xmlItem->addChild('code', $file_item['CODE']);
		$xmlItem->addChild('detail', $file_item['DETAIL_PICTURE']);
		$xmlItem->addChild('preview', $file_item['PREVIEW_PICTURE']);
	}

	// Сохраняем XML в файл
	$xml->asXML($_SERVER['DOCUMENT_ROOT'] . '/img_path.xml');

	echo 'Файл успешно создан!';
	?>

<? } ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>