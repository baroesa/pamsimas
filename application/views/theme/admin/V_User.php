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
                      <div class="card card-primary">
                          <div class="card-header">
                              <button class="btn  btn-warning btn-sm float-right" data-toggle="modal" data-target="#exampleModal">+</button>
                              <h3 class="card-title">Data Pengguna Aplikasi Pamsimas Gampong Peunayan Tahun 2024</h3>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                              <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>User Name</th>
                                          <th>Nama Lengkap</th>
                                          <th>No. Hand Phone</th>
                                          <th>No. WhatsApp</th>
                                          <th>Dusun</th>
                                          <th>Level</th>
                                          <th>Satus</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($record->result() as $r) { ?>
                                          <tr>
                                              <td><?php echo $no ?></td>
                                              <td><?php echo $r->username ?></td>
                                              <td><?php echo $r->nama ?></td>
                                              <td><?php echo $r->no_hp ?></td>
                                              <td><?php echo $r->no_wa ?></td>
                                              <td><?php echo $r->dusun ?></td>
                                              <td><?php if ($r->level == 1) {
                                                        echo "Admin";
                                                    } else if ($r->level == 2) {
                                                        echo "Pengurus";
                                                    } else {
                                                        echo "Pegawai";
                                                    } ?></td>
                                              <td><?php if ($r->status == 1) {
                                                        echo "Aktif";
                                                    } else {
                                                        echo "Tidak Aktif";
                                                    } ?></td>
                                              <td class="text-center">
                                                  <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editPengguna<?php echo $r->id; ?>"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                  <a title="Hapus" class="btn btn-sm btn-outline-danger" href="<?php echo site_url('C_User/delete/' . $r->id); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
                                              </td>
                                          </tr>
                                      <?php $no++;
                                        } ?>
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
      <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="C_User/post" method="POST">
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i class="nav-icon fa fa-lock text-danger"></i> Login Details</h3>
                                  </div>
                                  <div class="card-body">

                                      <div class="form-group">
                                          <label>User Name</label>
                                          <input type="text" name="username" class="form-control" required="">
                                      </div>

                                      <div class="form-group">
                                          <label>Password</label>
                                          <input type="text" name="password" class="form-control" required="">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i class="nav-icon fa fa-cog text-warning"></i> Role Details</h3>
                                  </div>
                                  <div class="card-body">

                                      <div class="form-group">
                                          <label>Level</label>
                                          <select name="level" id="level" class="form-control">
                                              <option value="1" selected="">Admin</option>
                                              <option value="2">Pengurus</option>
                                              <option value="3">Pegawai</option>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Status</label>
                                          <select name="status" id="status" class="form-control">
                                              <option value="1" selected="">Aktif</option>
                                              <option value="2">Non Aktif</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title"><i class="nav-icon fa fa-user text-primary"></i> User Details</h3>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label>Nama Lengkap </label>
                                          <input type="text" name="nama" class="form-control" required="">
                                      </div>


                                      <div class="form-group">
                                          <label>No Hp </label>
                                          <input type="text" name="no_hp" class="form-control" required="">
                                      </div>
                                      <div class="form-group">
                                          <label>No wa </label>
                                          <input type="text" name="no_wa" class="form-control" required="">
                                      </div>
                                      <div class="form-group">
                                          <label>Dusun </label>
                                          <textarea type="text" class="form-control" name="dusun" id="formClient-Address" placeholder="Enter Address" rows="3"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>


              </div>
              <div class="modal-footer modal-footer--sticky">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <!--<input type="submit" name="submit" value="submit">-->
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Edit-->
  <?php $no = 1;
    foreach ($record->result() as $r) : $no++ ?>
      <div class="modal fade" id="editPengguna<?php echo $r->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Pengguna</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="C_User/edit" method="POST">
                          <input type="hidden" name="id" value="<?php echo $r->id; ?>">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="card">
                                      <div class="card-header">
                                          <h3 class="card-title"><i class="nav-icon fa fa-lock text-danger"></i> Login Details</h3>
                                      </div>
                                      <div class="card-body">

                                          <div class="form-group">
                                              <label>User Name</label>
                                              <input type="text" name="username" value="<?php echo $r->username; ?>" class="form-control" required="">
                                          </div>

                                          <div class="form-group">
                                              <label>Password</label>
                                              <input type="text" name="password" class="form-control" required="">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="card">
                                      <div class="card-header">
                                          <h3 class="card-title"><i class="nav-icon fa fa-cog text-warning"></i> Role Details</h3>
                                      </div>
                                      <div class="card-body">

                                          <div class="form-group">
                                              <label>Level</label>
                                              <select name="level" id="level" class="form-control">
                                                  <option value="1" selected="">Admin</option>
                                                  <option value="2">Pengurus</option>
                                                  <option value="3">Pegawai</option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label>Status</label>
                                              <select name="status" id="status" class="form-control">
                                                  <option value="1" selected="">Aktif</option>
                                                  <option value="2">Non Aktif</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="card">
                                      <div class="card-header">
                                          <h3 class="card-title"><i class="nav-icon fa fa-user text-primary"></i> User Details</h3>
                                      </div>
                                      <div class="card-body">
                                          <div class="form-group">
                                              <label>Nama Lengkap </label>
                                              <input type="text" name="nama" value="<?php echo $r->nama; ?>" class="form-control" required="">
                                          </div>


                                          <div class="form-group">
                                              <label>No Hp </label>
                                              <input type="text" name="no_hp" value="<?php echo $r->no_hp; ?>" class="form-control" required="">
                                          </div>
                                          <div class="form-group">
                                              <label>No wa </label>
                                              <input type="text" name="no_wa" value="<?php echo $r->no_wa; ?>" class="form-control" required="">
                                          </div>
                                          <div class="form-group">
                                              <label>Dusun </label>
                                              <input type="text" class="form-control" name="dusun" value="<?php echo $r->dusun; ?>" id="alamat"></input>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>


                  </div>
                  <div class="modal-footer modal-footer--sticky">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <!--<input type="submit" name="submit" value="submit">-->
                      <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      </div> <?php endforeach; ?>