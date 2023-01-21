<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "MAIL_SENDER"   =>  array(
            "PARENT"    =>  "LIST",
            "NAME"      =>  "Способ отправки сообщения",
            "TYPE"      =>  "LIST",
            "VALUES"    =>  array(
                "php" =>  "php mail()",
                "bitrix" =>  "Bitrix",
            ),
            "MULTIPLE"  =>  "N",
        ),
        "EMAIL_FOR_ERRORS" => array(
            "PARENT" => "BASE",
            "NAME" => "Адрес на который отправить ошибку (для php mail())",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Нажмите на кнопку Отправить чтобы отправить выделенный текст.",
        ),
    ),
    );