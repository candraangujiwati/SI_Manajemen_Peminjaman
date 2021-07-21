<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Login Peminjaman Barang</h3></div>
                                    <?php 
                                if(form_error() || validation_errors()){
                                    echo "<script>alert('Isi Data Dengan Benar! *(Pastikan Data Belum Didaftarkan Sebelumnya)*');history.go(-1);</script>";
                                }
                                    ?>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?php echo base_url('login_barang/aksi_login'); ?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="username" name="username" type="text" placeholder="Masukan Username" value="<?= set_value('username');?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan Password" />
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                                            </div>
                                           
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                          <a href="<?php echo base_url('regis_barang');?>">Belum Punya Akun? Resgistrasi Disini!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>