// app.js
new Vue({
    el: '#app',
    data: {
      messages: [],
      newMessage: ''
    },
    created() {
      this.fetchMessages();
      setInterval(this.fetchMessages, 2000); // Fetch messages every 2 seconds
    },
    methods: {
      fetchMessages() {
        axios.get('api/messages.php')
          .then(response => {
            this.messages = response.data;
          })
          .catch(error => {
            console.log(error);
          });
      },
      sendMessage() {
        axios.post('api/messages.php', { message: this.newMessage })
          .then(response => {
            this.newMessage = '';
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  });
  