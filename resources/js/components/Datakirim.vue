<template>
  <div class="container">
    <!-- mt-3 adalah Margin Topnya 3 -->
    <div class="row mt-3 justify-content-center">
      <!--md adalah Medium-->
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Kirim Masuk</h3>
              <!-- tools box -->

              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tr>
                      <th>
                        <center>User Id</center>
                      </th>

                      <th style="width: 15%">
                        <center>Kategori Id</center>
                      </th>
                    </tr>

                    <tr v-for="items in datakirim.data" :key="items.id">
                      <td>{{items.user.name}}</td>

                      <td>
                        <center>{{items.kategori.namaKategori}}</center>
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

    <!--/Modal-->
  </div>
</template>


<script>
export default {
  data() {
    return {
      datakirim: {}
    };
  },
  methods: {
    loadData() {
      this.$Progress.start();

      axios.get("api/datakirim").then(({ data }) => (this.datakirim = data));
      this.$Progress.finish();
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
