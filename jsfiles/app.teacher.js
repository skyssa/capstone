const {createApp} = Vue;

createApp({
    data(){
        return{
            users:[],
            posts:[],
            user_id:0,
            pictures: [],
            announce: [],
            events: [],
            comments:[]
        }
    },
    methods:{
        fnSavebsit:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSavebsit');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    window.location.href = "t_bsit.php";
                    vm.fnGetPost();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetbsit:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetbsit");
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

        fnEventBsit:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnEventBsit');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Event successfully posted");
                    window.location.href = "t_bsit.php";
                    vm.fnGetEbsit();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetEbsit:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetEbsit");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.events = [];
                r.data.forEach(function(v){
                    vm.events.push({
                        title: v.title,
                        date: v.date,
                        event: v.event,
                        date_posted: v.date_posted
                        
                    })
                })
            })
        },
        fnAnnounceBsit:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnAnnounceBsit');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Announcement successfully saved");
                    window.location.href = "t_bsit.php";
                    vm.fnGetAnnouncement();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },
        
        fnGetAbsit:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetAbsit");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.announce = [];
                r.data.forEach(function(v){
                    vm.announce.push({
                        title: v.title,
                        description: v.description,
                        date_created: v.date_created
                        
                    })
                })
            })
        },

       
    },
    created:function(){
       
        this.fnGetbsit();
        this.fnGetEbsit();
        this.fnGetAbsit();
    }

}).mount('#teach-app')