<template>
    <div class="h-100 w-100 bg">
        <b-button variant="outline-success" @click="goAdminLogin" class="w-100 h-100">
            <h1>Start (Admin Login)</h1>
        </b-button>
    </div>
</template>

<script>
export default{
    methods:{
        goAdminLogin(){
            window.location = "/lookup/admin";
        }
    }
}
</script>
