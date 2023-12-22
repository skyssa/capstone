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
            comments:[],

            commentText: '',
            id: '',
            uname: '',
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
        updatePost() {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnUpdatePost");
            data.append("post_id", vm.editingPost.post_id);
            data.append("names", vm.editingPost.names);
            data.append("description", vm.editingPost.description);
            data.append("image", vm.editingPost.image);

            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Post successfully updated");
                        vm.editingPost.description = '';
                        vm.fnGetPost(); 
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during updatePost:', error);
                });

            $('#editPostModal').modal('hide');
        },
        fnDeletePost(postId) {
            const vm = this;
            const data = new FormData();
            data.append('method', 'fnDeletePost');
            data.append('post_id', postId);

            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert('Post successfully deleted');
                        vm.fnGetPost(); 
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnDeletePost:', error);
                });
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
                    console.log(r);
                    vm.events.push({
                        title: v.title,
                        month: v.month,
                        day: v.day,
                        year: v.year,
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
        fnAddComment(postId, commentText) {

            const vm = this;
            const data = new FormData();
            data.append('method', 'fnAddComment');
            data.append('post_id', postId);
            data.append('comment_text', commentText);

            axios.post('model/bsit.php', data)
                .then(function (response) {
                    if (response.data === 1) {
                        alert('Comment added successfully.');
                        // Optionally, you can refresh the post list or update the comments locally
                        vm.commentText = ''; 
                        vm.fnGetPost();
                        $('#commentModal').modal('hide');
                    } else {
                        alert('Failed to add comment. Please try again later.');
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnAddComment:', error);
                });
        },
       
    },
    created:function(){
       
        this.fnGetbsit();
        this.fnGetEbsit();
        this.fnGetAbsit();
    }

}).mount('#teach-app')