<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class CNsNews extends CBitrixComponent
{
	public function getElementsIbType($ib_type) {
		$resBlocks = CIBlock::GetList(Array(), Array("TYPE" => $ib_type), false, false, Array("ID", "CODE"));
		while ($arBlFields = $resBlocks->GetNext()) {
			$blockId = $arBlFields["ID"];
			$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PICTURE");
			$arFilter = Array("IBLOCK_ID" => $blockId);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			while($arElFields = $res->GetNext())
			{
				if (empty($arRes)) {
					$arRes = ["$blockId" => [$arElFields]];
				} elseif ($blockId == $arElFields["IBLOCK_ID"]) {
					$arRes[$blockId][] = $arElFields;
				}
			}
		}
		return $arRes;
	}

	public function getElementsIbId($ib_id) {
		$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PICTURE");
		$arFilter = Array("IBLOCK_ID" => $ib_id);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($arElFields = $res->GetNext())
		{
			if (empty($arRes)) {
				$arRes = ["$ib_id" => [$arElFields]];
			} elseif ($ib_id == $arElFields["IBLOCK_ID"]) {
				$arRes[$ib_id][] = $arElFields;
			}
		}
		return $arRes;
	}
}