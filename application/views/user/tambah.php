<div class="container">
    <section class="content">
        <div class="card m-2 mt-5">
            <div class="card-header">
                <h2>
                    <?php echo $judul; ?>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('user/simpan'); ?>" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group mb-2">
                            <label>Avatar</label>
                            <input type="file" class="form-control" name="avatar">
                        <div>
                            <div class="form-group mb-2 p-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>