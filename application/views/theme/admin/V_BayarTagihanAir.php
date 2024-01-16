<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h6 class="card-title">Form Pembayaran Tagihan Pemakaian Air Pamsimas Gampong Peunayan Tahun 2024</h6>
                                    <a class="btn btn-sm btn-warning float-right" name="bayarLunas" id="bayarLunas">Bayar Lunas</a>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('C_TagihanAir/post'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                foreach ($record->result() as $r) { ?>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <table id="bayar" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nama Lengkap</th>
                                                                            <th>Nama Alias</th>
                                                                            <th>Bulan | Tahun</th>
                                                                            <th>Pemakaian</th>
                                                                            <th>Tagihan</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $r->nama_pelanggan; ?></td>
                                                                            <td><?php echo $r->nama_alias; ?></td>
                                                                            <td><?php echo $r->nama_bulan ?> - <?php echo $r->tahun ?></td>
                                                                            <td><?php echo $r->total_pakai ?> M<sup>3</sup></td>
                                                                            <td><?php echo "Rp " . number_format($r->jlh_tagihan, 0, ",", "."); ?></td>
                                                                            <?php
                                                                            if ($r->status == 'Belum Bayar') { ?>
                                                                                <td class="text-danger"><?php echo $r->status ?></td>
                                                                            <?php } elseif ($r->status == 'Belum Lunas') { ?>
                                                                                <td class="text-warning"><?php echo $r->status ?></td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" name="id_pakai" value=" <?php echo $r->id_pakai; ?>" readonly />
                                                                <input type="hidden" name="id_pelanggan" value=" <?php echo $r->id_pelanggan; ?>" readonly />
                                                                <input type="hidden" name="id_tagihan" value=" <?php echo $r->id_tagihan; ?>" readonly />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>Saldo</label>
                                                                    <input type="text" name="saldo" id="saldo" value="<?php echo $r->saldo; ?>" class="form-control" readonly />
                                                                    <input type="hidden" class="form-control" name="jlh_tagihan" id="jlh_tagihan" value=" <?php echo $r->jlh_tagihan; ?>" readonly />
                                                                    <input type="hidden" class="form-control" name="sisaSaldo" id="sisaSaldo" value="0" readonly />
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
                                                                        <option value="1" <?php if ($r->saldo > 0) {
                                                                                                echo "selected";
                                                                                            } ?>>Ya</option>
                                                                        <option value="2" <?php if ($r->saldo > 0) {
                                                                                                echo "disabled";
                                                                                            } ?>>Tidak</option>
                                                                    </select>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="col-sm-6">
                                                                <label>Status</label>
                                                                <input type="text" name="status" id="status" class="form-control" required="" readonly="" />
                                                            </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer modal-footer--sticky">
                                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




        <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#uangPembayaran").keyup(function() {

                    var jlh_tagihan = $("#jlh_tagihan").val();
                    var sisaTagihan = $("#sisaTagihan").val();
                    var saldo = $("#saldo").val();
                    var uangPembayaran = $("#uangPembayaran").val();
                    var uangKembalian = $("#uangKembalian").val();

                    var value = $('#uangPembayaran').val();
                    var length = value.length;

                    if (length > 0) {
                        if (parseInt(saldo) > parseInt(jlh_tagihan)) {
                            const p = $("#uangPembayaran").val();
                            const s = $("#saldo").val();
                            const t = $("#jlh_tagihan").val();

                            var sisaSaldo = (parseInt(p) + parseInt(s)) - parseInt(t);
                            if (s > 0) {
                                $("#sisaSaldo").val(sisaSaldo);
                                $("#sisaTagihan").val(0);
                                $("#uangKembalian").val(0);
                                $("#status").val("Lunas");
                            }

                        } else if (parseInt(saldo) < parseInt(jlh_tagihan)) {
                            const p = $("#uangPembayaran").val();
                            const s = $("#saldo").val();
                            const t = $("#jlh_tagihan").val();
                            const st = $("#sisaTagihan").val();
                            const ss = $("#sisaSaldo").val();

                            var uangBayar = parseInt(s) + parseInt(p);
                            if (uangBayar >= parseInt(t)) {
                                $("#sisaTagihan").val(0);
                                var kembalian = (parseInt(s) + parseInt(p)) - parseInt(t);
                                $("#uangKembalian").val(kembalian);
                                $("#status").val("Lunas");
                                $("#sisaSaldo").val(0);
                            } else if (uangBayar < parseInt(t)) {
                                var masihsisaTagihan = parseInt(t) - (parseInt(s) + parseInt(p));
                                $("#sisaTagihan").val(masihsisaTagihan);

                                $("#uangKembalian").val(0);
                                $("#status").val("Belum Lunas");
                                $("#sisaSaldo").val(0);
                            }

                        }
                    } else {
                        $("#sisaTagihan").val(0);
                        $("#uangKembalian").val(0);
                        $("#status").val("Belum Bayar");
                        $("#sisaSaldo").val(0);
                    }
                });
                $("#bayarLunas").on("click", function() {
                    var jlh_tagihan = $("#jlh_tagihan").val();
                    var jlh_tagihan = parseInt(jlh_tagihan);

                    var saldo = $("#saldo").val();
                    var saldo = parseInt(saldo);

                    var uangPembayaran = $("#uangPembayaran").val();
                    var uangPembayaran = parseInt(uangPembayaran);

                    var lunas = parseInt(jlh_tagihan) - parseInt(saldo);

                    if (jlh_tagihan == saldo) {
                        $("#uangPembayaran").val(0);
                    } else if (jlh_tagihan < saldo) {
                        $("#uangPembayaran").val(0);
                    } else {
                        $("#uangPembayaran").val(lunas);
                    }



                    const p = $("#uangPembayaran").val();
                    const s = $("#saldo").val();
                    var sisaSaldo = (parseInt(p) + parseInt(s)) - parseInt(jlh_tagihan);
                    $("#sisaSaldo").val(sisaSaldo);



                    $("#status").val("Lunas");
                    $("#sisaTagihan").val(0);
                    $("#uangKembalian").val(0);

                });
            });
        </script>