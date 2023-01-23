<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arParams['DISPLAY_COMPARE'])
{
	$iblockid = $arResult['IBLOCK_ID'];
							
							
	$id=$arResult['ID'];
	if(isset($_SESSION["CATALOG_COMPARE_LIST"][$iblockid]["ITEMS"][$id]))
	{
		$display='';
	}
	else
	{
		$display='d-none';
	}
?>
						
	<div class=compare-info>
		<div class="alert alert-primary <?=$display?>" id="compare-item-info-ID_<?=$id?>" role="alert">
			Уже в сравнении.
		</div>
	</div>
														
<?
}
?>