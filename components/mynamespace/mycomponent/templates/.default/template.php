<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>

<div class="news-list">
    <? foreach ($arResult["ITEMS"] as  $arItems): ?>
        <? foreach ($arItems as $id => $arItem): ?>
            <p class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <b><?= $arItem["NAME"] ?></b><br/>
                <?= $arItem["PREVIEW_TEXT"]; ?>
                <? foreach ($arItem["FIELDS"] as $code => $field): ?>
                    <small>
                        <?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $field; ?>
                    </small><br/>
                <? endforeach; ?>
            </p>
        <? endforeach; ?>
    <? endforeach; ?>
</div>
