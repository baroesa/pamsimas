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
                            <h3 class="card-title">Data Tagihan Pemakaian Air Pamsimas Gampong Peunayan Tahun 2024</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Bulan - Tahun</th>
                                        <th>Meter Awal</th>
                                        <th>Meter Akhir</th>
                                        <th>Pemakaian</th>
                                        <th>Tagihan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($record->result() as $r) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $r->nama_pelanggan ?></td>
                                            <td><?php echo $r->nama_bulan ?> - <?php echo $r->tahun ?></td>
                                            <td><?php echo $r->awal ?> M<sup>3</sup></td>
                                            <td><?php echo $r->akhir ?> M<sup>3</sup></td>
                                            <td><?php echo $r->total_pakai ?> M<sup>3</sup></td>
                                            <td><?php echo "Rp " . number_format($r->jlh_tagihan, 0, ",", "."); ?></td>
                                            <td><?php echo $r->status ?></td>
                                            <td>

                                                <?php
                                                if ($r->status == 'Belum Bayar') { ?>
                                                    <a title="Bayar" class="btn btn-sm btn-outline-success" href="<?php echo site_url('C_TagihanAir/bayar/' . $r->id_pakai); ?>">
                                                        <i class="nav-icon far fa-money-bill-alt"> Bayar</i></a>
                                                <?php } elseif ($r->status == 'Belum Lunas') { ?>
                                                    <a title="Bayar" class="btn btn-sm btn-outline-warning" href="<?php echo site_url('C_TagihanAir/bayar/' . $r->id_pakai); ?>">
                                                        <i class="nav-icon far fa-money-bill-alt"> Bayar Sisa</i></a>

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