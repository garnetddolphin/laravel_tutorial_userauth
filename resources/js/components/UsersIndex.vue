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
          <tr v-for="user, index in users">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <router-link :to="{name:'editUser',params:{id:user.id}}" class="btn btn-xs btn-default">Edit</router-link>
              <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(user.id, index)">Delete</a>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import http from '../http.js'
  export default {
    data: function () {
      return {
        users: []
      }
    },
    mounted() {
      this.getResults();
    },
    methods: {
      getResults() {
        var app = this;
        http.get('users',resp=>{
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