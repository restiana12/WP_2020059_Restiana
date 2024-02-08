<div class="container">
    <section class="content">
        <div class="row">
            <h2><?php echo $judul; ?></h2>
        </div>
        <div class="row">
            <form class="form-horizontal" method="post" action="<?php echo site_url('pinjaman/simpan'); ?>" entype"multipart/formdata">
                <div class="form-group">
                    <label> Kode Buku</label>
                    <input type="text" class="form-control" name="id_buku">
                </div>
                <div class="form-group">
                    <label>ID User</label>
                    <input type="text" class="form-control" name="id_user">
                </div>
                <div class="form-group">
                    <label>Tanggal pinjaman</label>
                    <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="tanggal_pinjam">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</div>