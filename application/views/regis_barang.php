<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <title>Registrasi</title>
  <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <?php 
                                if(form_error() || validation_errors()){
                                    echo "<script>alert('Isi Data Dengan Benar! *(Pastikan Data Belum Didaftarkan Sebelumnya)*');history.go(-1);</script>";
                                }
                                    ?>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Registrasi Akun Peminjaman Barang</h3></div>
                                    <div class="card-body">
                                        <form class="user_barang" method="post" action="<?php echo base_url('regis_barang/aksi_regis');?>">
                                        <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Nama Lengkap<sup style="color:red">*</sup></label>
                                                <input class="form-control py-4" id="nama" name="nama" type="text" placeholder="Masukan Nama Lengkap" value="<?= set_value('nama');?>" />
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">NIP<sup style="color:red">*</sup></label>
                                                <input class="form-control py-4" id="nip" name="nip" type="text" placeholder="Masukan NIP (Jika belum ada isi ID pegawai)" value="<?= set_value('nip');?>" onkeypress="return event.charCode >= 48 && event.charCode <=57"/>
                                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputRole">Jenis Kelamin<sup style="color:red">*</sup></label>
                                                <select name="jk" class="form-control">
                                                 <option value="">-Pilih Jenis Kelamin-</option>
                                                 <option value="L">Laki-laki</option>
                                                 <option value="P">Perempuan</option>
                                                 </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputRole">Asal OPD<sup style="color:red">*</sup></label>
                                                <select name="id_opd" class="form-control">
                                                 <option value="">-Pilih OPD-</option>
                                                     <?php foreach ($opd as $u) {?>
                                                         <option value="<?php echo $u->id_opd; ?>"><?php echo $u->nama_opd ?></option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputRole">Role<sup style="color:red">*</sup></label>
                                                <select name="id_user_grup" class="form-control">
                                                 <option value="">-Pilih Role-</option>
                                                     <?php foreach ($user_grup as $u) {?>
                                                         <option value="<?php echo $u->id_user_grup; ?>"><?php echo $u->nama_user_grup ?></option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username<sup style="color:red">*</sup></label>
                                                <input class="form-control py-4" id="username" name="username" type="text" placeholder="Masukan Username" />
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                                            
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password<sup style="color:red">*</sup></label>
                                                        <input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan Password" />
                                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Konfirmasi Password<sup style="color:red">*</sup></label>
                                                        <input class="form-control py-4" id="password2" name="password2" type="password" placeholder="Konfirmasi Password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" type="submit">Buat Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="<?php echo base_url('login_barang');?>">Sudah Punya Akun? Login Disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    
</body>

</html>
