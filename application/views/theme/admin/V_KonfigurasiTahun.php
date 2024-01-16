  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
 <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#exampleModal">+</button>
                            <h3 class="card-title">Data Tahun Pamsimas</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <tr>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td class="text-center">
                                                <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editProvinsi"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                <a title="Hapus" class="btn btn-sm btn-outline-danger" href="" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
                                            </td>
                                        </tr>
                                   
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
          <!-- /.Left col -->

	</div>
        <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
 </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Provinsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Provinsi/post" method="POST">
                        <div class="form-group">
                            <label>Kode Provinsi </label>
                            <input type="text" name="id" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Nama Provinsi </label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Latitude </label>
                            <input type="text" name="lat" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Longitude </label>
                            <input type="text" name="lng" class="form-control" required="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    
        <div class="modal fade" id="editProvinsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Provinsi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="Provinsi/edit" method="POST">
                            <input type="hidden" name="id_provinsi" value="">

                            <div class="form-group">
                                <label>Nama Provinsi </label>
                                <input type="text" name="nama" value="" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Latitude </label>
                                <input type="text" name="lat" value="" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Longitude </label>
                                <input type="text" name="lng" value="" class="form-control" required="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>