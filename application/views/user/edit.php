<div class="container">
    <div class="col-xs-10">
        <section class="content">
            <div class="row">

            </div>
            <div class="row">
            <form class="form-horizontal" method="POST" action="<?php echo site_url('user/simpan_edit'); ?>" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" value="<?=$user->name?>" class="form-control" name="name">
                            <input type="hidden" value="<?=$user->id?>" name="id">
                        </div>
                        <div class="form-group mb-2">
                            <label>Username</label>
                            <input type="text" value="<?=$user->username?>" class="form-control" name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" value="<?=$user->email?>" class="form-control" name="email">
                        </div>
                        <div class="form-group mb-2">
                            <label>Password
                                </label>
                                <input type="password"  class="form-control" name="password">
                                <small>Kosongkan jika tidak ingin merubah</small>
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
        </section>
    </div>

</div>