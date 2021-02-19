<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Form Ini Pake Vue Js</p>

        <form @submit.prevent="login()">
          <div class="input-group mb-3">
            <input
              v-model="form.email"
              type="mail"
              class="form-control"
              name="email"
              placeholder="Email"
              required
              autofocus
            />
            <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input
              v-model="form.password"
              type="password"
              class="form-control"
              name="password"
              placeholder="Kata Sandi"
              required
              autofocus
            />
            <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label></label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button
                type="submit"
                class="btn btn-primary btn-block btn-flat button-prevent-multiple-submits"
              >
                <i class="fas fa-sign-in-alt"></i> Masuk
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      form: new Form({
        email: "",
        password: ""
      })
    };
  },
  methods: {
    loadData() {
      this.$Progress.start();
      console.log("Login Form");
      this.$Progress.finish();
    },
    login() {
      this.form
        //sesuaikan dengan nama yang ada di web.php untuk login saja
        .post("api/postlogin")
        .then(() => {
          window.location.href = "/";
          // router.push("kategori");
          // this.$router.push("kategori");
        })
        .catch();
    }
  },
  created() {
    this.loadData();
  }
};
</script>

