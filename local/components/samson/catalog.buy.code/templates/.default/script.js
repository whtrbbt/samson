$(document).ready(function(){
    
    
    $('#codeBuy').submit(function(e){
        e.preventDefault();

        BX.ajax({
            url: '/local/components/samson/catalog.buy.code/ajax.php',
            method: 'post',
            dataType: 'json',
            data: {
                action: "FIND_ITEM",
                item_ID: $('#itemID').val(),                
            },
            onsuccess: function(data){
                if (!(data === null) && data.status =="success" && data.haveSKU == false){
                    showItem (data);
                }
                else if (!(data === null) && data.status =="success" && data.haveSKU == true){
                    showSKUList (data);
                }
                else if (!(data === null) && data.status =="fail" ){
                    showError (data);
                }
                
            },
            onfailure: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
        });
        
    });

    $('#itemAddBasket').submit(function(e){
        e.preventDefault();

        BX.ajax({
            url: '/local/components/samson/catalog.buy.code/ajax.php',
            method: 'post',
            dataType: 'json',
            data: {
                action: "ADD_2_BASKET",
                item_ID: $('#itemID').val(),
                quantity: $('#itemQuantity').val(),
            },
            onsuccess: function(data){
                if (!(data === null) && data.status =="success" ){
                    console.log (data);
                    BX.onCustomEvent('OnBasketChange');
                }
                
            },
            onfailure: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
        });
    });

});

function showItem (data) {
    let msg = $('#successAlert');
    msg.text('Товар с кодом '+data.itemID+' найден');
    $('#errorAlert').toggleClass('d-none',true);
    msg.toggleClass('d-none',false);


    $('.item-name').text(data.itemName);
    $('.item-price').text(data.itemPrice+' р.');
    $('#findedItemId').val(data.itemID);
    
    $('.code-buy-sku-list').toggleClass('d-none', true);
    $('.code-buy-item').toggleClass('d-none',false);

}

function showError (data) {
    let msg = $('#errorAlert');
    msg.text(data.message);
    $('#successAlert').toggleClass('d-none',true);
    msg.toggleClass('d-none',false);

    
    $('.code-buy-item').toggleClass('d-none',true);
    $('.code-buy-sku-list').toggleClass('d-none', true);
}

function showSKUList (data) {
    let msg = $('#successAlert');
    msg.text('Товар с кодом '+data.itemID+' найден');
    $('#errorAlert').toggleClass('d-none',true);
    msg.toggleClass('d-none',false);

    $('.sku-list-item-name').text(data.itemName);
    
    let skuList = '';
    data.listSKU.forEach(e => {
        skuList += e+'\<BR\>';
    });
    $('.sku-list').html(skuList);
    
    $('.code-buy-item').toggleClass('d-none',true);
    $('.code-buy-sku-list').toggleClass('d-none', false);
}
