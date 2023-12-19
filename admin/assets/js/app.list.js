const {createApp} = Vue;

createApp({
    data(){
        return{
            users:[],
            report:[],
            admins:[]
        }
    },
    methods:{
        fnSave:function(e){
            const vm = this;
            e.preventDefault();    
            var form = e.currentTarget;
            const data = new FormData(form);
            data.append('method','fnSave');
            axios.post('model/userModel.php',data)
            .then(function(r){
                console.log(r);
                if(r.data == 1){
                    alert("User successfully saved");
                    vm.fnGetUsers();
                }
                else{
                    alert('There was an error.');
                }
            })
        },
        fnGetUsers:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetUsers");
            axios.post('assets/model/listModel.php',data)
            .then(function(r){
                vm.users = [];
                r.data.forEach(function(v){
                    vm.users.push({
                        name: v.name,
                        user_type: v.user_type,
                        dep_type: v.dep_type,
                        isdeleted: v.isdeleted,
                        date_created: v.date_created,
                        status: v.status
              
                    })
                })
            })
        },
        fnGetAdmin:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetAdmin");
            axios.post('assets/model/listModel.php',data)
            .then(function(r){
                vm.admins = [];
                r.data.forEach(function(v){
                    vm.admins.push({
                        name: v.name,
                        user_type: v.user_type,
                        dep_type: v.dep_type,
                        isdeleted: v.isdeleted,
                        date_created: v.date_created,
                        status: v.status
              
                    })
                })
            })
        }, 
        fnGetReport:function(){
            const vm = this;
            const data = new FormData();
            data.append("method","fnGetReport");
            axios.post('assets/model/listModel.php',data)
            .then(function(r){
                vm.report = [];
                r.data.forEach(function(v){
                    vm.report.push({
                        report_id: v.report_id,
                        post_id:v.post_id,
                        report_type:v.report_type,
                        date_reported:v.date_reported
                        // last_name: v.last_name,
                        // first_name: v.first_name,
                        // middle_name: v.middle_name,
                        // usernmae: v.username,
                        // gender: v.gender,
                        // address: v.address,
                        // phone_number: v.phone_number,
                        // email: v.email,
                        // user_type: v.user_type
                    })
                })
            })
        },
        
    },
    created:function(){
        this.fnGetUsers();
        this.fnGetAdmin();
        this.fnGetReport();
    }
}).mount('#list-app')