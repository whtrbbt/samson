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
                if (!(data === null) && data.status =="success" ){
                    console.log (data);
                    showItem (data);
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
    msg.toggleClass('d-none',false);

    $('.item-name').text(data.itemName);
    $('.code-buy-item').toggleClass('d-none',false);

}