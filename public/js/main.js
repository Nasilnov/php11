const API = '../server';

const app = new Vue({
    el: '#app',
    data: {
        sumInfo: '',
    },
    methods: {
        postJson(url, request){
            console.log(url);
            return fetch(url, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(request)
            }).then(result => result.json())
                .catch(error => {
                    console.log('Error: ', error);
                })
        },
    },


    mounted() {
        console.log(this);
    }
});