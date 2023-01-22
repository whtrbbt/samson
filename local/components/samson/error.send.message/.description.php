<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); $arComponentDescription = array(
"NAME" => "Сообщение об ошибке",
"DESCRIPTION" => "Позволяет выделить на сайте ошибку в тексте, нажать Ctrl+Enter и отправить её админам на почту",
"PATH" => array(
    "ID" => "samson_components",
    "CHILD" => array(
    "ID" => "errsend",
    "NAME" => "Сообщение об ошибке"
    )
    ),
    /*"ICON" => "/images/icon.gif",*/
);
?>