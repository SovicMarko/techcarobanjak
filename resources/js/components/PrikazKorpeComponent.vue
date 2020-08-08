<template>
 <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <button href="" v-on:click="prikaziKorpu">Korpa <span class="badge">{{brojObjava}}</span></button>
    </li>

</ul>
</template>

<script>
    import { basket } from '../app.js'

    export default {
        name: "prikaz-korpe",
        data: function () {
            return {
                brojObjava : 0,
            }
        },
        methods: {
            prikaziKorpu: function() {
                console.log("Korpa prikazanaaa");
                basket.$emit('otvoriKorpu');
            }
        },
        mounted() {
            console.log('Prikaz korpe mounted.');
            if ( window.localStorage.korpa) {

            }
            else {
                window.localStorage.korpa = [];
            }
            var korpa = JSON.parse(window.localStorage.korpa);
            this.brojObjava = korpa.length;
            console.log(korpa);
            // this.brojObjava = korpa.length();

        },
    }
</script>

<style lang="scss" scoped>
    ul {
        padding-right: 0px;
    }
</style>
