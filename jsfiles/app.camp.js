

const { createApp } = Vue;

createApp({

    data() {
        return {
            showEditModal: false,
            showDeleteModal: false,
            users: [],
            posts: [],
            alumni:[],
            user_id: '',
            pictures: [],
            announce: [],
            absit:[],
            abeed:[],
            announceCount: 0,
            previousAnnounceCount: 0,
            events: [],
            ebsit:[],
            ebeed:[],
            comments: [],
            cbsit:[],
            clickPost: {},
            bsit:[],
            beed:[],
            bshm:[],
            abshm:[],
            ebshm:[],
            bsed:[],
            absed:[],
            ebsed:[],
            bsitalumni:[],

            editingPost: {
                post_id: null,
                user_id: null,
                names: '',
                description: '',
                image: '',
                date_created: ''
            },
            reportReason: '',

            commentText: '',
            id: '',
            uname: '',

            editingComment: {
                comment_id: '',
                pos_id: '',
                user_id: '',
                user: '',
                comment: '',
                date: ''
            },

            a_id : '',
            title: '',
            description: '',
            
            editingAnnounce: {
                a_id : '',
                title: '',
                description: '',
                date_created: '',
                isdeleted: ''
            },
        }
    },
    methods: {

        fnAlumniProfile: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveProfile');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    console.log(r);
                    if (r.data == 1) {
                        alert("Your request is being processed..");
                       
                    }
                    else {
                        alert('Your request is being processed..');
                    }
                })
        },

        fnSaveProfile: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveProfile');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    console.log(r);
                    if (r.data == 1) {
                        alert("Your request is being processed..");
                        location.replace();
                        // vm.fnGetUsers();
                    }
                    else {
                        alert('Your request is being processed..');
                    }
                })
        },
        fnSaveUser: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveUser');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    console.log(r);
                    if (r.data == 1) {
                        alert("User successfully saved");
                        // vm.fnGetUsers();
                    }
                    else {
                        alert('There was an error.');
                    }
                })
        },
        
        //post
        fnSavePost: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSavePost');
           
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Post successfully posted");
                        
                        form.reset();
                        vm.fnGetPost();
                    }
                    else {
                        // window.location.href = "teacherhome.php";
                        alert("Error occured during post.");
                        console.log(r);
                    }
                })
        },

        fnGetPost: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetPost");
            
            axios.post('model/listModel.php', data)
                .then(function (response) {
                    console.log(response); // Log the entire response to the console

                    // Check if the response data is an array before using forEach
                    if (Array.isArray(response.data)) {
                        vm.posts = response.data.map(function (v) {
                            return {
                                post_id: v.post_id,
                                user_id: v.user_id,
                                names: v.names,
                                description: v.description,
                                image: v.image,
                                date_created: v.date_created
                                
                            };
                            
                        });
                        
                    } else {
                        console.error("Response data is not an array:", response.data);
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnGetPost:', error);
                });

        },

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
                    form.reset();
                    vm.fnGetbsit();
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
                vm.bsit = [];
                r.data.forEach(function(v){
                    vm.bsit.push({
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
        fnSaveBeed:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveBeed');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    form.reset();
                    vm.fnGetbeed();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetbeed:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetbeed");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.beed = [];
                r.data.forEach(function(v){
                    vm.beed.push({
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
        fnSaveBshm:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveBshm');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    form.reset();
                    vm.fnGetbshm();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetbshm:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetbshm");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.bshm = [];
                r.data.forEach(function(v){
                    vm.bshm.push({
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
        fnSaveBsed:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSaveBsed');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    form.reset();
                    vm.fnGetbsed();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetbsed:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetbsed");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.bsed = [];
                r.data.forEach(function(v){
                    vm.bsed.push({
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

        fnSavealumni:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSavealumni');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    form.reset();
                    vm.fnGetAlumni();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        fnGetAlumni:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetAlumni");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.bsitalumni = [];
                r.data.forEach(function(v){
                    vm.bsitalumni.push({
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
        Alumni:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','Alumni');
            axios.post('model/listModel.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("Post successfully posted");
                    form.reset();
                    vm.GetAlumni();
                }
                else{
                    alert('There was an error.');
                    console.log(r);
                }
            })
        },

        GetAlumni:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","GetAlumni");
            axios.post('model/listModel.php',data)
            .then(function(r){
                vm.alumni = [];
                r.data.forEach(function(v){
                    vm.alumni.push({
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
        editPost(post) {
            this.editingPost = { ...post };
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
                        vm.fnGetbsit();
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
                        vm.fnGetbsit(); 
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnDeletePost:', error);
                });
        },
        //report
        fnReportPost(postId, reason) {
            const vm = this;
            const data = new FormData();
            data.append('method', 'fnReportPost');
            data.append('post_id', postId);
            data.append('reason', reason);

            axios.post('model/listModel.php', data)
                .then(function (response) {
                    if (response.data === 1) {
                        alert('Post reported successfully. Thank you for your feedback.');
                    } else {
                        alert('Failed to report the post. Please try again later.');
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnReportPost:', error);
                });
        },
        //comment
        fnAddComment(postId, commentText) {

            const vm = this;
            const data = new FormData();
            data.append('method', 'fnAddComment');
            data.append('post_id', postId);
            data.append('comment_text', commentText);

            axios.post('model/listModel.php', data)
                .then(function (response) {
                    if (response.data === 1) {
                        alert('Comment added successfully.');
                       
                        vm.commentText = ''; 
                        vm.fnCommentPost();
                       
                    } else {
                        alert('Failed to add comment. Please try again later.');
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnAddComment:', error);
                });
        },
       
        fnCommentPost(postId) {
            const vm = this;
            const data = new FormData();
            data.append('method', 'fnGetcomment');
            data.append('post_id', postId);
        
            axios.post('model/listModel.php', data)
              .then(function(response) {
                console.log(response);
                vm.comments = response.data.map(function(comment) {
                  return {
                    pos_id: comment.pos_id,
                    user_id: comment.user_id,
                    comment_id: comment.comment_id,
                    uname: comment.uname,
                    comment: comment.comment,
                    date: comment.date,
                  };
                });
              })
              .catch(function(error) {
                console.error('Error fetching comments:', error);
              });
          },
        
        editComment(comment) {
            this.editingComment = { ...comment };
        },

        updateComment() {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnUpdateComment");
            data.append("comment_id", vm.editingComment.comment_id);
            data.append("uname", vm.editingComment.uname);
            data.append("comment", vm.editingComment.comment);
        

            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Comment successfully updated");
                        vm.editingComment.comment = '';
                        location.replace();
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during updatePost:', error);
                });

            $('#editPostModal').modal('hide');
        },
        fnDeleteComment(comment_id) {
            const vm = this;
            const data = new FormData();
            data.append('method', 'fnDeleteComment');
            data.append('comment_id', comment_id);

            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert('Comment successfully deleted');
                        vm.fnCommentPost();
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnDeletePost:', error);
                });
        },
     
        // announcement
        fnSaveAnnouncement: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveAnnouncement');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announcement successfully saved");
                        form.reset();
                        vm.fnGetAnnouncement();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetAnnouncement: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetAnnouncement");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.announce = [];
                    r.data.forEach(function (v) {
                        vm.announce.push({
                            a_id: v.a_id,
                            title: v.title,
                            description: v.description,
                            date_created: v.date_created,
                            
                        })
                        
                    });
                        vm.previousAnnounceCount = vm.announceCount;
                        vm.announceCount = vm.announce.length - vm.previousAnnounceCount;

                        // Update the total count of announcements
                        vm.announceCount = vm.announce.length;
                })
                .catch(function (error) {
                    console.error('Error fetching announcements:', error);
                  });
        },
        fnSaveitAnnounce: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveitAnnounce');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announcement successfully saved");
                        form.reset();
                        vm.fnGetitAnnounce();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetitAnnounce: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetitAnnounce");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.absit = [];
                    r.data.forEach(function (v) {
                        vm.absit.push({
                            a_id: v.a_id,
                            title: v.title,
                            description: v.description,
                            date_created: v.date_created,
                            
                        })
                        
                    });
                        vm.previousAnnounceCount = vm.announceCount;
                        vm.announceCount = vm.announce.length - vm.previousAnnounceCount;

                        // Update the total count of announcements
                        vm.announceCount = vm.announce.length;
                })
                .catch(function (error) {
                    console.error('Error fetching announcements:', error);
                  });
        },

        fnSavebeedAnnounce: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSavebeedAnnounce');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announcement successfully saved");
                        form.reset();
                        vm.fnGetbeedAnnounce();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetbeedAnnounce: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetbeedAnnounce");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.abeed = [];
                    r.data.forEach(function (v) {
                        vm.abeed.push({
                            a_id: v.a_id,
                            title: v.title,
                            description: v.description,
                            date_created: v.date_created,
                            
                        })
                        
                    });
                        vm.previousAnnounceCount = vm.announceCount;
                        vm.announceCount = vm.announce.length - vm.previousAnnounceCount;

                        // Update the total count of announcements
                        vm.announceCount = vm.announce.length;
                })
                .catch(function (error) {
                    console.error('Error fetching announcements:', error);
                  });
        },

        fnSavebshmAnnounce: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSavebshmAnnounce');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announcement successfully saved");
                        form.reset();
                        vm.fnGetbshmAnnounce();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetbshmAnnounce: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetbshmAnnounce");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.abshm = [];
                    r.data.forEach(function (v) {
                        vm.abshm.push({
                            a_id: v.a_id,
                            title: v.title,
                            description: v.description,
                            date_created: v.date_created,
                            
                        })
                        
                    });
                        vm.previousAnnounceCount = vm.announceCount;
                        vm.announceCount = vm.announce.length - vm.previousAnnounceCount;

                        // Update the total count of announcements
                        vm.announceCount = vm.announce.length;
                })
                .catch(function (error) {
                    console.error('Error fetching announcements:', error);
                  });
        },
        fnSavebsedAnnounce: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSavebsedAnnounce');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announcement successfully saved");
                        form.reset();
                        vm.fnGetbsedAnnounce();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetbsedAnnounce: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetbsedAnnounce");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.absed = [];
                    r.data.forEach(function (v) {
                        vm.absed.push({
                            a_id: v.a_id,
                            title: v.title,
                            description: v.description,
                            date_created: v.date_created,
                            
                        })
                        
                    });
                        vm.previousAnnounceCount = vm.announceCount;
                        vm.announceCount = vm.announce.length - vm.previousAnnounceCount;

                        // Update the total count of announcements
                        vm.announceCount = vm.announce.length;
                })
                .catch(function (error) {
                    console.error('Error fetching announcements:', error);
                  });
        },
        editAnnounce(announces) {
            this.editingAnnounce = { ...announces };
        },

        updateAnnounce() {
            const vm = this;
            const data = new FormData();
            data.append("method","fnUpdateAnnounce");
            console.log(vm.editingAnnounce);
            data.append("a_id", vm.editingAnnounce.a_id);
            data.append("title", vm.editingAnnounce.title);
            data.append("description", vm.editingAnnounce.description);
           
        
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Announce successfully updated");
                        vm.vm.editingAnnounce.title='';
                        vm.vm.editingAnnounce.description='';
                        vm.fnGetAnnouncement();
                        vm.fnGetbeedAnnounce(); // Refresh the post list
                        // Optionally, close the form/modal or perform other actions
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during updatePost:', error);
                });
        },
        fnDeleteAnnounce(a_id) {
            const vm = this;
            const data = new FormData();
            data.append('method', 'fnDeleteAnnounce');
            data.append('a_id', a_id);

            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert('Announce successfully deleted');
                        vm.fnGetAnnouncement();
                        vm.fnGetbeedAnnounce(); // Refresh the post list
                    } else {
                        console.log(r);
                    }
                })
                .catch(function (error) {
                    console.error('Error during fnDeletePost:', error);
                });
        },

       
        // Event
        fnSaveEvent: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveEvent');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Event successfully posted");
                        form.reset();
                        vm.fnGetEvent();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetEvent: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetEvent");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.events = [];
                    r.data.forEach(function (v) {
                        vm.events.push({
                            events_id:v.events_id,
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
        fnEventBsit: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnEventBsit');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Event successfully posted");
                        form.reset();
                        vm.fnGetEbsit();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },

        fnGetEbsit: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetEbsit");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.ebsit = [];
                    r.data.forEach(function (v) {
                        vm.ebsit.push({
                            events_id:v.events_id,
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
        fnSaveEbeed: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveEbeed');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Event successfully posted");
                        form.reset();
                        vm.fnGetEbeed();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetEbeed: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetEbeed");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.ebeed = [];
                    r.data.forEach(function (v) {
                        vm.ebeed.push({
                            events_id:v.events_id,
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
        fnSaveEbshm: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveEbshm');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Event successfully posted");
                        form.reset();
                        vm.fnGetEbshm();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetEbshm: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetEbshm");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.ebshm = [];
                    r.data.forEach(function (v) {
                        vm.ebshm.push({
                            events_id:v.events_id,
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
        fnSaveEbsed: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnSaveEbsed');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("Event successfully posted");
                        form.reset();
                        vm.fnGetEbsed();
                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },
        fnGetEbsed: function () {
            const vm = this;
            const data = new FormData();
            data.append("method", "fnGetEbsed");
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    vm.ebsed = [];
                    r.data.forEach(function (v) {
                        vm.ebsed.push({
                            events_id:v.events_id,
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

        fnSaveRegister: function (e) {
            const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append("user_id", this.user_id);
            data.append('method', 'fnSaveRegister');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert("User successfully saved");
                        window.location.href = "sign-in.php";

                    }
                    else {
                        alert('There was an error.');
                        console.log(r);
                    }
                })
        },

        fnLogin: function (e) {
            // const vm = this;
            e.preventDefault();
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method', 'fnLogin');
            axios.post('model/listModel.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert('welcome');
                        window.location.href = 'role.php';
                    } else if (r.data == 2) {
                        alert('Invalid Username or Password');
                        console.log(r);
                    }
                    else {
                        alert('there was an error');
                        console.log(r);
                    }

                })

        },


       


    },
    created: function () {
        // this.fnGetUsers();
        this.fnGetPost();
        this.fnGetAnnouncement();
        this.fnGetEvent();
        this.fnCommentPost();
        this.fnGetbsit();
        this.fnGetEbsit();
        this.fnGetEbeed();
        this.fnGetitAnnounce();
        this.fnGetAlumni();
        this.fnGetbeed();
        this.fnGetbeedAnnounce();
        this.fnGetbshm();
        this.fnGetbshmAnnounce();
        this.fnGetEbshm();
        this.fnGetbsed();
        this.fnGetbsedAnnounce();
        this.fnGetEbsed();
        this.GetAlumni();
 

    }

}).mount('#camp-app')

