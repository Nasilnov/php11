<?php
function catalogAction() {
return <<<php
<div id="app">
    <header>
        <div class="logo">Интернет-магазин</div>
        <div class="cart">
            <div class="cart-info">{{sumInfo}}</div>
            <cart ref="cart"></cart>
        </div>
    </header>
    <main>
        <products ref="products"></products>
    </main>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/CartComp.js"></script>
<script src="js/ProductComp.js"></script>
<script src="js/main.js"></script>    
php;

}
