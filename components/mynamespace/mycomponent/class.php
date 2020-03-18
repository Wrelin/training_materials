<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

class MyClassComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams['IBLOCK_ID'] = trim($arParams['IBLOCK_ID']);
        $arParams['IBLOCK_TYPE'] = trim($arParams['IBLOCK_TYPE']);
        if (!$arParams['IBLOCK_TYPE'] && !$arParams['IBLOCK_ID']) {
            ShowError('Отсутствуют обязательные параметры IBLOCK_ID или IBLOCK_TYPE');
            return false;
        }

        if (!$arParams['IBLOCK_ID']
            && Loader::includeModule('iblock')) {
            $rsIblockType = CIBlockType::GetList();
            while ($arIBlockType = $rsIblockType->Fetch())
                $arIBlockTypes[$arIBlockType['ID']] = $rsIblockType;

            if (!array_key_exists($arParams['IBLOCK_TYPE'], $arIBlockTypes ?? [])) {
                ShowError('Некорректный тип инфоблока');
                return false;
            }
        }
        if (!is_array($this->arParams['FIELD_CODE']))
            $this->arParams['FIELD_CODE'] = [];
        $arParams['FIELD_CODE'] = array_filter($arParams['FIELD_CODE']);

        return $arParams;
    }

    public function executeComponent()
    {
        if (!$this->arParams) return;

        $arFilter['NAME'] = '%' . $this->arParams['NAME_FILTER'] . '%';
        $arFilter['IBLOCK_ID'] = $this->arParams['IBLOCK_ID'];
        if ($this->arParams['CHECK_DATES'] == 'Y')
            $arFilter['ACTIVE'] = 'Y';

        $arSelect = array_merge($this->arParams['FIELD_CODE'], [
            'ID',
            'IBLOCK_ID',
            'IBLOCK_SECTION_ID',
            'NAME',
            'ACTIVE_FROM',
            'TIMESTAMP_X',
            'DETAIL_PAGE_URL',
            'LIST_PAGE_URL',
            'DETAIL_TEXT',
            'DETAIL_TEXT_TYPE',
            'PREVIEW_TEXT',
            'PREVIEW_TEXT_TYPE',
            'PREVIEW_PICTURE',
        ]);

        $this->arResult['ITEMS'] = $this->getItems($arFilter, $arSelect);
        $this->includeComponentTemplate();
    }

    protected function getItems($arFilter, $arSelect)
    {
        if (Loader::includeModule('iblock')) {
            if ($arFilter['IBLOCK_ID']) {
                $arItems[$arFilter['IBLOCK_ID']] = $this->getElements($arFilter, $arSelect);
            } else {
                $rsIblockList = CIBlock::GetList([], ['TYPE' => $this->arParams['IBLOCK_TYPE']]);
                while ($arIBlock = $rsIblockList->Fetch()) {
                    $arFilter['IBLOCK_ID'] = $arIBlock['ID'];
                    $arItems[$arIBlock['ID']] = $this->getElements($arFilter, $arSelect);
                }
            }
        }
        return $arItems ?? [];
    }

    protected function getElements($arFilter, $arSelect)
    {
        $rsElemList = CIBlockElement::GetList(['iblock_id' => 'ASC'], $arFilter, false, false, $arSelect);
        while ($obElement = $rsElemList->GetNextElement()) {
            $arItem = $obElement->GetFields();
            $arItem['FIELDS'] = $this->getFields($arItem);
            $arItems[] = $arItem;
        }
        return $arItems ?? [];
    }

    protected function getFields($arItem)
    {
        foreach ($this->arParams['FIELD_CODE'] as $code)
            if (array_key_exists($code, $arItem))
                $arFields[$code] = $arItem[$code];
            return $arFields ?? [];
    }
}
