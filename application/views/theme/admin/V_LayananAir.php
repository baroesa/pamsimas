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
                              <button class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#exampleModal">+</button>
                              <h3 class="card-title">Tarif Air Pamsimas Gampong Peunayan Tahun 2024</h3>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                              <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Uraian Layanan</th>
                                          <th>Biaya Per M<sup>3</sup></sub></th>
                                          <th>Biaya Pemeliharaan</th>
                                          <th>Biaya Administrasi</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($record->result() as $r) { ?>
                                          <tr>
                                              <td><?php echo $no ?></td>
                                              <td><?php echo $r->uraian ?></td>
                                              <td><?php echo $r->biaya ?></td>
                                              <td><?php echo $r->pemeliharaan ?></td>
                                              <td><?php echo $r->adm ?></td>
                                              <td class="text-center">
                                                  <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editTarifAir<?php echo $r->id_layanan; ?>"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                  <a title="Hapus" class="btn btn-sm btn-outline-danger" href="<?php echo site_url('C_LayananAir/delete/' . $r->id_layanan); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
                                              </td>
                                          </tr>
                                      <?php $no++;
                                        } ?>
                                  </tbody>
                              </table>
                          </div>
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
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Layanan Air Pamsimas Gampong Peunayan Tahun 2024</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="C_LayananAir/post" method="POST">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-body">

                                      <div class="form-group">
                                          <label>Uraian Layanan</label>
                                          <input type="text" name="uraian" class="form-control" required="">
                                      </div>
                                      <div class="form-group">
                                          <label>Tarif Per M<sup>3</sup></label>
                                          <input type="number" name="biaya" class="form-control" required="">
                                      </div>
                                      <div class="form-group">
                                          <label>Biaya Pemeliharaan</label>
                                          <input type="number" name="pemeliharaan" class="form-control" required="">
                                      </div>
                                      <div class="form-group">
                                          <label>Biaya Administrasi</label>
                                          <input type="number" name="adm" class="form-control" required="">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
              </div>
              <div class="modal-footer modal-footer--sticky">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Edit-->
  <?php $no = 1;
    foreach ($record->result() as $r) : $no++ ?>
      <div class="modal fade" id="editTarifAir<?php echo $r->id_layanan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Edit Tarif Air</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="C_LayananAir/edit" method="POST">
                          <input type="hidden" name="id" value="<?php echo $r->id_layanan; ?>">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="form-group">
                                              <label>Uraian Layanan</label>
                                              <input type="text" name="uraian" value="<?php echo $r->uraian; ?>" class="form-control" required="">
                                          </div>

                                          <div class="form-group">
                                              <label>Tarif Per M3</label>
                                              <input type="number" name="biaya" value="<?php echo $r->biaya; ?>" class="form-control" required="">
                                          </div>

                                          <div class="form-group">
                                              <label>Biaya Pemeliharaan</label>
                                              <input type="number" name="pemeliharaan" value="<?php echo $r->pemeliharaan; ?>" class="form-control" required="">
                                          </div>
                                          <div class="form-group">
                                              <label>Biaya Administrasi</label>
                                              <input type="text" name="adm" value="<?php echo $r->adm; ?>" class="form-control" required="">
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                  </div>

                  <div class="modal-footer modal-footer--sticky">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      </div> <?php endforeach; ?>