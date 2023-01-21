<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Sale;

if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
{

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST["action"] == "FIND_ITEM" && !empty($_REQUEST["item_ID"]) && $_REQUEST["item_ID"]!="")

    {
        
        $res = CIBlockElement::GetByID($_REQUEST["item_ID"]);
        if($ar_res = $res->GetNext()){
            $item_name = $ar_res['NAME']; 
        }
        $data['status'] = 'success';
        $data['itemID'] = $_REQUEST["item_ID"];
        $data['itemName'] = $item_name;
        echo json_encode($data);
        exit;
    }

}