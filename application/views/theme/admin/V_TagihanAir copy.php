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
                    <div class="card card-info">
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
                                                    <a title="Bayar" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#bayar-<?php echo $r->id_pakai; ?>">
                                                        <i class="nav-icon far fa-money-bill-alt"> Bayar</i></a>
                                                <?php } elseif ($r->status == 'Belum Lunas') { ?>
                                                    <a title="Bayar" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#bayar-<?php echo $r->id_pakai; ?>">
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


<!-- Modal Bayar-->
<?php
foreach ($record->result() as $r) { ?>
    <div class="modal fade" name="bayar" id="bayar-<?php echo $r->id_pakai; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon far fa-money-bill-alt text-success"> </i> Pembayaran Tagihan Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="C_TagihanAir/post" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <table style="width:40%">
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <td>:</td>
                                                        <td><?php echo $r->nama_pelanggan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bulan | Tahun</th>
                                                        <td>:</td>
                                                        <td><?php echo $r->nama_bulan ?> - <?php echo $r->tahun ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pemakaian</th>
                                                        <td>:</td>
                                                        <td><?php echo $r->total_pakai ?> M<sup>3</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tagihan</th>
                                                        <td>:</td>
                                                        <td><?php echo "Rp " . number_format($r->jlh_tagihan, 0, ",", "."); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>:</td>
                                                        <td class="text-danger"><?php echo $r->status ?></td>
                                                    </tr>
                                                </table>
                                                <input type="hidden" name="id_pakai" value=" <?php echo $r->id_pakai; ?>" readonly />
                                                <input type="hidden" name="id_pelanggan" value=" <?php echo $r->id_pelanggan; ?>" readonly />
                                                <input type="hidden" name="id_tagihan" value=" <?php echo $r->id_tagihan; ?>" readonly />

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn btn-sm btn-success float-right" name="bayarLunas" id="bayarLunas">Bayar Lunas</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Saldo</label>
                                                        <input type="text" name="saldo" id="saldo" value="<?php echo $r->saldo; ?>" class="form-control" readonly />
                                                        <input type="hidden" class="form-control" id="jlh_tagihan" value=" <?php echo $r->jlh_tagihan; ?>" readonly />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Uang Pembayaran</label>
                                                        <input type="number" name="uangPembayaran" id="uangPembayaran" class="form-control" required="">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Sisa Tagihan</label>
                                                        <input type="text" name="sisaTagihan" id="sisaTagihan" value="0" class="form-control" required="" readonly="" />

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Uang Kembalian</label>
                                                        <input type="text" name="uangKembalian" id="uangKembalian" value="0" class="form-control" required="" readonly="" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Tambah Ke Saldo</label>
                                                        <select name="tambahSaldo" class="form-control" required>
                                                            <option value="1">Ya</option>
                                                            <option value="2" selected>Tidak</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label>Status</label>
                                                        <input type="text" name="status" id="status" class="form-control" required="" readonly="" />
                                                    </div>
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
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#uangPembayaran").keyup(function() {
            var jlh_tagihan = $("#jlh_tagihan").val();
            var saldo = $("#saldo").val();
            var uangPembayaran = $("#uangPembayaran").val();
            var sisaTagihan = $("#sisaTagihan").val();
            var uangKembalian = $("#uangKembalian").val();




            if ((parseInt(saldo) + parseInt(uangPembayaran)) >= parseInt(jlh_tagihan)) {
                var uangBayar = parseInt(saldo) + parseInt(uangPembayaran);
                var masihsisaTagihan = 0;
                $("#sisaTagihan").val(masihsisaTagihan);
                var kembalian = (parseInt(saldo) + parseInt(uangPembayaran)) - parseInt(jlh_tagihan);
                $("#uangKembalian").val(kembalian);
                $("#status").val("Lunas");
            } else if (parseInt(saldo) + parseInt(uangPembayaran) < parseInt(jlh_tagihan)) {
                var masihsisaTagihan = parseInt(jlh_tagihan) - (parseInt(saldo) + parseInt(uangPembayaran));
                $("#sisaTagihan").val(masihsisaTagihan);
                var kembalian = 0;
                $("#uangKembalian").val(kembalian).toLocaleString();
                $("#status").val("Belum Lunas");
            }
            /*
                        if (document.getElementById("uangPembayaran").value.length == 0) {
                            $("#sisaTagihan").val(0);
                            $("#uangKembalian").val(0);
                        } */
        });

        $("#bayarLunas").on("click", function() {
            var jlh_tagihan = $("#jlh_tagihan").val();
            var jlh_tagihan = parseInt(jlh_tagihan);

            $("#uangPembayaran").val(jlh_tagihan);
            $("#status").val("Lunas");
            $("#sisaTagihan").val(0);
            $("#uangKembalian").val(0);

        });
    });
</script>
<script>
    $(document).on("click", [name = "bayar"], function() {
        $(this).focus(function() {
            // alert('do something');
        });
    });
</script>