 <style type="text/css">
    td{
        white-space: nowrap;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Data Yang Menghubungi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Yang Menghubungi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-capitalize">


                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_hubungikami as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                 <td><?= $row['c_nama'] ?></td>
                                 <td><?= $row['c_nohp'] ?></td>
                                 <td class="text-lowercase"><?= $row['c_email'] ?></td>
                                 <td><?= $row['c_pesan'] ?></td>
                                 <td><?= date('d-m-Y' ,strtotime($row['c_tanggal'])) ?></td>
                                <td>
                                    <button  type="button"class="btn btn-primary pr-3 pl-3" data-toggle="modal" data-target="#hapusModal<?= $row['c_id'] ?>" style="margin-top: -0.5em;">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="hapusModal<?= $row['c_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengaduan?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Yakin Menghapus Data Pengaduan Dengan Nama <?= $row['c_nama'] ?></div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="<?= base_url('admin/hapus_pesan/'.$row['c_id']) ?>">Hapus</a>
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