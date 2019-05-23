<template>
  <div>
    <div class="form-group">
      <router-link :to="{name: 'createUser'}" class="btn btn-success">Create new user</router-link>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th width="100">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user, index in users.data"> <!--修正-->
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <router-link :to="{name:'editUser',params:{id:user.id}}" class="btn btn-xs btn-default">Edit</router-link>
              <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(user.id, index)">Delete</a>
            </td>
          </tr>
        </tbody>
        </table>
        <pagination :data="users" @pagination-change-page="getResults"></pagination> <!--追加-->
      </div>
    </div>
  </div>
</template>

<script>
  import http from '../http.js'
  import pagination from 'laravel-vue-pagination'; // 追記
  export default {
    data: function () {
      return {
        users: {} // 修正
      }
    },
    // 追記ここから
    components: { 
      pagination
    },
    // 追記ここまで
    mounted() {
      this.getResults();
    },
    methods: {
      getResults(page=1) { // 修正
        var app = this;
        http.get('users?page='+page,resp=>{ // 修正
          app.users = resp.data;
        })
      },
      deleteEntry(id, index) {
        if (confirm("Do you really want to delete it?")) {
          var app = this;
          http.delete('users/'+id,app.$router.go(0))
        }
      }
    }
  }
</script>