<?php $this->extend('layout/template'); ?>


<?php $this->section('content'); ?>
<section class="mx-auto" style="max-width: 1200px;margin-block:40px">
    <h1 class=" modal-title fs-5" id="exampleModalLabel"><?= $pegawai ? 'Ubah' : 'Tambah'; ?> user</h1>

    <form action="<?= base_url(); ?>/home/save<?= $pegawai ? '/' . $pegawai['id'] : ''; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal-body">
            <div class="my-1">
                <label for="picture" class="form-label">Profile Photo</label>
                <input class="form-control <?= validation_show_error('picture') ? 'is-invalid' : ''; ?>" type="file" id="formFile" name="picture">
                <div class="invalid-feedback">
                    <?= validation_show_error('picture'); ?>
                </div>
            </div>

            <div class="my-1">
                <label for="name" class="col-form-label">Name*</label>
                <input value="<?= $pegawai ? $pegawai['name'] : '' ?>" type="text" class="form-control <?= validation_show_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" autofocus>
                <div class="invalid-feedback">
                    <?= validation_show_error('name'); ?>
                </div>
            </div>
            <div class="my-1">
                <label for="email" class="col-form-label">E-mail*</label>
                <input value="<?= $pegawai ? $pegawai['email'] : '' ?>" type="email" class="form-control <?= validation_show_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email">
                <div class="invalid-feedback">
                    <?= validation_show_error('email'); ?>
                </div>
            </div>
            <div class="my-1">
                <label for="jabatan" class="col-form-label">Role</label>
                <select name="jabatan" id="jabatan" class="form-select" aria-label="Default select example">
                    <option <?= $pegawai && $pegawai['jabatan'] === 'finance' || !$pegawai ? 'selected' : '' ?> value="finance">Finance</option>
                    <option <?= $pegawai && $pegawai['jabatan'] === 'marketing' ? 'selected' : '' ?> value="marketing">Marketing</option>
                    <option <?= $pegawai && $pegawai['jabatan'] === 'hr' ? 'selected' : '' ?> value="hr">HRD</option>
                </select>
            </div>
            <div class="my-1">
                <label for="gender" class="col-form-label">Gender</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                    <option <?= $pegawai && $pegawai['gender'] === 'male' || !$pegawai ? 'selected' : '' ?> value="male">Male</option>
                    <option <?= $pegawai && $pegawai['gender'] === 'female' ? 'selected' : '' ?> value="female">Female</option>
                </select>
            </div>

        </div>

        <button id="tombolSimpan" type="submit" class="btn btn-primary">Save changes</button>

    </form>
</section>

<?php $this->endSection('content'); ?>