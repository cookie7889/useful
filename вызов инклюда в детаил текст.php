<?//подгрузка динамических блоков в детальном описании инфоблока, например статей 

//компонент_эпилог шаблона компонента НАЧАЛО

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @var CMain $APPLICATION
 * @var array $arResult
 */

$replacer = function ($matches) {
  ob_start();
  $file_name = $matches[1];
  include_once($_SERVER["DOCUMENT_ROOT"] . "/include/".$file_name.".php");

  return ob_get_clean();
};

// находим метку и заменяем ее на результат работы нашей функции
echo preg_replace_callback(
  "|{#}(.*){#}|Uis",
  $replacer,
  $arResult["CACHED_TPL"]
);

//компонент_эпилог шаблона компонента КОНЕЦ

//{#}OUR_TEAM{#} - пример вставки в детальном описании, функция будет искать файл в папке /include/ с названием OUR_TEAM.php


//темплейт.пхп шаблона компонента НАЧАЛО

ob_start();
?>
<div class="content-blog__wrapp">
	<section class="blog-item-section">
		<div class="container">
			<div class="row">
				<div class="title-blog-item-n col-md-12">
					<h1><?= $arResult['NAME']; ?></h1>
				</div>

				<div class="col-md-8">
					<div class="text-blog-item-n"><?= $arResult['DETAIL_TEXT']; ?></div>
				</div>
			</div>
		</div>
	</section>
</div>

<?
$this->__component->SetResultCacheKeys(array("CACHED_TPL"));
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();

//темплейт.пхп шаблона компонента КОНЕЦ
?>
