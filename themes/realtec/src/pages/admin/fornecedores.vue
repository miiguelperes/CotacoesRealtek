<template>
  <div id="fornecedores-page">
    <h4>Fornecedores</h4>
    <br>
    
    <div class="list">
       
      <b-list-group>
        <b-list-group-item v-for="c in clients" :key="c.id" class="flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{c.name+' '+c.surname}}</h5>
            <small>Ultimo Login: {{c.last_login | formatDate}}</small>
          </div>
          <p class="mb-1">{{c.email}}</p>
        </b-list-group-item>
      </b-list-group>
    </div>
  </div>
</template>
<script>
export default {
    name: 'FornecedoresComponent',
    data() {
        return {
            spineer: true,
            open: true,
            clients: [],
        };
    },
    created() {
        var self = this;
        self.axios.get('http://realtec.peresbusinessintelligence.com.br/api/v1/getall').then(res => {
            self.spineer = false;
            self.clients = res.data;
        });
    },
};
</script>
<style  scoped>
.list{
      overflow-y: scroll;
    height: 81vh;
}
</style>
