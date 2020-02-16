Vue.component('cartbase', {
    data(){
        return {
            // imgCart: 'https://placehold.it/50x100',
            cartUrl: '/cart_base.php',
            catalogImg: 'img/mini/',
            cartItems: [],
            showCart: false,
            order_get: 'order_id',
        }
    },
    methods: {
        addProduct(product){
            let order_id = this.get_order(this.order_get);
            // console.log(product.product_id);
            this.$parent.postJson(`${API + this.cartUrl}`, {method: 'add', product: product, order_id: order_id} )
                .then(data => {
                    this.cartItems = [];
                    // let datajs = [...data.contents];
                    for(let el of data){
                        this.cartItems.push(el);
                    }
                    this.getSumm();
                })
        },
        remove(item) {
            let order_id = this.get_order(this.order_get);
            this.$parent.postJson(`${API + this.cartUrl}`, {method: 'del', product: item, order_id: order_id})
                .then(data => {
                    this.cartItems = [];
                    // let datajs = [...data.contents];
                    for(let el of data){
                        this.cartItems.push(el);
                    }
                    this.getSumm();
                })
        },

        get_order(key) {
            let p = window.location.search;
            p = p.match(new RegExp(key + '=([^&=]+)'));
            return p ? p[1] : false;
        },

        getSumm() {
            // const sumCart = document.querySelector('.sum-cart');
            let summ = this.cartItems.reduce((summa, good) => {
                return summa + +good.product_price * +good.product_col;
            }, 0);
            let col = this.cartItems.reduce((colvo, good) => {
                return colvo + +good.product_col;
            },0);
            this.$parent.sumInfo = `В заказе ${col} товаров на сумму ${summ} рублей`;
        }
    },
    mounted(){
        let order_id = this.get_order(this.order_get);
        this.$parent.postJson(`${API + this.cartUrl}`, {order_id: order_id})
            .then(data => {
                console.log(data);
                for(let el of data){
                    this.cartItems.push(el);
                }
                this.getSumm();
            });
    },

    template: `
        <div>
            <div class="cart-block-cart">
                <cart-item  
                v-for="item of cartItems" 
                :key="item.product_id"
                :cart-item="item" 
                :img="catalogImg+item.product_img"
                @remove="remove"
                @add="addProduct">
                </cart-item>
<!--            </div>-->
        </div>`
});

Vue.component('cart-item', {
    props: ['cartItem', 'img'],
    template: `
                <div class="cart-item-cart">
                    <div class="product-bio">
                        <img :src="img" alt="Some image">
                        <div class="product-desc-cart">
                            <div class="product-desc-cart_item">{{cartItem.product_name}}</div>
                            <div class="product-desc-cart_item">Количество: {{cartItem.product_col}}</div>
                            <div class="product-desc-cart_item">{{cartItem.product_price}}₽ за единицу</div>
                        </div>
                    </div>
                    <div class="right-block-cart">
                        <div class="product-desc-cart_item">Итого: {{cartItem.product_col*cartItem.product_price}}₽</div>
                        <button class="del-add-btn" @click="$emit('add', cartItem)">+</button>                     
                        <button class="del-add-btn" @click="$emit('remove', cartItem)">-</button>
                    </div>
                </div>
    `
});
