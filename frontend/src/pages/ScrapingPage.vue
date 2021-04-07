<template>
  <q-page padding>
    <!-- content -->
  </q-page>
</template>

<script>
// const puppeteer = require('puppeteer');
import axios from 'axios'
export default {
  name: 'ScrapingPage',
  data () {
    return {
    }
  },
  mounted () {
    this.scrapeSoccer();
  },
  methods: {
  //  async scrapeSoccer () {
  //     const url = 'https://www.bet365.com/#/IP/B1';
  //     const browser = puppeteer.launch();
  //     const page =  browser.newPage();
  //     page.goto(url);

  //    const dimensions = page.evaluate(() => {
  //     return document.querySelector("body").innerHTML;
  //     });

  //     console.warn(dimensions);
  //     this.bods = dimensions
  //     browser.close();

  //   }
    scrapeSoccer () {
      axios.get('https://www.bet365.com/#/IP/B1')
      .then((res) => {
        console.warn(res);
      });
    }
  }
}
</script>
