<template>
      <ul class="nav nav-pills nav-stacked col-md-3">
          <li role="presentation" class="active"><a href="#">Home</a></li>
          <li role="presentation"><a href="#">Profile</a></li>
          <li role="presentation"><a href="#">Messages</a></li>
      </ul>
</template>

<script>
export default {

  name: 'ChatMenu',

  created(){
      this.fetchData();
  },

  methods:{
      fetchData(){
           var api='/api/chats';
           let Authorization="Bearer"+" "+window.getAcccessToken();
           console.log(Authorization);
           let Accept="application/json";
           
           window.axios.get(api,{
              headers:{
                'Authorization':Authorization,
                'Accept':Accept
            }
           }).then((response)=>{
                 this.que=response.data;
           });
      }
  },

  data () {
    return {
        que:[],
    }
  }
}
</script>

<style lang="css" scoped>
</style>