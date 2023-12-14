const {createApp} = Vue;

createApp({
    data(){
        return{
            users:[],
            posts:[],
            user_id:'',
            pictures: [],
            announce: [],
            events: [],
            comments:[],
            
        }
    },
    methods:{
        fnSaveProfile:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveProfile');
            axios.post('model/listModel.php',data)
            .then(function(r){
                console.log(r);
                if(r.data == 1){
                    alert("Your request is being processed..");
                    window.location.href = "teacherprofile.php";
                    // vm.fnGetUsers();
                }
                else{
                    alert('Your request is being processed..');
                }
            })
        },
        fnSaveUser:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveUser');
            axios.post('model/listModel.php',data)
            .then(function(r){
                console.log(r);
                if(r.data == 1){
                    alert("User successfully saved");
                    // vm.fnGetUsers();
                }
                else{
                    alert('There was an error.');
                }
            })
        },
        // fnGetUsers:function(){
        //     const vm = this;
        //     const data = new FormData();
        //     data.append("method","fnGetUsers");
        //     axios.post('model/listModel.php',data)
        //     .then(function(r){
        //         vm.users = [];
        //         r.data.forEach(function(v){
        //             vm.users.push({
        //                 last_name: v.last_name,
        //                 first_name: v.first_name,
        //                 middle_name: v.middle_name,
        //                 usernmae: v.username,
        //                 gender: v.gender,
        //                 address: v.address,
        //                 phone_number: v.phone_number,
        //                 email: v.email,
        //                 user_type: v.user_type
                        
        //             })
        //         })
        //     })
        // },
        fnSavePost:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSavePost');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    window.location.href = "teacherhome.php";
                    vm.fnGetPost();
                }
                else{
                    // window.location.href = "teacherhome.php";
                    // alert('There was an error.');
                    console.log(r);
                }
            })
        },
        fnGetPost:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetPost");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.posts = [];
                r.data.forEach(function(v){
                    vm.posts.push({
                        post_id: v.post_id,
                        user_id: v.user_id,
                        names: v.names,
                        description: v.description,
                        image: v.image,
                        date_created: v.date_created
                        
                    })
                })
            })
        },

        fnSaveAnnouncement:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveAnnouncement');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Announcement successfully saved");
                    window.location.href = "teacherhome.php";
                    vm.fnGetAnnouncement();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },
        fnGetAnnouncement:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetAnnouncement");
            axios.post('model/listModel.php',data)
            .then(function(){
                vm.announce = [];
                data.forEach(function(v){
                    vm.announce.push({
                        title: v.title,
                        description: v.description,
                        date_created: v.date_created
                        
                    })
                })
            })
        },


        fnSaveEvent:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveEvent');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Event successfully posted");
                    window.location.href = "teacherhome.php";
                    vm.fnGetEvent();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnSaveComment:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveComment');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("comment successfully saved");
                    window.location.href = "teacherhome.php";
                    // vm.fnGetPost();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },
        fnGetcomment:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetcomment");
            axios.post('model/listModel.php',data)
            .then(function(){
                vm.comments = [];
                data.forEach(function(v){
                    vm.comments.push({
                        uname: v.uname,
                        comment: v.comment,
                        date: v.date
                        
                    })
                })
            })
        },

        fnSaveReport:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveReport');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("report successfully saved");
                    window.location.href = "teacherhome.php";
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnSaveRegister:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append("user_id",this.user_id);
            data.append('method','fnSaveRegister');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("User successfully saved");
                    window.location.href ="sign-in.php";
                    
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnLogin: function(e) {
            // const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnLogin');
            axios.post('model/listModel.php', data)
            .then(function(r) {
                if (r.data == 1) {    
                    alert('welcome');
                    window.location.href = 'role.php';
                } else if (r.data == 2) {
                    alert('Invalid Username or Password');
                  console.log(r);
                } 
                else{
                    alert('there was an error');
                    console.log(r);
                }
  
              })
            
        },  

        
        fnGetEvent:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetEvent");
            axios.post('model/listModel.php',data)
            .then(function(){
                vm.events = [];
                data.forEach(function(v){
                    vm.events.push({

                        title: v.title,
                        date: v.date,
                        event: v.event,
                        date_posted: v.date_posted
                        
                    })
                })
            })
        },



       
    },
    created:function(){
        // this.fnGetUsers();
        this.fnGetPost();
        this.fnGetAnnouncement();
        this.fnGetEvent();
        this.fnGetcomment();
        // this.fnGetbsit();
        // this.fnGetEbsit();
        
    }

}).mount('#camp-app')