BX.bind(document, "keypress", SendError);

function SendError(event, formElem)
{
        event = event || window.event;

        if((event.ctrlKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
        {
            let error = getSelectedText();
            let errorUrl = window.location.href;
            let emailSender = $('#email_sender').val();
            let adminEmail = $('#admin_email').val();

            $('#selectedText').text (error);
            let modal = new $('#errorModal').modal();
            $('#help_form').submit(function (e) {
                e.preventDefault();                                

                BX.ajax({
                    url: '/local/components/samson/error.send.message/ajax.php',
                    method: 'post',
                    dataType: 'html',
                    data: {
                        action: 'SEND_ERROR',
                        email_sender : emailSender,
                        admin_email : adminEmail,
                        error_message: error,
                        error_url: errorUrl,
                        error_referer: document.referrer,
                        error_useragent: navigator.userAgent,
                        sessid: BX.bitrix_sessid()
        
                    },
                    onsuccess: function(data){
                        console.log ('OK');
                        
                    },
                    onfailure: function (request, status, error) {
                        console.log(request);
                        console.log(status);
                        console.log(error);
                    }
                });
                modal.modal('hide');

              });
            /* var Dialog = new BX.CDialog({
                                title: "На сайте обнаружена ошибка!!",
                                head: "В чём заключается ошибка?",
                                content: 	'<form method="POST" id="help_form">\
                                            <textarea name="error_desc" style="height: 78px; width: 374px;"></textarea>\
                                            <input type="hidden" name="error_message"value="'+getSelectedText()+'">\
                                            <input type="hidden" name="error_url" value="'+window.location+'">\
                                            <input type="hidden" name="error_referer" value="'+document.referrer+'">\
                                            <input type="hidden" name="error_useragent" value="'+navigator.userAgent+'">\
                                            <input type="hidden" name="sessid" value="'+BX.bitrix_sessid()+'"></form>',
                                resizable: false,
                                height: '198',
                                width: '400'});

            Dialog.SetButtons([
            {
                'title': 'Отправить',
                'id': 'action_send',
                'name': 'action_send',
                'action': function(){
                    BX.ajax.submit(BX("help_form"));
                    this.parentWindow.Close();
                }
            },
            {
                'title': 'Отмена',
                'id': 'cancel',
                'name': 'cancel',
                'action': function(){
                    this.parentWindow.Close();
                }
            }
            ]);
            Dialog.Show(); */
        }
}
function getSelectedText(){
  if (window.getSelection){
    txt = window.getSelection();
  }
  else if (document.getSelection) {
    txt = document.getSelection();
  }
  else if (document.selection){
    txt = document.selection.createRange().text;
  }
  else return;
  return txt.toString();
}

//Отправляем текст ошибки через AJAX
function sendErrorMessage() {
   
}