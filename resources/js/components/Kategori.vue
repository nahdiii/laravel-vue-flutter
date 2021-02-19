<template>
  <div class="container">
    <!-- mt-3 adalah Margin Topnya 3 -->
    <div class="row mt-3 justify-content-center">
      <!--md adalah Medium-->
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Kategori (data ini juga muncul di gdrive.test)</h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-success" @click="tambahdata">
                  Tambah Kategori
                  <i class="fas fa-plus-square"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tr>
                      <th>
                        <center>User</center>
                      </th>
                      <th>
                        <center>Kategori</center>
                      </th>

                      <th style="width: 15%">
                        <center>Jumlah Berita</center>
                      </th>
                      <th style="width: 15%">
                        <center>Aksi</center>
                      </th>
                    </tr>

                    <tr v-for="items in kategoris" :key="items.id">
                      <td>{{items.user.name}}</td>
                      <td>{{items.namaKategori}}</td>

                      <td>
                        <center>{{items.jumlah}}</center>
                      </td>
                      <td>
                        <center>
                          <a href="#" @click="editData(items)" title="Edit Data">
                            <i class="fas fa-edit blue"></i>
                          </a>
                          |
                          <a
                            href="#"
                            @click="kirim(items)"
                            title="Disposisi Surat"
                          >
                            <i class="fas fa-share-square green">Kirim</i>
                          </a>
                          |
                          <a
                            href="#"
                            @click="deleteData(items.id)"
                            title="Hapus Data"
                          >
                            <i class="fas fa-trash-alt red"></i>
                          </a>
                        </center>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group"></div>
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
            <!--<h5 class="modal-title" id="tambahLabel" v-show="!editmode">Tambah Data Baru</h5>
            <h5 class="modal-title" id="tambahLabel" v-show="editmode">Rubah Data Prodi</h5>-->
            <h5 class="modal-title" id="tambahLabel" v-if="mode === 0">Tambah Data Kategori</h5>
            <h5 class="modal-title" id="tambahLabel" v-if="mode === 1">Ubah Data</h5>
            <h5 class="modal-title" id="tambahLabel" v-if="mode === 2">Disposisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form ref="form" @submit.prevent="simpan">
            <div class="modal-body" v-if="mode === 0">
              <div class="modal-body">
                <div class="form-group">
                  <input
                    v-model="form.namaKategori"
                    type="text"
                    name="namaKategori"
                    placeholder="Nama Kategori"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('namaKategori') }"
                  />
                  <has-error :form="form" field="namaKategori"></has-error>
                </div>
              </div>
            </div>
            <div class="modal-body" v-if="mode === 1">
              <div class="modal-body">
                <div class="form-group">
                  <input
                    v-model="form.namaKategori"
                    type="text"
                    name="namaKategori"
                    placeholder="Nama Kategori"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('namaKategori') }"
                  />
                  <has-error :form="form" field="namaKategori"></has-error>
                </div>
              </div>
            </div>
            <div class="modal-body" v-if="mode === 2">
              <div class="form-group">
                <input v-model="form.id" type="hidden" name="kategori_id" class="form-control" />
              </div>

              <div class="form-group">
                <label for="label">Kirim ke</label>
                <select class="form-control select2" style="width: 100%;" v-model="form.user_id">
                  <option disabled value>Pilih Pengguna</option>
                  <option v-for="item in pengguna" :key="item.id" :value="item.id">{{item.name}}</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai</button>
              <button type="submit" v-if="mode === 0" class="btn btn-success" :disabled="disabled">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>Simpan
              </button>
              <button type="submit" v-if="mode === 1" class="btn btn-primary" :disabled="disabled">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>Ubah
              </button>
              <button type="submit" v-if="mode === 2" class="btn btn-primary" :disabled="disabled">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>Kirim
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/Modal-->
  </div>
</template>


<script>
export default {
  data() {
    return {
      editmode: false,
      loading: false,
      disabled: false,
      mode: "",

      kategoris: {},
      pengguna: {},
      form: new Form({
        id: "",
        namaKategori: "",
        jumlah: "",
        user_id: "",
        kategori_id: ""
      })
    };
  },
  methods: {
    simpan() {
      if (this.mode === 0) {
        this.createData();
        console.log("simpan lampiran");
      } else if (this.mode === 1) {
        this.updateData();
        console.log("simpan Perubahan");
      } else if (this.mode === 2) {
        this.kirimdata();
        console.log("simpan Disposisi");
      }
      //console.log("simpan");
    },
    tambahdata() {
      // this.editmode = false;
      this.mode = 0;
      this.form.reset();
      $("#tambah").modal("show");
    },

    editData(items) {
      this.mode = 1;
      this.form.reset();
      $("#tambah").modal("show");
      this.form.fill(items);
    },
    kirim(items) {
      this.mode = 2;
      this.form.reset();
      $("#tambah").modal("show");
      //console.log("modal kirim");
      this.form.fill(items);
    },
    loadData() {
      this.$Progress.start();
      axios.get("api/kategoris").then(({ data }) => (this.kategoris = data));
      axios.get("api/pengguna").then(({ data }) => (this.pengguna = data));
      this.$Progress.finish();
    },
    createData() {
      this.disabled = true;
      this.loading = true;
      this.form
        .post("api/kategoris")
        .then(() => {
          //sesuaikan dengan nama yang ada di api.php

          this.$Progress.start();
          this.disabled = false;
          this.loading = false;
          Fire.$emit("refreshData");
          $("#tambah").modal("hide");

          Toast.fire({
            icon: "success",
            title: "Data Berhasi Tersimpan"
          });
          this.$Progress.finish();
        })
        .catch();
    },
    updateData() {
      this.disabled = true;
      this.loading = true;
      this.form
        .put("api/kategoris/" + this.form.id)
        .then(() => {
          this.$Progress.start();
          $("#tambah").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Data Berhasil Terubah"
          });
          this.$Progress.finish();
          this.disabled = false;
          this.loading = false;
          Fire.$emit("refreshData");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    kirimdata() {
      this.$Progress.start();
      this.disabled = true;
      this.loading = true;

      this.form
        .post("api/datakirim")
        .then(() => {
          $("#tambah").modal("hide");
          Fire.$emit("refreshData");
          this.disabled = false;
          this.loading = false;
          this.$Progress.finish();
        })
        .catch();
      //console.log("disposisi surat berhasil");
    },
    deleteData(id) {
      Swal.fire({
        title: "Anda Yakin Ingin Menghapus Data Ini ?",
        text: "Kilit Batal Untuk Membetalkan Penghapusan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus"
      }).then(result => {
        if (result.value) {
          this.form
            .delete("api/kategoris/" + id)
            .then(() => {
              Swal.fire("Terhapus", "Data Anda Sudah Tehapus", "success");
              Fire.$emit("refreshData");
            })

            .catch(() => {
              Swal.fire("Gagal", "Data Gagal Terhapus", "warning");
            });
        }
      });
    }
  },
  created() {
    this.loadData();
    Fire.$on("refreshData", () => {
      this.loadData();
    });
  }
};
</script>
