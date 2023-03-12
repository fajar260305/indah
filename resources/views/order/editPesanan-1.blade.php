<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      @include('komponen.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('komponen.navbar')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                <!-- <h5>Tambah Transaksi</h5> -->
              </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Transaksi</h4>
                        <form class="form-sample" action="/pesanan/edit/{{ $pesanan->id }}" method="post">
                          @csrf
                          @method('put')
                          <p class="card-description"> Personal info </p>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nama_pelanggan" value="{{ $pesanan->nama_pelanggan }}"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Paket</label>
                                <div class="col-sm-9">
                                  <select class="form-control @error('paket_id') is-invalid @enderror" name="paket_id">
                                    <option value="{{ $pesanan->paket->id }}" selected>{{ $pesanan->paket->nama_paket }}</option>
                                    @foreach ($pakets as $paket)
                                      <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                    @endforeach
                                  </select>
                                  @error('paket_id')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" value="{{ $pesanan->tgl_masuk }}" type="date" placeholder="dd/mm/yyyy" name="tgl_masuk"/>
                                    @error('tgl_masuk')
                                      <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Diskon</label>
                                  <div class="col-sm-9">
                                    <input type="nubmer" class="form-control @error('diskon') is-invalid @enderror " name="diskon" value="{{ $pesanan->diskon }}" name="diskon"/>
                                    @error('diskon')
                                      <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Qty</label>
                                <div class="col-sm-4">
                                  <input type="nubmer" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $pesanan->qty }}"  name="qty"/>
                                  @error('qty')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <button type="submit" class="btn btn-primary btn-fw mx-2" >Tambah</button>
                        </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/chart.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>