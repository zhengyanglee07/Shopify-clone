<template>
    <div class="w-100 h-100">
        <b-button variant="success" @click="goSites" class="w-100">Continue shopping</b-button>
        <img src="/images/background-images/thanksOrder.jpg" alt="Thanks for order" width="100%">
    </div>
</template>

<script>

export default {
    methods:{
        goSites(){
            this.$router.push({
                name: "SiteCatalog"
            });
        }
    }
}
</script>