<template>
<div v-bind:class="{ isHidden : isHidden,  korpaModal }" id="" >
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal" v-on:click="zatvori()">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div v-for="{proizvod,key} in proizvodi" :key="key">
            {{ proizvodi.naziv }}
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="zatvori()">Close</button>
      </div>

    </div>
  </div>
</div>
</template>

<script>
import { basket } from '../app.js'
export default {

    name: "korpa-modal",
    data: function() {
        return {
            isHidden: true,
            korpaModal: true,
            proizvodi: [],
        }
    },
    mounted() {


                if (localStorage.getItem('korpa')) {
                try {
                    this.proizvodi = JSON.parse(localStorage.getItem('korpa'));
                } catch(e) {
                    localStorage.removeItem('korpa');
                }
            }

    },
    created() {
        basket.$on('otvoriKorpu', () => {
            this.isHidden = !this.isHidden;
        })
        this.proizvodi = JSON.parse(window.localStorage.korpa);
            console.log("ovde proizvodi");

            console.log(this.proizvodi);
    },
    methods: {
        zatvori : function() {
            this.isHidden = true;
        }
    }
}
</script>

<style>
    .korpaModal {
        position: absolute;
        z-index: 10000;
        background-color: rgba(0, 0, 0, 0.8);
        width: 100%;
        height: 100%;
    }
    .isHidden {
        display: none;
    }
</style>
