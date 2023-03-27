<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<? CModule::IncludeModule("iblock"); ?>

<?

 
$descr = '<h2>%*H1*% в магазине «Чипак» в Туле</h2>
<p>Вы можете купить такой товар как %*H1*%, посетив один из наших строительных гипермаркетов или оформив доставку на
    сайте. Все позиции в каталоге имеют проверенные качество, гарантию от производителя и приятную цену. Удобная
    навигация позволит быстро подобрать оптимальный вариант! Перед заказом рекомендуем ознакомиться с описаниями изделий
    и характеристиками или воспользоваться советом специалиста нашего интернет-магазина.
<p>
<h2>%*H1*%  со скидкой</h2>
<p>Обладатели дисконтной карты гипермаркета «Чипак» или карты «Новосел» могут получить строительные материалы с еще большей выгодой. Присоединяйтесь к нашей системе лояльности, и вы сможете оформить заказ любых товаров из раздела %*H1*% с выгодой до 10%!<p>';




$IBLOCK_ID = 7;
$SECTION_ID = [8529, 8640, 8325];
$arFilter = array('IBLOCK_ID' => $IBLOCK_ID, 'SECTION_ID' => $SECTION_ID);
$Select = array('ID', 'CODE', 'NAME', 'DESCRIPTION', 'UF_META_H1');

$res = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    $arFilter,
    false,
    $Select,
    false
);

while ($ar_res = $res->GetNext()) {
    echo '<pre>';
    echo $ar_res['NAME'];
    echo $ar_res['UF_META_H1'];


    if (!empty($ar_res['UF_META_H1'])) {
        $name = $ar_res['UF_META_H1'];
    } else {
        $name = $ar_res['NAME'];
    }

    $descr_up = str_replace('%*H1*%', $name, $descr);
    $bs = new CIBlockSection;

    $res_up = $bs->Update(
        $ar_res['ID'],
        array(
            'DESCRIPTION' => $descr_up,
            '~DESCRIPTION' => $descr_up,
            "DESCRIPTION_TYPE" => 'html'
        )
    );
    echo $res_up;


    echo '</pre>';





    $arFilter = array('IBLOCK_ID' => $IBLOCK_ID, 'SECTION_ID' => $ar_res['ID']);
    $res_inner = CIBlockSection::GetList(
        array("SORT" => "ASC"),
        $arFilter,
        false,
        $Select,
        false
    );

    while ($ar_res_inner = $res_inner->GetNext()) {
        echo '<pre>';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $ar_res_inner['NAME'];
        echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $ar_res_inner['UF_META_H1'];



        if (!empty($ar_res_inner['UF_META_H1'])) {
            $name = $ar_res_inner['UF_META_H1'];
        } else {
            $name = $ar_res_inner['NAME'];
        }


        $descr_up = str_replace('%*H1*%', $name, $descr);
        $bs = new CIBlockSection;

        $res_up = $bs->Update(
            $ar_res_inner['ID'],
            array(
                'DESCRIPTION' => $descr_up,
                '~DESCRIPTION' => $descr_up,
                "DESCRIPTION_TYPE" => 'html'
            )
        );
        echo $res_up;
        echo '</pre>';


        $arFilter = array('IBLOCK_ID' => $IBLOCK_ID, 'SECTION_ID' => $ar_res_inner['ID']);
        $res_inner_2 = CIBlockSection::GetList(
            array("SORT" => "ASC"),
            $arFilter,
            false,
            $Select,
            false
        );

        while ($ar_res_inner_2 = $res_inner_2->GetNext()) {
            echo '<pre>';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $ar_res_inner_2['NAME'];
            echo '&nbsp;&nbsp;&nbsp;&nbsp;' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $ar_res_inner_2['UF_META_H1'];


            if (!empty($ar_res_inner_2['UF_META_H1'])) {
                $name = $ar_res_inner_2['UF_META_H1'];
            } else {
                $name = $ar_res_inner_2['NAME'];
            }


            $descr_up = str_replace('%*H1*%', $name, $descr);
            $bs = new CIBlockSection;

            $res_up = $bs->Update(
                $ar_res_inner_2['ID'],
                array(
                    'DESCRIPTION' => $descr_up,
                    '~DESCRIPTION' => $descr_up,
                    "DESCRIPTION_TYPE" => 'html'
                )
            );
            echo $res_up;
            echo '</pre>';
        }
    }
}





?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
