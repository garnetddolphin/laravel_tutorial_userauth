<template>
  <form v-on:submit="saveForm()" class="p-form">
    <section class="p-section">
      <div class="p-section__header">
        <h3 class="p-section__heading">Edit User</h3>
      </div>
      <dl class="p-row">
        <dt>Name</dt>
        <dd><input type="text" v-model="user.name" class="c-input"></dd>
      </dl>
      <dl class="p-row">
        <dt>E-mail</dt>
        <dd><input type="text" v-model="user.email" class="c-input"></dd>
      </dl>
      <ul class="p-buttons">
        <router-link to="/" class="btn btn-default">Cancel</router-link>&nbsp;<button class="btn btn-success">Edit</button>
      </ul>
    </section>
  </form>
</template>

<script>
  import http from '../http.js'
  export default {
    data() {
      return {
        user: {}
      }
    },
    mounted() {
      http.get('users/'+this.$route.params.id,result=>{
        this.user = result.data;
      });
    },
    methods: {
      saveForm() {
        http.put('users/'+this.$route.params.id,this.user,resp=>{
          alert("Edit successfully!");
          this.$router.push({path: '/'});
        })
      }
    }
  }
</script>