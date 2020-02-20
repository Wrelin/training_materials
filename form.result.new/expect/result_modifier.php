<?php
$idQuestion = [];
$i = 0;
foreach ($arResult["QUESTIONS"] as $key => $arQuestion) {
    $idQuestion[$i++] = $key;// в этот массив получаем символьные идентификаторы вопросов
}
if ($arResult["isFormErrors"] == "Y")
    echo $arResult["FORM_ERRORS_TEXT"];
$idQuestion = [];
$i = 0;
foreach ($arResult["QUESTIONS"] as $key => $arQuestion) {
     $arResult['ID_QUESTIONS'][$i++] = $key;// в этот массив получаем символьные идентификаторы вопросов
}
