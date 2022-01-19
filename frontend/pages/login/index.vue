<template>
  <div class="w-3/12 h-screen mx-auto flex flex-col space-y-3 justify-center">
    <input v-model="email" type="text" placeholder="email" class="py-2 px-3 border border-gray-400 rounded-lg">
    <input v-model="password" type="password" placeholder="password" class="py-2 px-3 border border-gray-400 rounded-lg">
    <button class="bg-blue-400 rounded-lg py-2 text-white" @click="login">
      Login
    </button>
  </div>
</template>

<script>
export default {
  data () {
    return {
      email: 'test@mail.com',
      password: '1234'
    }
  },
  methods: {
    login () {
      this.$auth.loginWith('laravelSanctum', {
        data: {
          email: this.email,
          password: this.password
        }
      })
    }
  }
}
</script>

<style>

</style>
