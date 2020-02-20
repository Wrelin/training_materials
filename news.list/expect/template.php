<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->addExternalCss(SITE_TEMPLATE_PATH .'/css/news_list_styles.css');
?>
<div id="barba-wrapper">
    <div class="article-list">
        <? foreach ($arResult['ITEMS'] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]); ?>
            <span class="article-item article-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-anim="anim-3">
                <? if ($arItem['PREVIEW_PICTURE']['SRC']): ?>
                    <div class="article-item__background">
                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                             alt="<?= $arItem['NAME'] ?>"/>
                    </div>
                <? endif; ?>
                <div class="article-item__wrapper">
                    <div class="article-item__title"><?= $arItem['NAME'] ?></div>
                    <div class="article-item__content"><?= $arItem['PREVIEW_TEXT'] ?></div>
                </div>
            </span>
        <? endforeach; ?>
    </div>
</div>
