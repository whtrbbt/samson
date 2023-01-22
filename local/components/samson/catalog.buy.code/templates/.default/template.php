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
        <div class="alert alert-danger d-none" id='errorAlert' role="alert">
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
                    <div class="input-group my-1">
                        <input class="form-control" type="text" size=30 id="itemID" value="" title="Введите ID-код товара" placeholder="Введите ID-код товара">
                        <button type="submit" class="btn btn-primary">Найти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="code-buy-item d-none my-2 card">
        <div class="card-body">
            <form id="itemAddBasket">
                <div class="row">
                    <div class="col">
                        <div class="item-name m-1">Название</div>
                    </div>
                    <div class="col-4 text-right">
                        <div class="item-price m-1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m-1 text-right align-self-center">
                        Количество:
                    </div>
                    <div class="col">
                        <div class="input-group m-1">
                            <input class="form-control" type="number" id="itemQuantity" value="1" min="1" max="99" title="Укажите количество товара" placeholder="Укажите количество товара">
                            <input type="hidden" id="findedItemId" value="">
                            <input type="submit" class="btn btn-primary" value="В корзину">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="code-buy-sku-list d-none my-2 card">
        <div class="card-body">
            <div class="row">
                <div class="col sku-list-item-name">
                    Название
                </div>
            </div>
            <div class="row">
                <div class="col sku-list-title">
                    Товар имеет торговые предложения, укажите один из ID указанных ниже:
                </div>
            </div>
            <div class="row">
                <div class="col sku-list">
                    Список
                </div>
            </div>
        </div>
    </div>
</div>