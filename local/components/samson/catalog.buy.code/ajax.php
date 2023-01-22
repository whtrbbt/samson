<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//use \Bitrix\Sale;
use Bitrix\Main\Result;

if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
{

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST["action"] == "FIND_ITEM" && !empty($_REQUEST["item_ID"]) && $_REQUEST["item_ID"]!="")

    {
        
        $res = CIBlockElement::GetByID($_REQUEST["item_ID"]);
        if($ar_res = $res->GetNext()){
            $item_name = $ar_res['NAME'];
        }
        else {
            $data['status'] = 'fail';
            $data['message'] = 'Товар c ID '.$_REQUEST["item_ID"].' не найден!';
            echo json_encode($data);
            exit;
        }
        
        //проверяем наличие торговых предложений
        $offersExist = CCatalogSKU::getExistOffers([$_REQUEST["item_ID"]],2);
        if ($offersExist[$_REQUEST["item_ID"]]){
            $data['status'] = 'success';
            $data['itemID'] = $_REQUEST["item_ID"];
            $data['itemName'] = $item_name;
            $data['haveSKU'] = true;
            
            //получаем список торговых предложений
            $res = CCatalogSKU::getOffersList([$_REQUEST["item_ID"]],2);
            $data['listSKU'] = array_keys($res[$_REQUEST["item_ID"]]);

            echo json_encode($data);
            exit;
        }
        else {

            //получаем цену
            $res = CPrice::GetBasePrice($_REQUEST["item_ID"]);
            $item_price = $res['PRICE'];

            $data['status'] = 'success';
            $data['itemID'] = $_REQUEST["item_ID"];
            $data['haveSKU'] = false;
            $data['itemName'] = $item_name;
            $data['itemPrice'] = $item_price;
            echo json_encode($data);
            exit;
        }   
        /* 
        $IBLOCK_ID = ID_инфоблока_товаров; 
        $ID = $ID_товара; 
        $arInfo = GetInfoByProductIBlock($IBLOCK_ID); 
        if (is_array($arInfo)) 
        { 
        $rsOffers = CIBlockElement::GetList(array(),array('IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'PROPERTY_'.$arInfo['SKU_PROPERTY_ID'] => $ID)); 
        while ($arOffer = $rsOffers->GetNext()) 
        {  ... // тут ведем обработку
        }  */

    }

    elseif ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST["action"] == "ADD_2_BASKET" && !empty($_REQUEST["item_ID"]) && $_REQUEST["item_ID"]!=""
    && !empty($_REQUEST["quantity"]) && $_REQUEST["quantity"]!="")

    {
        
        

        $res = Add2BasketByProductID($_REQUEST["item_ID"], $_REQUEST["quantity"]);
        if ($res > 0) {
            $data['status'] = 'success';
            $data['basketID'] = $res;
            echo json_encode($data);
            exit;
        }
    }

   
}