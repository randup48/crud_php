<?php $this->extend('layout/template'); ?>


<?php $this->section('content'); ?>
<section class="mx-auto" style="max-width: 1200px;margin-block:40px">
  <section class="d-flex justify-content-between">
    <h3>Data User</h3>
    <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
      Tambah User
    </button> -->
    <a class="btn btn-primary" href="<?= base_url(); ?>/home/add">
      Tambah User
    </a>
  </section>

  <!-- notif sukses -->
  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="success alert alert-success" role="alert">
      <?= (session()->getFlashdata('pesan')); ?>
    </div>
  <?php endif; ?>

  <table class="table table-bordered" style="margin-block: 32px;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($listPegawai as $pegawai) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td>
            <div class="profilePict" style="background: url('<?= base_url('img/' . $pegawai['photo']); ?>');"></div>
          </td>
          <td><?= $pegawai['name']; ?></td>
          <td><?= $pegawai['jabatan']; ?></td>
          <td><?= $pegawai['email']; ?></td>
          <td><?= $pegawai['gender']; ?></td>
          <td>
            <a class="btn btn-success" href="<?= base_url(); ?>/home/edit/<?= $pegawai['id'] ?>">Ubah</a>
            <form action="<?= base_url(); ?>/<?= $pegawai['id']; ?>" method="post" class="d-inline">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus data <?= $pegawai['name']; ?>?')">Hapus</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah user</h1>
          <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url(); ?>/home/save" method="post">
          <?= csrf_field(); ?>
          <div class="modal-body">
            <!-- notif sukses -->
            <!-- <div style="display: none;" class="success alert alert-success" role="alert">
              A simple success alert—check it out!
            </div> -->


            <!-- notif error -->
            <!-- <div style="display: none;" class="error alert alert-danger" role="alert">
              A simple success alert—check it out!
            </div> -->


            <div class="mb-3">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
              <label for="jabatan" class="col-form-label">Role</label>
              <select name="jabatan" id="jabatan" class="form-select" aria-label="Default select example">
                <option selected value="finance">Finance</option>
                <option value="marketing">Marketing</option>
                <option value="hr">HRD</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="gender" class="col-form-label">Gender</label>
              <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                <option selected value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button id="tombolSimpan" type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php $this->endSection('content'); ?>