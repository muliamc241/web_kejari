 <style type="text/css">
    td{
        white-space: nowrap;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Data Berita</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-capitalize">
                    <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah_berita" style="text-decoration: none;">Tambah Berita</button>

                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Nama File</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_berita as $row) {
                            ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $row['b_judul'] ?></td>
                                <td><?= $row['b_file'] ?></td>
                                <td><?= date('d-m-Y' ,$row['b_tanggal']) ?></td>
                                <td>
                                    <button  type="button"class="btn btn-primary pr-3 pl-3" data-toggle="modal" data-target="#hapusModal<?= $row['b_id'] ?>" style="margin-top: -0.5em;">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="hapusModal<?= $row['b_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengaduan?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Yakin Menghapus File Berita Dengan Nama <?= $row['b_judul'] ?></div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="<?= base_url('admin/hapus_berita/'.$row['b_id']) ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal fade" id="tambah_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_berita') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user text-capitalize" name="b_judul" 
                                        placeholder="Judul Berita" id="judul" value="">
                                        <small class="text-danger"> <?= form_error('b_judul'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control form-control-user text-capitalize" name="b_file" 
                                        placeholder="File" id="b_file" value="">
                                        <small class="text-danger"> <?= form_error('b_file'); ?></small>
                                    </div>                                          
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="Submit" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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