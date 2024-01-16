<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <button class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#exampleModal">+</button>
                            <h3 class="card-title">Data Pemasukan Pamsimas Gampong Peunayan Tahun 2024</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($record->result() as $r) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $r->tanggal ?></td>
                                            <td><?php echo $r->keterangan ?></td>
                                            <td><?php echo $r->jumlah ?></td>
                                            <td class="text-center">
                                                <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit-<?php echo $r->id; ?>"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                <a title="Hapus" class="btn btn-sm btn-outline-danger" href="<?php echo site_url('C_Pemasukan/delete/' . $r->id); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
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

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="C_Pemasukan/post" method="POST">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" id="datemask" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-edit"></i></span>
                            </div>
                            <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan Pemasukan" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                            </div>
                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Pemasukan" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit-->
<?php $no = 1;
foreach ($record->result() as $r) : $no++ ?>
    <div class="modal fade" id="edit-<?php echo $r->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Edit Data Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="C_Pemasukan/edit" method="POST">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $r->id; ?>">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="datemask" name="tanggal" class="form-control" value="<?php echo $r->tanggal; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-edit"></i></span>
                                </div>
                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan Pemasukan" required><?php echo $r->keterangan; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                </div>
                                <input type="number" name="jumlah" class="form-control" value="<?php echo $r->jumlah; ?>" placeholder="Jumlah Pemasukan" required>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>