<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Login Peminjaman Ruang</h3></div>
                                    <?php 
                                if(form_error() || validation_errors()){
                                    echo "<script>alert('Isi Data Dengan Benar! *(Pastikan Data Belum Didaftarkan Sebelumnya)*');history.go(-1);</script>";
                                }
                                    ?>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?php echo base_url('login/aksi_login'); ?>">
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
                                          <a href="<?php echo base_url('regis');?>">Belum Punya Akun? Resgistrasi Disini!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       
  <!--<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php //echo base_url('login/aksi_login'); ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputUsername">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <!--<div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Login">
        </form>
        <!--<div class="text-center">
          <a class="d-block small" href="<?php //echo base_url('forgotpassword'); ?>">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

 