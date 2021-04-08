<template>
  <q-page padding>
    <h1>{{Welcome}}</h1>
     <q-btn color="white" text-color="black" label="Logout" @click="logout"/>
  </q-page>
</template>

<script>
import axios from 'axios'
export default {
  name: 'ScrapingPage',
  data () {
    return {
      Welcome: 'Welcome Scraping App'
    }
  }, 
  mounted () {
    if (this.getToken === null) {
      this.$router.push({ path: '/' })
    }
    this.authcheck()
  },
  computed: {
    getToken: {
      get () {
        return localStorage.getItem('www.google.com')
      }
    }
  },
  methods: {
    authcheck () {
       axios.post('http://127.0.0.1:8000/api/user/auth', {}, {headers: { Authorization: 'Bearer ' + localStorage.getItem('www.google.com')} })
       .catch((err) => {
         localStorage.removeItem('www.google.com')
         this.$router.push({ path: '/' })
       })
    },
    logout () {
      axios.post('http://127.0.0.1:8000/api/user/logout', {},{ headers: { Authorization: 'Bearer ' + localStorage.getItem('www.google.com')} })
      .then((response) => {
        
          localStorage.removeItem('www.google.com')
          this.$router.push({ path: '/' })
        })
        .catch((error) => {
          console.error(error)
        })
    }
  }
}
</script>
