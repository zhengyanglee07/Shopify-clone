<template>
  <div style="height: 90%;">
    <admin-navbar></admin-navbar>
    <div class="row h-auto w-100">
      <div class="h-100 " style="width:20%;">
        <admin-sidebar></admin-sidebar>
      </div>
      <div class="h-100 p-3" style="width:80%; background-color: #EDEEEF">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import AdminNavbar from "../components/AdminNavbar.vue";
import AdminSidebar from "../components/AdminSidebar.vue";

export default {
  props: ['storeName', 'roles', 'userId'],
  data() {
    return {
    };
  },
  components: { AdminNavbar, AdminSidebar },
};
</script>