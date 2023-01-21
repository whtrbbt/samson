<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
   
?>
<?
   CUtil::InitJSCore(array('window', 'ajax'));
?>
<div class="code-buy col-sm-9 col-md-8">
    <div class="code-buy-message">
        <div class="alert alert-success d-none" id='successAlert' role="alert">
            Товар добавлен в корзину!
        </div>
        <div class="alert alert-danger d-none" role="alert">
            Товар не найден!
        </div>
    </div>
    <div class="code-buy-form">
        <div class="row">
            <div class="col-12">
                <h3>Поиск товара по коду</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-2">
                <form id="codeBuy">
                    <div class="bx-input-group m-1">
                        <input class="bx-form-control" type="text" size=30 id="itemID" value="" title="Введите артикул товара" placeholder="Введите артикул товара">
                        <input type="submit" value="Найти">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="code-buy-item d-none my-2 card">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="item-name m-1">Название</div>
                </div>
                <div class="col">
                    <div class="bx-input-group m-1">
                        <input class="bx-form-control" type="number" name="iteьQuantity" value="1" min="1" max="99" title="Укажите количество товара" placeholder="Укажите количество товара">
                    </div>
                </div>
                <div class="col"><div class="bx-input-group m-1">
                         <input type="button" value="В корзину">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>