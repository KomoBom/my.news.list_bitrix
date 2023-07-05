<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
    Bitrix\Iblock;

if(!Loader::includeModule("iblock"))
{
    ShowError("Модуль Информационных блоков не установлен");
    return;
}

if($arParams["IBLOCK_TYPE"] == '-')
    $arParams["IBLOCK_TYPE"] = "news";

if ($arParams["IBLOCK_ID"]) {
    $arResult["ITEMS"] = $this->getElementsIbId($arParams["IBLOCK_ID"]);
} else {
    $arResult["ITEMS"] = $this->getElementsIbType($arParams["IBLOCK_TYPE"]);
}
$this->includeComponentTemplate();
?>