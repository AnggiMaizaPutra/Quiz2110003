<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-e header-title">Data Transaksi </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="dataagenda">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>nama </th>
                                                <th>Tarif</th>
                                                <th>Tgl Bayar</th>
                                                <th>Meter Bulan Ini</th>
                                                <th>Meter Bulan Lalu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($transaksi as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['nama'] ?></td>
                                                    <td><?= $val['tarif'] ?></td>
                                                    <td><?= $val['tglbayar'] ?></td>
                                                    <td><?= $val['meterblnini'] ?></td>
                                                    <td><?= $val['meterblnlalu'] ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<form action="/transaksi/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Apakah Yakin Menghapus Data Ini? </h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Form Tambah -->
<form action="/transaksi/save" method="post" name="addModal">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Tarif -->
        <div class="modal fade" id="modal_tarif" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Tarif</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Klass</th>
                                    <th>Tarif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($tarif as $d) :
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $d->idtarif ?></td>
                                        <td><?= $d->klass ?></td>
                                        <td><?= $d->tarif ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="return pilih_tarif('<?= $d->idtarif ?>','<?= $d->klass ?>')">Pilih</button>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Tarif -->
        <!-- Modal Pelanggan -->
        <div class="modal fade" id="modal_pelanggan" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Pelanggan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama pelanggan </th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($pelanggan as $d) :
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $d->idpel ?></td>
                                        <td><?= $d->nama ?></td>
                                        <td><?= $d->nohp ?></td>
                                        <td><?= $d->alamat ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="return pilih_pelanggan('<?= $d->idpel ?>','<?= $d->nama ?>','<?= $d->nohp ?>','<?= $d->alamat ?>')">Pilih</button>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Pelanggan -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal Bayar</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pelanggan</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_pelanggan" class="btn btn-xs btn-primary">Pelanggan</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idpel" readonly id="idpel" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>nama pelanggan </label>
                                    <input type="text" readonly id="nama" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tarif</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_tarif" class="btn btn-xs btn-primary">Tarif</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idtarif" readonly id="idtarif" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Klass</label>
                                    <input type="text" readonly id="klass" class="form-control " name="klass">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Meter Bulan Ini</label>
                        <input type="text" class="form-control meterblnini" name="meterblnini" id="meterblnini">
                    </div>
                    <div class="col-md-12">
                        <label>Meter Bulan Lalu</label>
                        <input type="text" class="form-control meterblnlalu" name="meterblnlalu" id="meterblnlalu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    //script datatable
    $(document).ready(function() {
        $('#datatransaksi').DataTable();
    });
    //script donatur
    function pilih_pelanggan(id, nama) {
        $('#idpel').val(id);
        $('#nama').val(nama);
        $('#modal_pelanggan').modal().hide();
    }

    function pilih_tarif(id1, klass) {
        $('#idtarif').val(id1);
        $('#klass').val(klass);
        $('#modal_tarif').modal().hide();
    }
</script>
<?= $this->endSection('') ?>