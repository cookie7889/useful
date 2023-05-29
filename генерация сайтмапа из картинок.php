<?
CModule::IncludeModule('iblock');

$file = [];

//пробегаемся по всем активным инфоблокам сайта
$iblock = CIBlock::GetList(
	array(),
	array('ACTIVE' => 'Y'),
	false
);

while ($iblock_arr = $iblock->Fetch()) {

	//выводимв все актинвные элементы из каждого элемента 
	$el = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => $iblock_arr['ID'], 'ACTIVE' => 'Y'),
		false,
		false,
		array('PREVIEW_PICTURE', 'DETAIL_PICTURE', 'NAME', 'ID')
	);

	while ($el_arr = $el->Fetch()) {

		//записываем детальную катинку если есть 
		if (!empty($el_arr['DETAIL_PICTURE'])) {
			$loc = CFile::GetPath($el_arr['DETAIL_PICTURE']);

			$date_str = CFile::GetList(array(), array($el_arr['DETAIL_PICTURE']))->Fetch()['TIMESTAMP_X'];
			$date = DateTime::createFromFormat('d.m.Y H:i:s', $date_str);
			$lastmod = $date->format('Y-m-d H:i:s');

			$file[] = array(
				'loc' => $loc,
				'lastmod' => $lastmod,
			);
		}

		//записываем катинку для анонса если есть 
		if (!empty($el_arr['PREVIEW_PICTURE'])) {
			$loc = CFile::GetPath($el_arr['PREVIEW_PICTURE']);

			$date_str = CFile::GetList(array(), array($el_arr['PREVIEW_PICTURE']))->Fetch()['TIMESTAMP_X'];
			$date = DateTime::createFromFormat('d.m.Y H:i:s', $date_str);
			$lastmod = $date->format('Y-m-d H:i:s');

			$file[] = array(
				'loc' => $loc,
				'lastmod' => $lastmod,
			);
		}

		//ищем все сво-ва текущего инфоблока типа файл 
		$prop = CIBlockProperty::GetList(
			array(),
			array('PROPERTY_TYPE' => 'F', 'IBLOCK_ID' => $iblock_arr['ID'])
		);

		//пробегаемся по всем св-вам типа файл с изображениями 
		while ($prop_arr = $prop->Fetch()) {
			if ($prop_arr['FILE_TYPE'] == 'jpg, gif, bmp, png, jpeg') {

				//ищем св-ва с картинками в текущем элементе 
				$prop_img = CIBlockElement::GetList(
					array(),
					array('IBLOCK_ID' => $iblock_arr['ID'], 'ACTIVE' => 'Y', 'ID' => $el_arr['ID'], '!PROPERTY_' . $prop_arr['CODE'] => false),
					false,
					false,
					array('PROPERTY_' . $prop_arr['CODE'])
				);

				//записываем картинки из св-ва
				while ($prop_img_arr = $prop_img->Fetch()) {
					$loc = CFile::GetPath($prop_img_arr['PROPERTY_TABLET_IMAGE_VALUE']);

					$date_str = CFile::GetList(array(), array($prop_img_arr['PROPERTY_TABLET_IMAGE_VALUE']))->Fetch()['TIMESTAMP_X'];
					$date = DateTime::createFromFormat('d.m.Y H:i:s', $date_str);
					$lastmod = $date->format('Y-m-d H:i:s');

					$file[] = array(
						'loc' => $loc,
						'lastmod' => $lastmod,
					);
				}
			}
		}
	}
}

// Создаем XML объект
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

// Перебираем элементы массива и добавляем их в XML
foreach ($file as $file_item) {
	$xmlItem = $xml->addChild('url');
	$xmlItem->addChild('loc', $file_item['loc']);
	$xmlItem->addChild('lastmod', $file_item['lastmod']);
}

// Сохраняем XML в файл
$xml->asXML($_SERVER['DOCUMENT_ROOT'] . '/sitemap-upload.xml');

echo 'Файл успешно создан!';
