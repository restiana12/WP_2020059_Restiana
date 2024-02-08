<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=100.0">
  <title>DAFTAR PINJAMAN</title>
  
</head>

<body>
  <div class="text-center">
    <h3><b><u>DAFTAR PINJAMAN</u></b></h3>
  </div>
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="card">
        <div class="card-header">
        <a href="/pinjaman/tambah" class="btn btn-success btn-lg mt"><i class="fa fa-book"></i> Tambah pinjaman</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">

          <div class="fluid ">
            <?php if ($this->session->flashdata('flash')) : ?>

              <div class="alert alert-success col-4" role="alert">
                Data Pinjaman <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('flashHapus')) : ?>
              <div class="alert alert-danger" role="alert">
                Data Pinjaman <strong>berhasil</strong> <?= $this->session->flashdata('flashHapus'); ?>.
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('flashUpdate')) : ?>
              <div class="alert alert-primary" role="alert">
                Data Pinjaman <strong>berhasil</strong> <?= $this->session->flashdata('flashUpdate'); ?>.
              </div>
            <?php endif; ?>
          </div>

          <table class="table table-hover text-nowrap" cellspacing="0" cellpadding="">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Peminjam</th>
                <th class="text-center">Id User</th>
                <th class="text-center">Kode Buku</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Sampul</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($daftar_pinjaman as $pinjaman) { ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $pinjaman->name; ?></td>
                  <td class="text-center"><?php echo $pinjaman->id; ?></td>
                  <td class="text-center"><?php echo $pinjaman->kode_buku; ?></td>
                  <td><?php echo $pinjaman->judul_buku; ?></td>
                  <td class="text-center"><?php echo $pinjaman->kategori_buku; ?></td>
                  <td class="text-center">
                    <img class="img-fluid" width="30" src="<?php echo base_url('upload/').$pinjaman->cover_buku; ?>" alt="">
                  </td>
                  <td>
                    <a href="pinjaman/kembalikan/<?php echo $pinjaman->id_pinjaman; ?> " class="btn btn-primary btn-sm edit">Kembalikan</a>
                  </td>
                </tr>

              <?php } ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    <?php if(!empty($_SESSION['success'])): ?>
      Swal.fire({
        icon: 'success',
        title: 'Alhamdulillah Ya Allah',
        text: "<?=$_SESSION['success']?>"
      })
      <?php endif ?>

      <?php if(!empty($_SESSION['failed'])): ?>
      Swal.fire({
        icon: 'error',
        title: 'Astagfirullah',
        text: "<?=$_SESSION['failed']?>"
      })
      <?php endif ?>
  </script>
</body>

</html>