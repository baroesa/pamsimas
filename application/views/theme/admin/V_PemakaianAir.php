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
                    <div class="card card-success">
                        <div class="card-header">
                            <button class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#exampleModal">+</button>
                            <h3 class="card-title">Data Pemakaian Air Pamsimas Gampong Peunayan Tahun 2024</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Nama Pelanggan</th>
                                        <th> Nama Alias</th>
                                        <th>Bulan - Tahun</th>
                                        <th>Meter Awal</th>
                                        <th>Meter Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($record->result() as $r) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $r->nama_pelanggan; ?></td>
                                            <td><?php echo $r->nama_alias; ?></td>
                                            <td><?php echo $r->nama_bulan ?> - <?php echo $r->tahun ?></td>
                                            <td><?php echo $r->awal ?> M<sup>3</sup></td>
                                            <td><?php echo $r->akhir ?> M<sup>3</sup></td>
                                            <td>
                                                <?php
                                                if ($r->status == 'Belum Bayar') { ?>
                                                    <!-- <a title="Edit" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit<?php echo $r->id_pakai; ?>"><i class="glyphicon glyphicon-pencil">Edit</i></a> -->
                                                    <a title="Hapus" class="btn btn-sm btn-outline-danger" href="<?php echo site_url('C_PemakaianAir/delete/' . $r->id_pakai); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-remove">Delete</i></a>
                                                <?php } elseif ($r->status == 'Belum Lunas') { ?>
                                                    <span class="text-warning">Belum Lunas</span>
                                                <?php } else { ?>
                                                    <span class="text-primary"">Lunas</span>
                                            </td>
                                        <?php } ?>


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
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Tambah Data Pemakaian Air Pamsimas Gampong Peunayan Tahun 2024</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="C_PemakaianAir/post" method="POST" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-group">
                                                                                                            <input class="form-control" type="hidden" name="id_pakai" value="<?php echo mt_rand(); ?>" readonly required />
                                                                                                            <input type="hidden" class="form-control" name="biaya" id="biaya" readonly="" required />
                                                                                                            <input type="hidden" class="form-control" name="adm" id="adm" readonly="" required />
                                                                                                            <input type="hidden" class="form-control" name="pemeliharaan" id="pemeliharaan" readonly="" required />
                                                                                                            <input type="hidden" name="harga" id="harga" class="form-control" readonly="">

                                                                                                            <label>Pelanggan</label>
                                                                                                            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                                                                                                <option value="" disabled selected>Pilih Pelanggan</option>
                                                                                                                <?php
                                                                                                                foreach ($pelanggan as $row) {
                                                                                                                    echo '<option value="' . $row->id_pelanggan . '">' . $row->nama_pelanggan . ' | ' . $row->nama_alias . '</option>';
                                                                                                                }
                                                                                                                ?>

                                                                                                            </select>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-group">
                                                                                                            <label>Bulan</label>
                                                                                                            <select name="id_bulan" id="id_bulan" class="form-control" required>
                                                                                                                <option value="" disabled selected>Pilih Bulan</option>
                                                                                                                <?php
                                                                                                                foreach ($bulan as $row) {
                                                                                                                    echo '<option value="' . $row->id_bulan . '">' . $row->nama_bulan . '</option>';
                                                                                                                }
                                                                                                                ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label>Tahun</label>
                                                                                                            <input type="number" name="tahun" value="<?php echo date("Y") ?>" class="form-control" required="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-sm-6">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-group">
                                                                                                            <label>Meteran Bulan Lalu</label>
                                                                                                            <input type="text" name="awal" id="awal" class="form-control" placeholder="Meteran bulan lalu" required />
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label>Meteran Bulan Ini</label>
                                                                                                            <input type="number" name="akhir" id="akhir" class="form-control" placeholder="Meteran bulan ini" required />
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group mb-0">
                                                                                            <label>Pemakaian (Bulan Ini - Bulan lalu)</label>
                                                                                            <input type="number" name="total" id="total" class="form-control" placeholder="Pemakaian bulan ini" readonly="" required />
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
                            <div class="modal fade" id="edit<?php echo $r->id_pakai; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fa fa-database text-success"></i> Edit Data Pemakaian Air Pamsimas Gampong Peunayan Tahun 2024</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="C_PemakaianAir/edit" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <input class="form-control" type="hidden" name="id_pakai" value=" <?php echo $r->id_pakai; ?>" readonly required />
                                                                                    <input type="hidden" class="form-control" name="biaya" id="biaya" readonly="" required />
                                                                                    <input type="hidden" class="form-control" name="adm" id="adm" readonly="" required />
                                                                                    <input type="hidden" class="form-control" name="pemeliharaan" id="pemeliharaan" readonly="" required />
                                                                                    <input type="hidden" name="harga" id="harga" class="form-control" readonly="">

                                                                                    <label>Nama Pelanggan</label>
                                                                                    <input type="hidden" class="form-control" name="id_pelanggan" value=" <?php echo $r->id_pelanggan; ?>" readonly="" required />
                                                                                    <input type="text" class="form-control" name="nama_pelanggan" value=" <?php echo $r->nama_pelanggan; ?>" readonly="" required />

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label>Bulan</label>
                                                                                    <select name="id_bulan" id="id_bulan" class="form-control" required>
                                                                                        <option value="" disabled selected>Pilih Bulan</option>
                                                                                        <?php
                                                                                        foreach ($bulan as $row) {
                                                                                            echo '<option value="' . $row->id_bulan . '">' . $row->nama_bulan . '</option>';
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Tahun</label>
                                                                                    <input type="number" name="tahun" value="<?php echo $r->tahun; ?>" class="form-control" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label>Meteran Bulan Lalu</label>
                                                                                    <input type="text" name="awal" value="<?php echo $r->awal; ?>" id="awal" class="form-control" placeholder="Meteran bulan lalu" required />
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>Meteran Bulan Ini</label>
                                                                                    <input type="number" name="akhir" value="<?php echo $r->akhir; ?>" id="akhir" class="form-control" placeholder="Meteran bulan ini" required />
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <label>Pemakaian (Bulan Ini - Bulan lalu)</label>
                                                                    <input type="number" name="total" value="<?php echo $r->total_pakai; ?>" id="total" class="form-control" required />
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
                            </div><?php endforeach; ?>




                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#id_pelanggan').change(function() {
                                    var id_pelanggan = $(this).val();
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>C_PemakaianAir/ambilMeterAwal",
                                        method: "POST",
                                        data: {
                                            id_pelanggan: id_pelanggan
                                        },
                                        success: function(data) {
                                            $('#awal').val(data);
                                        }
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $('#id_pelanggan').change(function() {
                                    var id_pelanggan = $(this).val();
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>C_PemakaianAir/ambilBiayaLayanan",
                                        method: "POST",
                                        data: {
                                            id_pelanggan: id_pelanggan

                                        },
                                        success: function(data) {
                                            $('#biaya').val(data);
                                        }
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $('#id_pelanggan').change(function() {
                                    var id_pelanggan = $(this).val();
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>C_PemakaianAir/ambilAdmLayanan",
                                        method: "POST",
                                        data: {
                                            id_pelanggan: id_pelanggan

                                        },
                                        success: function(data) {
                                            $('#adm').val(data);
                                        }
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $('#id_pelanggan').change(function() {
                                    var id_pelanggan = $(this).val();
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>C_PemakaianAir/ambilPemeliharaanLayanan",
                                        method: "POST",
                                        data: {
                                            id_pelanggan: id_pelanggan

                                        },
                                        success: function(data) {
                                            $('#pemeliharaan').val(data);
                                        }
                                    });
                                });
                            });
                        </script>



                        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#akhir, #awal, #biaya, #adm, #pemeliharaan").keyup(function() {
                                    var awal = $("#awal").val();
                                    var akhir = $("#akhir").val();
                                    var awal = parseInt(awal);
                                    var akhir = parseInt(akhir);
                                    var total = parseInt(akhir) - parseInt(awal);
                                    $("#total").val(total);

                                    var biaya = $("#biaya").val();
                                    var adm = $("#adm").val();
                                    var pemeliharaan = $("#pemeliharaan").val();
                                    var total = $("#total").val();
                                    var harga = (parseInt(total) * (parseInt(biaya)) + parseInt(adm) + parseInt(pemeliharaan));
                                    $("#harga").val(harga);
                                });
                            });
                        </script>