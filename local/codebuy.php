<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?>

<?
	$APPLICATION->IncludeComponent(
		"samson:catalog.buy.code", ".default",
			array(
				"COMPONENT_TEMPLATE" => ".default",
			),
		false
	);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>