<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Create new data</h4>
        <router-link class="btn btn-primary w-100" to="/">Kembali</router-link>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form @submit.prevent="addData()">
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

          <div class="form-group">
            <label>Password</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your email"
              v-model="form.password"
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
  data(){
    return{
      form:{
        name: '',
        email: '',
        password: '',
      }
    }
  },
  methods: {
    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/person", {
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