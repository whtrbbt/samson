<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
   
?>
<?
   CUtil::InitJSCore(array('window', 'ajax'));
?>

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="" id="help_form">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Нашли ошибку?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectedText">Текст ошибки:</label>
                    <textarea class="form-control" id="selectedText" rows="3" name="error_desc" disabled></textarea>
                    <input type="hidden" id="admin_email" value="<?=$arResult['EMAIL_FOR_ERRORS']?>">
                    <input type="hidden" id="email_sender" value="<?=$arResult['EMAIL_SENDER']?>">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет, отмена</button>
                <button class="btn btn-primary" id="send_error" type="submit">Да, отправить</button>
            </div>
        </form>
    </div>
  </div>
</div>