<template>
  <q-page padding>
  <img class="wave" src="~assets/login/wave.png">
    <div class="container">
    <div class="img">
      <img src="~assets/login/bg.svg">
    </div>
    <div class="login-content">
      <div class="form">
      <img src="~assets/login/profile_pic.svg">
      <h2 class="title">Welcome</h2>
      <q-input color="green" v-model="username" label="Username">
        <template v-slot:prepend>
          <q-icon name="account_circle" />
        </template>
      </q-input>
      <q-input ref="pass" color="green" v-model="password" type="password" @keyup.enter="DefLogin(username, password)" label="Password">
        <template v-slot:prepend>
          <q-icon name="vpn_key" />
        </template>
      </q-input>
      <div>
      <label v-show="error_message" class="--error-message">Wrong Email or Password, try again!</label>
      </div>
      <q-btn dense color="green" label="Login" @click="DefLogin(username, password)" class="--btn-login"/>
      </div>
    </div>
    </div>
     <q-ajax-bar
      ref="loginbar"
      position="top"
      color="green"
      size="10px"
      skip-hijack
    />
  </q-page>
</template>

<script>
import axios from 'axios'
export default {
  name: 'LoginPage',
  data () {
    return {
      username: '',
      password: '',
      error_message: false
    }
  },
  computed: {
    getToken: {
      get () {
        return localStorage.getItem('www.google.com')
      }
    }
  },
  mounted () {
    if (this.getToken) {
      this.$router.push({ path: 'soccer' })
    }
  },
  methods: {
    DefLogin (username, password) {
      const _s = this
      const bar = this.$refs.loginbar
      bar.start()
      const params = {
        email: username,
        password: password
      }
      axios.post('http://127.0.0.1:8000/api/user/login', params)
      .then((response) => {
          localStorage.setItem('www.google.com', response.data.access_token)
          this.$refs.loginbar.stop()
          this.$router.push({ path: 'soccer' })
        })
        .catch((error) => {
          console.error(error)
          this.$q.notify({
            type: 'negative',
            message: 'Login Failed!',
            position: 'top-right'
          })
          this.$refs.loginbar.stop()
          this.error_message = true
        })
      
    }
  }
}
</script>

<style lang="scss" scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.q-page-container {
  padding-left: 0px;
}

.--version {
  color: var(--q-color-positive);
  font-size: 10px;
  text-align: right
}

.--error-message {
  color: red;
  font-size: 12px;
}
.--btn-login{
  display: block;
  width: 100%;
  height: 50px;
  border-radius: 25px;
  outline: none;
  border: none;
  background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
  background-size: 200%;
  font-size: 1rem;
  color: #fff;
  text-transform: uppercase;
  margin: 1rem 0;
  cursor: pointer;
  transition: .5s;
}
.btn:hover{
  background-position: right;
}

.wave{
  position: fixed;
  bottom: 0;
  left: 0;
  height: 100%;
  z-index: -1;
}

.container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 2rem;
}

.img {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.login-content{
  display: flex;
  justify-content: flex-start;
  align-items: center;
  text-align: center;
}

.img img{
  width: 500px;
}

.form{
  width: 360px;
}

.login-content img{
    height: 100px;
}

.login-content h2{
  margin: 15px 0;
  color: #333;
  text-transform: uppercase;
  font-size: 2.9rem;
}

@media screen and (max-width: 1050px){
  .container{
    grid-gap: 5rem;
  }
}

@media screen and (max-width: 1000px){
  .form{
    width: 290px;
  }

  .login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
  }

  .img img{
    width: 400px;
  }
}

@media screen and (max-width: 900px){
  .container{
    grid-template-columns: 1fr;
  }

  .img{
    display: none;
  }

  .wave{
    display: none;
  }

  .login-content{
    justify-content: center;
  }
}
</style>
