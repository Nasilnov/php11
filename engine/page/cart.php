<?php
function indexAction()
{
    $user = '';
    if (empty($_SESSION['user'])) {
        $user = <<<user
для оформления заказа необходимо <a href="?p=auth">Пройти авторзацию<a>
user;
    } else {
        if (!empty($_SESSION['cart'])) {
            $user = <<<user
<form action="?p=order&a=base" method="post"> 
<button name="submit">Оформить заказ</button>
</form>
user;
        } else {
            $user = <<<user
<h3>Ваша корзина пуста</h3>
user;
        }
    }
    return <<<php
<div id="app">
    <header>
        <div class="logo">Интернет-магазин</div>
        <div class="cart">
            <div class="cart-info">{{sumInfo}}</div>
        </div>
    </header>  
    <main>
       <div>{$user}</div>
        <cartinfo ref="cartinfo"></cartinfo>
    </main>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/CartComp.js"></script>
<script src="js/CartInf.js"></script>
<script src="js/ProductComp.js"></script>
<script src="js/main.js"></script>    
php;
}
function orderAction()
{
    return <<<php
 <main>
       <div>Ваш заказ успешно оформлен</div>
    </main>
php;

}