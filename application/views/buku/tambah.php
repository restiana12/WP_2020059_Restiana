<div class="container">
    <section class="content">
        <div class="row">
            <h2><?php echo $judul; ?></h2>
        </div>
        <div class="row">
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/buku/simpan" entype"multipart/formdata">
                <div class="form-group">
                    <label> Kode Barang</label>
                    <input type="text" class="form-control" name="kode_buku">
                </div>
                <div class="form-group">
                    <label>Judul Barang</label>
                    <input type="text" class="form-control" name="judul_buku">
                </div>
                <div class="form-group">
                    <label>Kategori Barang</label>
                    <select class="form-control" name="kategori">
                        <option value="">Pilih</option>
                        <option value="Cet">Cet</option>
                        <option value="Kayu">Kayu</option>
                        <option value="Elektronik">Elektronik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Barang</label>
                    <input type="text" class="form-control" name="sampul">
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>
</div>