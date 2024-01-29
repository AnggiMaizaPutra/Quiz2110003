<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=200>
                                </td>
                                <img src="<?= base_url() ?>/image/pandangan.jpg" width="100" alt="">
                                <td width=580>
                                    <center>
                                        <p>
                                        <h4> LAPORAN DATA PDAM </h4>
                                        </p>
                                        <p>
                                        <h5>Sungai Sapih, Kuranji Padang
                                        </h5>
                                        </p>
                                    </center>
                            </tr>
                            <td width=200></td>
                        </table>
                        <center>
                            <b> Tanggal Masuk : <?= date('d F Y', strtotime($tgla)) ?> Sampai Dengan
                                <?= date('d F Y', strtotime($tglb)) ?> </b>
                        </center>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <thead>
                            <table class="table table-bordered table-striped">
                                </td>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tgl Bayar </th>
                                    <th>Meter Bulan Ini</th>
                                    <th>Meter Bulan Lalu</th>
                                    <th>Tarif</th>
                                    <th>Jumlah Pemakaian</th>
                                    <th>Biaya Sampah</th>
                                    <th>Total Biaya</th>
                                </tr>
                        </thead>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $semua = 0;
                            foreach ($data as $val) {
                                $s = $val['totalbiaya'];
                                $semua = $s + $semua;
                                $no++; ?>
                                <tr role="row" class="odd">
                                    <td><?= $no; ?></td>
                                    <td><?= $val['idpelanggan'] ?></td>
                                    <td><?= $val['namapelanggan'] ?></td>
                                    <td><?= $val['tglbayar'] ?></td>
                                    <td><?= $val['meterblnini'] ?></td>
                                    <td><?= $val['meterblnlalu'] ?></td>
                                    <td><?= $val['tarif'] ?></td>
                                    <td><?= $val['jumlahpemakaian'] ?></td>
                                    <td><?= $val['biayasampah'] ?></td>
                                    <td><?= $val['totalbiaya'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="9">Total Pemasukan</th>
                                <th colspan=""><?= $semua ?></th>
                            </tr>
                        </tbody>
                        </table>
                        <br><br><br><br>
                        Padang, <?= date('d / M / y') ?>
                        <br><br><br>
                        Ketua <br>
                        BANG ALEX
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="printContent('div1')" class="btn btn-primary">
                        <i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<?= $this->endSection('') ?>