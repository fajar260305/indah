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
                <div class="col-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Paket</h4>
                        <form class="form-sample" action="/paket/edit/{{ $paket->id }}" method="post">
                          @csrf
                          @method('put')
                          <p class="card-description"> Personal info </p>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Nama Paket</label>
                                <div class="col-sm-9">
                                  <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="form-control" autofocus/>
                                  <input type="hidden" name="paket" value="{{ $paket->nama_paket }}" class="form-control" autofocus/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Batas Waktu</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="batas_waktu" value="{{ $batas }}" type="number"/>
                                </div>
                                <div class="col-sm-3">
                                  <select class="form-control" name="waktu">
                                    <option value="{{ $waktu }}">{{ $waktu }}</option>
                                    <option value="jam">Jam</option>
                                    <option value="Hari">Hari</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 ">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Harga</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" name="harga" value="{{ $paket->harga }}" type="number"/>
                                  </div>
                                </div>
                              </div>
                              {{-- <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Qty</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" />
                                  </div>
                                </div>
                              </div> --}}
                          </div>
                          <div class="row justify-content-end">
                            <div class="col-md-4 ms-4" >
                              <button type="submit" class="btn btn-primary btn-fw me-5" style="margin-left: 26px;">Edit</button>
                            </div>
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