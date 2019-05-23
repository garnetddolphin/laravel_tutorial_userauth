<template>
  <form v-on:submit="saveForm()" class="p-form" autocomplete="off">
    <section class="p-section">
      <div class="p-section__header">
        <h3 class="p-section__heading">Create new User</h3>
      </div>
      <dl class="p-row">
        <dt>Name</dt>
        <dd><input type="text" v-model="user.name" class="c-input"></dd>
      </dl>
      <dl class="p-row">
        <dt>E-mail</dt>
        <dd><input type="text" v-model="user.email" class="c-input"></dd>
      </dl>
      <dl class="p-row">
        <dt>Password</dt>
        <dd><input type="password" v-model="user.password" class="c-input"></dd>
      </dl>
      <ul class="p-buttons">
        <router-link to="/" class="btn btn-default">Cancel</router-link>&nbsp;<button class="btn btn-success">Create</button>
      </ul>
    </section>
  </form>
</template>

<script>
  import http from '../http.js'
  export default {
    data: function () {
      return {
        user: {
          name: '',
          email: '',
          password: '',
        }
      }
    },
    methods: {
      saveForm() {
        var app = this;
        var newUser = app.user;
        http.post('/users',newUser,app.$router.push({path: '/'}));
      }
    }
  }
</script>