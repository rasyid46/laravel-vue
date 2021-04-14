<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Update data</h4>
        <router-link class="btn btn-primary w-100" to="/">Kembali</router-link>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function updateData() -->
        <form @submit.prevent="updateData()">
          <div class="form-group">
            <label> name</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your  name"
              v-model="form.name"
              required
            >
          </div>
          <div class="form-group">
            <label>Email</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your email"
              v-model="form.email"
              required
            >
          </div>

        
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form:{
        name: '',
        email: '',
        
      }
    };
  },
  created() {
    // load data saat pertama kali halaman dibuka
    this.loadData();
  },
  methods: {
    loadData() {
      // load data berdasarkan id
      axios
        .get("http://localhost:8000/api/person/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          this.form.name = response.data.name;
          this.form.email = response.data.email;
          
        });
    },
    updateData() {
      // put data ke api menggunakan axios
      axios
        .put("http://localhost:8000/api/person/" + this.$route.params.id, {
          name: this.form.name,
          email: this.form.email,
          password: this.form.password
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/");
        });
    }
  }
};
</script>