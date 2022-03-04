<section class="py-5">
   <div class="container">
    <h3>Berita Terkini CABJARI DELI SERDANG DI PANCUR BATU</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= base_url('auth') ?>">Home</a></li>
        <li class="breadcrumb-item active">Berita</li>
    </ol>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
               <?php 
                    // query the user media
               $fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
               $token = "IGQVJWT3ZAHdGZAkRkpVc3dfYUNId1hnbXpyeVNnQ2h0TVlYLVBzS1phN2g1TGlGY2hhNEpDcGNMS1BDUjVqWmx0YnJhXzJLdTVZAVElMSkhFUTExTGUxQTF4eVppTDNGc0JkaTU2OFBGd2VpZAWQ5OHYwcgZDZD";
               $limit = $lmt;

               $json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
               $json_feed = @file_get_contents($json_feed_url);
               $contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);
               $x =0;
               foreach($contents["data"] as $post){
                $x++;
                $username = isset($post["username"]) ? $post["username"] : "";
                $caption = isset($post["caption"]) ? $post["caption"] : "";
                $media_url = isset($post["media_url"]) ? $post["media_url"] : "";
                $permalink = isset($post["permalink"]) ? $post["permalink"] : "";
                $media_type = isset($post["media_type"]) ? $post["media_type"] : "";
                $timestamp = isset($post["timestamp"]) ? $post["timestamp"]:"";
                ?>
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <?php

                        if($media_type=="VIDEO"){
                            echo "<a href='{$permalink}' target='_blank'><video class='card-img-top' controls style='width:100%; display: block !important;'>
                            <source src='{$media_url}' type='video/mp4'>
                            Your browser does not support the video tag.
                            </video></a>";
                        }

                        else{
                            echo "<a href='{$permalink}' target='_blank'><img class='card-img-top' src='{$media_url}' /></a>";
                        }
                        ?>
                        <div class="card-body">
                            <h4 class="card-title"><a href="#!"><?= "@{$username}" ?></a></h4>
                            <p class="card-text"><?= "{$caption}" ?></p>
                            <a class="btn btn-primary" href="<?= "{$permalink}" ?>" target='_blank'>View on Instagram →</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?= date('d-m-Y', strtotime("{$timestamp}")) ?> by
                            <a href="<?= "{$permalink}" ?>" target='_blank'><?= "@{$username}" ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div class="text-center">
            <a id="LoadMore" href="<?= base_url('auth/berita?limit=').$x ?>" class="btn btn-primary mb-3" >Load More</a>
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
