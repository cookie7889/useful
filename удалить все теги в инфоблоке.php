<?
$iblockId = 'IBLOCK_ID'     //айди инфоблока;

$arElements = array();
$arOrder = array('SORT' => 'ASC');
$arSelect = array("ID", "NAME");
$arFilter = array("IBLOCK_ID" => $iblockId);
$res = CIBlockSection::GetList($arOrder, $arFilter, false, false, $arSelect);
while ($ob = $res->GetNext()) {
    $arElements[] = $ob;
}

$arSections = array();
$arFilter = array('IBLOCK_ID' => $iblockId, 'GLOBAL_ACTIVE' => 'Y');
$db_list = CIBlockSection::GetList(array($by => $order), $arFilter, true);
while ($ar_result = $db_list->GetNext()) {
    $arSections[] = $ar_result;
}

foreach ($arElements as $i => $item) {

    $iblockElementId = $item["ID"];

    $ipropElementTemplates = new \Bitrix\Iblock\InheritedProperty\ElementTemplates($iblockId, $iblockElementId);

    //$ipropElementTemplates->delete();
}

foreach ($arSections as $i => $item) {

    $iblockSectionId = $item["ID"];

    $ipropSectionTemplates = new \Bitrix\Iblock\InheritedProperty\SectionTemplates($iblockId, $iblockSectionId);

    //$ipropSectionTemplates->delete();
}
