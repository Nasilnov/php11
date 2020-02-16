Vue.component('cart', {
    data(){
      return {
          // imgCart: 'https://placehold.it/50x100',
          cartUrl: '/cartsession.php',
          catalogImg: 'img/mini/',
          cartItems: [],
          showCart: false,
          // sumInfo: '',
          // colInfo: '',
      }
    },
    methods: {
        addProduct(product){
            console.log(product.product_id);
            this.$parent.postJson(`${API + this.cartUrl}`, {method: 'add', product: product} )
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
            this.$parent.postJson(`${API + this.cartUrl}`, {method: 'del', product: item})
                .then(data => {
                    this.cartItems = [];
                    // let datajs = [...data.contents];
                    for(let el of data){
                        this.cartItems.push(el);
                    }
                    this.getSumm();
                })
        },

        getSumm() {
            // const sumCart = document.querySelector('.sum-cart');
            let summ = this.cartItems.reduce((summa, good) => {
                return summa + good.product_price * good.product_col;
            }, 0);
            let col = this.cartItems.reduce((colvo, good) => {
                return colvo + good.product_col;
            },0);
            this.$parent.sumInfo = `В корзине ${col} товаров на сумму ${summ} рублей`;
        }
    },
    mounted(){
        this.$parent.postJson(`${API + this.cartUrl}`)
            .then(data => {
                for(let el of data){
                    this.cartItems.push(el);
                }
                this.getSumm();
            });
    },

    template: `
        <div>
            <button class="btn-cart" type="button" @click="showCart = !showCart">Корзина</button>
<!--            <div class="cart-info">{{this.$parent.sumInfo}}</div>-->
            <div class="cart-block" v-show="showCart">
                <p v-if="!cartItems.length">Корзина пуста</p>
                <cart-item class="cart-item" 
                v-for="item of cartItems" 
                :key="item.product_id"
                :cart-item="item" 
                :img="catalogImg+item.product_img"
                @remove="remove">
                </cart-item>
            </div>
        </div>`
});

Vue.component('cart-item', {
    props: ['cartItem', 'img'],
    template: `
                <div class="cart-item">
                    <div class="product-bio">
                        <img :src="img" alt="Some image">
                        <div class="product-desc">
                            <p class="product-title">{{cartItem.product_name}}</p>
                            <p class="product-quantity">Количество: {{cartItem.product_col}}</p>
                            <p class="product-single-price">{{cartItem.product_price}}₽ за единицу</p>
                        </div>
                    </div>
                    <div class="right-block">
                        <p class="product-price">{{cartItem.product_col*cartItem.product_price}}₽</p>
                        <button class="del-btn" @click="$emit('remove', cartItem)">&times;</button>
                    </div>
                </div>
    `
});
