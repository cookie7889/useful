<?# /bitrix/templates/aspro_max/components/bitrix/catalog/main/page_blocks  745 ?>
<? ob_start(); ?>
<? if ($arResult['FOLDER'] . $arResult['VARIABLES']['SECTION_CODE_PATH'] . '/' == $APPLICATION->GetCurPage()) : ?>
	#<? if ($posSectionDescr == "BOTH") : ?>
	#	<? if ($arSection[$section_pos_bottom]) : ?>
	#		<div class="group_description_block bottom muted777">
	#			<div><?= $arSection[$section_pos_bottom] ?></div>
	#		</div>
	#	<? endif; ?>
	#<? elseif ($posSectionDescr == "BOTTOM") : ?>
	#	<? if ($arSection[$arParams["SECTION_PREVIEW_PROPERTY"]]) : ?>
	#		<div class="group_description_block bottom muted777">
	#			<div><?= $arSection[$arParams["SECTION_PREVIEW_PROPERTY"]] ?></div>
	#		</div>
	#	<? elseif ($arSection["DESCRIPTION"]) : ?>
	#		<div class="group_description_block bottom muted777">
	#			<div><?= $arSection["DESCRIPTION"] ?></div>
	#		</div>
	#	<? elseif ($arSection["UF_SECTION_DESCR"]) : ?>
	#		<div class="group_description_block bottom muted777">
	#			<div><?= $arSection["UF_SECTION_DESCR"] ?></div>
	#		</div>
	#	<? endif; ?>
	#<? endif; ?>
<? endif; ?>

<?
$html = ob_get_clean();
#771
