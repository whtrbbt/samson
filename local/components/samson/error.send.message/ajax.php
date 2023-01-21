<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    use Bitrix\Main\Mail\Event;

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST["action"] == "SEND_ERROR" && !empty($_REQUEST["error_message"]) && !empty($_REQUEST["error_url"]))

{
    if ($_REQUEST["email_sender"] == "php" && !empty($_REQUEST["admin_email"]))
    
    {
        // Если отправляем через php
        $to = $_REQUEST['admin_email'];
        $subject = 'Error message from: '.$_REQUEST["error_url"];
        $message = '
        <html>
        <head>
        <title>Уведомление об ошибке</title>
        </head>
        <body>
        <h2>Уведомление об ошибке</h2>
        <div><h3>Текст ошибки<h3></div>
        <br>
        <div>'.trim ($_REQUEST["error_message"]).'</div>
        <div><h3>Адрес страницы с ошибкой<h3></div>
        <br>
        <div>'.$_REQUEST["error_url"].'</div>
        <div><h3>Адрес перехода<h3></div>
        <br>
        <div>'.$_REQUEST["error_referer"].'</div>
        <div><h3>Браузер<h3></div>
        <br>
        <div>'.$_REQUEST["error_useragent"].'</div>
        <div><h3>ID сессии<h3></div>
        <br>
        <div>'.$_REQUEST["sessid"].'</div>
        </body>
        </html>
        ';

        //Добавляем заголовок, чтобы отправить письмо как HTML
        $headers[]  = 'MIME-Version: 1.0';
        $headers[]  = 'Content-type: text/html; charset=utf-8';


        mail($to, $subject, $message, implode("\r\n", $headers));
        $data['sender'] = 'php';
        $data['status'] = 'success';
        echo json_encode($data);
        exit;
    }

    elseif ($_REQUEST["email_sender"] == "bitrix")
    {
        //Если будем отправлять через Битрикс
        
        $arMailFields = Array();
        $arMailFields["ERROR_MESSAGE"] = trim ($_REQUEST["error_message"]);
        $arMailFields["ERROR_URL"] = $_REQUEST["error_url"];
        $arMailFields["ERROR_REFERER"] = $_REQUEST["error_referer"];
        $arMailFields["ERROR_USERAGENT"] = $_REQUEST["error_useragent"];

        $arMail = Array();
        $arMail['EVENT_NAME'] = "ERROR_CONTENT";
        $arMail['LID'] = 's1';
        $arMail['C_FIELDS'] = $arMailFields;
        
        
        Event::send($arMail);
        $data['sender'] = 'bitrix';
        $data['status'] = 'success';

        echo json_encode($data);
        exit;
    }
    else
    {
        $data['status'] = 'error';
        echo json_encode($data);
        exit;
    }
    
}
?>