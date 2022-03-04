 <style type="text/css">
    td{
        white-space: nowrap;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Data Pengaduan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-capitalize">


                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Subjek</th>
                            <th>Bukti</th>
                            <th>Detail</th>
                            <th>Tanggal</th>
                            <th style="width: 50em;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_pengaduan as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                 <td class=""><?= $row['p_nik'] ?></td>
                                 <td><?= $row['p_nama'] ?></td>
                                 <td><?= $row['p_nohp'] ?></td>
                                 <td class="text-lowercase"><?= $row['p_email'] ?></td>
                                 <td><?= $row['p_alamat'] ?></td>
                                 <td><?= $row['p_subjek'] ?></td>
                                 <td><img src="<?= base_url('assets/img/foto_bukti/' . $row['p_bukti']) ?>" style="width:10em ;height:8em;"></td>
                                 <td><?= $row['p_detail'] ?></td>
                                 <td><?= date('d-m-Y' ,strtotime($row['p_tanggal'])) ?></td>
                                <td>
                                    <button  type="button"class="btn btn-primary pr-3 pl-3" data-toggle="modal" data-target="#hapusModal<?= $row['p_id'] ?>" style="margin-top: -0.5em;">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="hapusModal<?= $row['p_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengaduan?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Yakin Menghapus Data Pengaduan Dengan Nama <?= $row['p_nama'] ?></div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="<?= base_url('admin/hapus_pengaduan/'.$row['p_id']) ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <?php echo $this->pagination->create_links(); ?>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>