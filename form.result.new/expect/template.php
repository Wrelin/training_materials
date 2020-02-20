<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$this->addExternalCss(SITE_TEMPLATE_PATH . '/css/form_result_styles.css');
?>

<div class="contact-form">
    <?php if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y"): ?>
        <div class="contact-form__head">
            <div class="contact-form__head-title"><?= $arResult["FORM_TITLE"] ?></div>
            <div class="contact-form__head-text"><?= $arResult["FORM_DESCRIPTION"] ?></div>
        </div>
    <? endif; ?>

    <form name="<?= $arResult["WEB_FORM_NAME"] ?>" method="POST"
          class="contact-form__form" enctype="multipart/form-data">
        <input type="hidden" name="WEB_FORM_ID" value="<?= $arParams["WEB_FORM_ID"] ?>"/>
        <?= bitrix_sessid_post() ?>
        <div class="contact-form__form-inputs">
            <? $name = 'form_' . $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][0]]["STRUCTURE"][0]['FIELD_TYPE'] . '_' . $arResult["arQuestions"][$arResult['ID_QUESTIONS'][0]]["ID"] ?>
            <div class="input contact-form__input">
                <label class="input__label"
                       for="<?= $name ?>">
                    <div class="input__label-text">
                        <?= $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][0]]["CAPTION"] ?>
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][0]]["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?>
                    </div>
                    <input class="input__input" type="<?= $arResult["arQuestions"][$arResult['ID_QUESTIONS'][0]]["TITLE_TYPE"] ?>"
                           id="<?= $name ?>"
                           name="<?= $name ?>"
                           value="<?= $arResult['arrVALUES'][$name] ?>"
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][0]]["REQUIRED"] == "Y"): ?><?= 'required="required"' ?><? endif; ?>>
                </label>
            </div>
            <? $name = 'form_' . $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][1]]["STRUCTURE"][0]['FIELD_TYPE']. '_' . $arResult["arQuestions"][$arResult['ID_QUESTIONS'][1]]["ID"] ?>
            <div class="input contact-form__input">
                <label class="input__label" for="<?= $name ?>">
                    <div class="input__label-text">
                        <?= $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][1]]["CAPTION"] ?>
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][1]]["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?>
                    </div>
                    <input class="input__input" type="<?= $arResult["arQuestions"][$arResult['ID_QUESTIONS'][1]]["TITLE_TYPE"] ?>"
                           id="<?= $name ?>"
                           name="<?= $name ?>"
                           value="<?= $arResult['arrVALUES'][$name] ?>"
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][1]]["REQUIRED"] == "Y"): ?><?= 'required="required"' ?><? endif; ?>>
                </label>
            </div>
            <? $name = 'form_' . $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][2]]["STRUCTURE"][0]['FIELD_TYPE']. '_' . $arResult["arQuestions"][$arResult['ID_QUESTIONS'][2]]["ID"] ?>
            <div class="input contact-form__input">
                <label class="input__label" for="<?= $name ?>">
                    <div class="input__label-text">
                        <?= $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][2]]["CAPTION"] ?>
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][2]]["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?>
                    </div>
                    <input class="input__input" type="<?= $arResult["arQuestions"][$arResult['ID_QUESTIONS'][2]]["TITLE_TYPE"] ?>"
                           id="<?= $name ?>"
                           name="<?= $name ?>"
                           value="<?= $arResult['arrVALUES'][$name] ?>"
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][2]]["REQUIRED"] == "Y"): ?><?= 'required="required"' ?><? endif; ?>>
                </label>
            </div>
            <? $name = 'form_' . $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][3]]["STRUCTURE"][0]['FIELD_TYPE'] . '_' . $arResult["arQuestions"][$arResult['ID_QUESTIONS'][3]]["ID"] ?>
            <div class="input contact-form__input">
                <label class="input__label" for="<?= $name ?>">
                    <div class="input__label-text">
                        <?= $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][3]]["CAPTION"] ?>
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][3]]["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?>
                    </div>
                    <input class="input__input" type="<?= $arResult["arQuestions"][$arResult['ID_QUESTIONS'][3]]["TITLE_TYPE"] ?>"
                           id="<?= $name ?>"
                           name="<?= $name ?>"
                           value="<?= $arResult['arrVALUES'][$name] ?>"
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][3]]["REQUIRED"] == "Y"): ?><?= 'required="required"' ?><? endif; ?>>
                </label>
            </div>
        </div>
        <div class="contact-form__form-message">
            <? $name = 'form_' . $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][4]]["STRUCTURE"][0]['FIELD_TYPE'] . '_' . $arResult["arQuestions"][$arResult['ID_QUESTIONS'][4]]["ID"] ?>
            <div class="input"><label class="input__label" for="<?= $name ?>">
                    <div class="input__label-text"><?= $arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][4]]["CAPTION"] ?>
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][4]]["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
                    <textarea class="input__input" type="<?= $arResult["arQuestions"][$arResult['ID_QUESTIONS'][4]]["TITLE_TYPE"] ?>"
                           id="<?= $name ?>"
                           name="<?= $name ?>"
                        <? if ($arResult["QUESTIONS"][$arResult['ID_QUESTIONS'][4]]["REQUIRED"] == "Y"): ?><?= 'required="required"' ?><? endif; ?>>
                        <?= $arResult['arrVALUES'][$name] ?>
                    </textarea>
                </label>
            </div>
        </div>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку
                персональных
                данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button"
                    name="web_form_submit"
                    value="<?= $arResult["arForm"]["BUTTON"] ?>"
                    data-success="Отправлено"
                    data-error="Ошибка отправки">
                <div class="form-button__title"><?= $arResult["arForm"]["BUTTON"] ?></div>
            </button>
        </div>
    </form>
</div>

