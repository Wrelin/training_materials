<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <? $APPLICATION->ShowHead() ?>
<!--    <link href="/css/style.css" rel="stylesheet">-->
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>

<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

<div id="header"><img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.jpg" id="header_logo" height="105" alt="" width="508"
                      border="0"/>
    <div id="header_text"><? $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/company_name.php"),
            [],
            ["MODE" => "html"]
        ); ?> </div>

    <a href="/" title="Главная" id="company_logo"></a>

    <div id="header_menu"><? $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/header_icons.php"),
            [],
            ["MODE" => "php"]
        ); ?> </div>

</div>
<? $APPLICATION->IncludeComponent(
    "bitrix:menu",
    "horizontal_multilevel",
    [
        "ROOT_MENU_TYPE" => "top",
        "MAX_LEVEL" => "3",
        "CHILD_MENU_TYPE" => "left",
        "USE_EXT" => "Y",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => [],
    ]
); ?>
<div id="zebra"></div>
