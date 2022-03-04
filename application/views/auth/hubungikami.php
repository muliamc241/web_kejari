<section class="py-5">
            <div class="container">
                <!-- Page Heading/Breadcrumbs-->
                <h1>
                    Contact
                    <small>Hubungi Kami</small>
                </h1>
                <?= $this->session->flashdata('messagecontact'); ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Hubungi Kami</li>
                </ol>
                <!-- Content Row-->
                <div class="row">
                    <!-- Map Column-->
                    <div class="col-lg-8 mb-4">
                        <!-- Embedded Google Map-->
                         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15930.156719393253!2d98.5968054!3d3.4615226!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x10d4f9a5a41ea71c!2sCabang%20Kejaksaan%20Negeri%20Deli%20Serdang%20di%20Pancur%20Batu!5e0!3m2!1sid!2sid!4v1620234045762!5m2!1sid!2sid" width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <!-- Contact Details Column-->
                    <div class="col-lg-4 mb-4">
                        <h3>Contact Details</h3>
                        <p>
                           Jl. Jamin Ginting, Pertampilen, Kec. Pancur Batu, Kabupaten Deli Serdang, Sumatera Utara 20353
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            (061) 8361033
                        </p>
                        <p>
                            <i class="fas fa-envelope"> </i>
                            <a href="mailto:Pancurbatu11@gmail.com">Pancurbatu11@gmail.com</a>
                        </p>
                        <p>
                            <i class="far fa-clock"> </i>
                            Senin – Jum’at : 07:30 s.d 17:00
                        </p>
                    </div>
                </div>
                <!-- Contact Form-->
                <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h3>Send us a Message</h3>
                        <form id="contactForm" method="post" action="<?= base_url('auth/hubungikami') ?>">
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nama Lengkap:</label>
                                    <input class="form-control" id="name" type="text" name="nama" required data-validation-required-message="Please enter your name." value="<?= set_value('nama') ?>"/>
                                    <small class="text-danger"> <?= form_error('nama'); ?></small>
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
                                    <label>Message:</label>
                                    <textarea class="form-control" id="pesan" name="pesan" rows="3" cols="100" required data-validation-required-message="Please enter your message" maxlength="999" style="resize: none"><?= set_value('pesan') ?></textarea>
                                    <small class="text-danger"> <?= form_error('pesan'); ?></small>
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