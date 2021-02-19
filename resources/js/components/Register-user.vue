<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">
              Data
              <small>Pengguna Surat</small>
            </h3>
            <!-- tools box -->
            <div class="card-tools">
              <button type="button" class="btn btn-success" @click="modalBaru">
                <i class="fas fa-plus-square"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="mb-3">
              <table class="table table-bordered">
                <tr>
                  <th>
                    <center>Nama Pengguna</center>
                  </th>
                  <th>
                    <center>Level</center>
                  </th>

                  <th style="width: 15%">
                    <center>Email</center>
                  </th>
                  <th style="width: 15%">
                    <center>Aksi</center>
                  </th>
                </tr>

                <tr v-for="dtPengguna in users" :key="dtPengguna.id">
                  <td>{{dtPengguna.name}}</td>
                  <td>{{dtPengguna.level}}</td>

                  <td>{{dtPengguna.email}}</td>
                  <td>
                    <center>
                      <a href="#" @click="editData(dtPengguna)" title="Edit Data">
                        <i class="fas fa-edit blue"></i>
                      </a>
                      |
                      <a
                        href="#"
                        @click="deletePengguna(dtPengguna.id)"
                        title="Hapus Data"
                      >
                        <i class="fas fa-trash-alt red"></i>
                      </a>
                    </center>
                  </td>
                </tr>
              </table>
            </div>
            <!-- <div class="card-footer">
              <pagination :data="users" @pagination-change-page="getResults"></pagination>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="tambah"
      tabindex="-1"
      role="dialog"
      aria-labelledby="tambahLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahLabel" v-show="!editmode">Tambah Data Baru</h5>
            <h5 class="modal-title" id="tambahLabel" v-show="editmode">Ubah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? editPengguna() : createPengguna()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Nama Depan"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.nameBelakang"
                  type="text"
                  name="nameBelakang"
                  placeholder="Nama Belakang"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nameBelakang') }"
                />
                <has-error :form="form" field="nameBelakang"></has-error>
              </div>
              <div class="form-group">
                <select
                  v-model="form.level"
                  class="form-control select2"
                  style="width: 100%;"
                  id="level_id"
                  name="level_id"
                >
                  <option value hidden>Silahkan Pilih Level</option>
                  <option value="sa">Admin</option>
                  <option value="user">User</option>
                </select>
                <has-error :form="form" field="level_id"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.email"
                  type="text"
                  name="Email"
                  placeholder="Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  placeholder="Password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
              <button v-show="editmode" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      users: {},

      form: new Form({
        id: "",
        name: "",
        nameBelakang: "",
        level: "",
        email: "",
        password: ""
      })
    };
  },
  methods: {
    modalBaru() {
      this.editmode = false;
      this.form.reset();
      $("#tambah").modal("show");
    },
    editData(dtPengguna) {
      this.editmode = true;
      this.form.reset();
      $("#tambah").modal("show");
      this.form.fill(dtPengguna);
    },

    deletePengguna(id) {
      Swal.fire({
        title: "Anda Yakin Ingin Menghapus Data Ini ?",
        text: "Kilit Batal Untuk Membetalkan Penghapusan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/pengguna/" + id)
            .then(() => {
              Swal.fire("Terhapus", "Data Anda Sudah Tehapus", "success");
              Fire.$emit("refreshData");
            })

            .catch(() => {
              Swal.fire("Gagal", "Data Gagal Terhapus", "warning");
            });
        }
      });
    },
    loadPengguna() {
      axios.get("api/pengguna").then(({ data }) => (this.users = data));
    },

    createPengguna() {
      this.form
        .post("api/pengguna")
        .then(() => {
          //sesuaikan dengan nama yang ada di api.php

          this.$Progress.start();
          Fire.$emit("refreshData");
          $("#tambah").modal("hide");

          Toast.fire({
            type: "success",
            title: "Data Berhasi Tersimpan"
          });
          this.$Progress.finish();
        })
        .catch();
    },
    editPengguna() {
      this.form
        .put("api/pengguna/" + this.form.id)
        .then(() => {
          this.$Progress.start();
          $("#tambah").modal("hide");
          Toast.fire({
            type: "success",
            title: "Data Berhasi Terubah"
          });
          this.$Progress.finish();
          Fire.$emit("refreshData");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    }
    // getResults(page = 1) {
    //   axios.get("api/pengguna?page=" + page).then(Response => {
    //     this.$Progress.start();
    //     this.users = Response.data;
    //     this.$Progress.finish();
    //   });
    // }
  },

  created() {
    this.loadPengguna();
    Fire.$on("refreshData", () => {
      this.loadPengguna();
      //this.loadProdi();
    });
    //setInterval(() => this.loadProdi(), 3);
  }
};
</script>
