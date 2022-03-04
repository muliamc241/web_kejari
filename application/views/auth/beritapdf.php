<section class="py-5">
 <div class="container">
  <h3>Berita Terkini CABJARI DELI SERDANG DI PANCUR BATU</h3>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= base_url('auth') ?>">Home</a></li>
    <li class="breadcrumb-item active">Berita</li>
  </ol>
  <div class="row">
    <?php
    $no = 1;
    foreach ($data_berita as $row) {
      ?>
      <div class="col-md-8">
        <!-- Blog Post-->
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="card-title"><?= $row['b_judul'] ?></h2>
            <embed type="application/pdf" src="<?= base_url('file/berita/'.$row['b_file']) ?>" width="685" height="400"></embed>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d F Y' ,$row['b_tanggal']) ?> by
            <a href="#!">Ro0T</a>
          </div>
        </div>
      <?php } ?>



        <div class="text-center">
         <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      <div class="col-md-4">
        <!-- Side Widget-->
        <div class="card">
          <h5 class="card-header">Ikuti Kami Di Twiter</h5>
          <div class="card-body" style="overflow-y: scroll; height: 500px;">
           <a class="twitter-timeline" href="https://twitter.com/CKN_PancurBatu?ref_src=twsrc%5Etfw">Tweets by CKN_PancurBatu</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </div>
       </div>
     </div>



   </div>
 </div>
</section>
