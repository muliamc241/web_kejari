
<section class="py-5">
            <div class="container">
                <?= $this->session->flashdata('messagepengaduan'); ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?= base_url('auth') ?>">Home</a></li>
                    <li class="breadcrumb-item active">PENGADUAN MASYARAKAT</li>
                </ol>
                <!-- FAQ Accordion 1-->
                <h2>Isi Form Di Bawah Ini</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <form id="contactForm" name="sentMessage" novalidate method="post" action="<?= base_url('auth/pengaduanmasyarakat') ?>" enctype="multipart/form-data">
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nama Lengkap:</label>
                                    <input class="form-control" id="name" type="text" name="nama" required data-validation-required-message="Please enter your name." value="<?= set_value('nama') ?>"/>
                                    <small class="text-danger"> <?= form_error('nama'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nik / Sim:</label>
                                    <input class="form-control" id="name" type="text" name="nik" required data-validation-required-message="Please enter your Nik." value="<?= set_value('nik') ?>" />
                                    <small class="text-danger"> <?= form_error('nik'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nomor HP:</label>
                                    <input class="form-control" id="phone" type="tel" name="nohp" required data-validation-required-message="Please enter your phone number." maxlength="12" value="<?= set_value('nohp') ?>" />
                                    <small class="text-danger"> <?= form_error('nohp'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Email Address:</label>
                                    <input class="form-control" id="email" type="email" name="email" required data-validation-required-message="Please enter your email address." value="<?= set_value('email') ?>" />
                                    <small class="text-danger"> <?= form_error('email'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Alamat:</label>
                                    <textarea class="form-control" id="message" name="alamat" rows="3" cols="100" required data-validation-required-message="Please enter your message" maxlength="999" style="resize: none"><?= set_value('alamat') ?></textarea>
                                    <small class="text-danger"> <?= form_error('alamat'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Subjek / Judul Pengaduan</label>
                                    <select class="form-control" name="subjek">
                                        <option value="">Pilih</option>
                                        <option value="1" <?php if (set_value('subjek') == 1) {echo "selected";} ?>>Pos Pelayanan Hukum</option>
                                        <option value="2" <?php if (set_value('subjek') == 2) {echo "selected";} ?>>Pengaduan Masyarakat</option>
                                        <option value="3" <?php if (set_value('subjek') == 3) {echo "selected";} ?>>Pelayanan Informasi Publik</option>
                                        <option value="4" <?php if (set_value('subjek') == 4) {echo "selected";} ?>>Pengawasan Aliran Kepercayaan Masyarakat</option>
                                    </select>
                                    <small class="text-danger"> <?= form_error('subjek'); ?></small>
                                </div>
                            </div>
                             <div class="control-group form-group">
                                <div class="controls">
                                    <label>Detail Pengaduan:</label>
                                    <textarea class="form-control" id="message" name="detail" rows="3" cols="100" required data-validation-required-message="Please enter your message" maxlength="999" style="resize: none"><?= set_value('detail') ?></textarea>
                                    <small class="text-danger"> <?= form_error('detail'); ?></small>
                                </div>
                            </div>
                            <div class="control-group form-group" style="border-color: 1px solid black">
                                <div class="controls">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="<?= set_value('image') ?>">
                                <small class="text-danger"> <?= form_error('image'); ?></small>
                              </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages-->
                            <button class="btn btn-primary" id="sendMessageButton" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>