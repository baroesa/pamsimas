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
                              <h3 class="card-title">Data Pelanggan Pamsimas Gampong Peunayan Tahun 2024</h3>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                              <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Lengkap</th>
                                          <th>Nama Alias</th>
                                          <th>No. Hand Phone</th>
                                          <th>No. WhatsApp</th>
                                          <th>Dusun</th>
                                          <th>Layanan</th>
                                          <th>Satus</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($record->result() as $r) { ?>
                                          <tr>
                                              <td><?php echo $no ?></td>
                                              <td><?php echo $r->nama_pelanggan ?></td>
                                              <td><?php echo $r->nama_alias ?></td>
                                              <td><?php echo $r->no_hp ?></td>
                                              <td><?php echo $r->no_wa ?></td>
                                              <td><?php echo $r->dusun ?></td>
                                              <td><?php if ($r->id_layanan == 1) {
                                                        echo "Layanan Air 1";
                                                    } else {
                                                        echo "Layanan Air";
                                                    } ?></td>
                                              <td><?php if ($r->status == 1) {
                                                        echo "Aktif";
                                                    } else {
                                                        echo "Tidak Aktif";
                                                    } ?></td>
                                              <td class="text-center">
                                                  <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editPelanggan<?php echo $r->id_pelanggan; ?>"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                  <a title="Hapus" class="btn btn-sm btn-outline-danger" href="<?php echo site_url('C_Pelanggan/delete/' . $r->id_pelanggan); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
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

  <!-- Modal Tambah -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="C_Pelanggan/post" method="POST">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card">

                                  <div class="card-body">

                                      <div class="row">
                                          <div class="col-sm-6">
                                              <label>Nama Lengkap</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fa fa-user" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <input type="text" name="nama_pelanggan" class="form-control" required="" placeholder="Nama Lengkap">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <label>Nama Alias</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fa fa-user-secret"></i></span>
                                                  </div>
                                                  <input type="text" name="nama_alias" class="form-control" required="" placeholder="Nama Alias">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-sm-6">
                                              <label>Nomor Handphone</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <input type="number" name="no_hp" class="form-control" placeholder="Nomor Handphone">
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                              <label>Nomor WhatsApp</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <input type="number" name="no_wa" class="form-control" placeholder="Nomor Whatsapp">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-12">
                                              <label>Nama Dusun</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fa fa-address-card" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <select name="dusun" id="dusun" class="form-control" required="">
                                                      <option value="" selected disabled>Pilih Dusun</option>
                                                      <option value="1">Pante Bahagia</option>
                                                      <option value="2">Na Bahagia</option>
                                                      <option value="3">Muda Suara</option>
                                                      <option value="4">Balee Tanjong</option>
                                                  </select>

                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-sm-6">
                                              <label>Layanan Pamsimas</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fa fa-tint" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <select name="id_layanan" id="id_layanan" class="form-control" required="">
                                                      <option value="1" selected="">Layanan Air</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <label>Status Pelanggan</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="fa fa-star" aria-hidden="true"></i>
                                                      </span>
                                                  </div>
                                                  <select name="status" id="status" class="form-control" required="">

                                                      <option value="1" selected>Aktif</option>
                                                      <option value="2">Non Aktif</option>
                                                  </select>
                                              </div>
                                          </div>
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
      <div class="modal fade" id="editPelanggan<?php echo $r->id_pelanggan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Edit Data Pelanggan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="C_Pelanggan/edit" method="POST">
                          <input type="hidden" name="id_pelanggan" value="<?php echo $r->id_pelanggan; ?>">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="card">
                                      <div class="card-body">

                                          <div class="form-group">
                                              <label>Nama Lengkap</label>
                                              <input type="text" name="nama_pelanggan" value="<?php echo $r->nama_pelanggan; ?>" class="form-control" required="">
                                          </div>

                                          <div class="form-group">
                                              <label>Nama Alias</label>
                                              <input type="text" name="nama_alias" value="<?php echo $r->nama_alias; ?>" class="form-control" required="">
                                          </div>

                                          <div class="form-group">
                                              <label>No. Hand Phone</label>
                                              <input type="text" name="no_hp" value="<?php echo $r->no_hp; ?>" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label>No. WhatsApp</label>
                                              <input type="text" name="no_wa" value="<?php echo $r->no_wa; ?>" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label>Dusun</label>
                                              <input type="text" name="alamat" value="<?php echo $r->dusun; ?>" class="form-control" required="">
                                          </div>
                                          <div class="form-group">
                                              <label>Layanan</label>
                                              <select name="id_layanan" id="id_layanan" class="form-control">
                                                  <option value="<?php echo $r->id_layanan; ?>" selected="">Layanan Air 1</option>
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