<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Siswa Index</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="">
        <?php if ($this->session->flashdata('success')) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil</strong> <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

          <div class="col-sm-6">
            <h2><b>Data Siswa</b></h2>
          </div>
          <div class="col-sm-7,5">
            <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#addSiswaModal"><i class="material-icons">&#xE147;</i> <span>Add Siswa</span></a>
                  
          </div>
          <br>
        </div>
      </div>
      <table id="example" class="display table table-bordered" style="width:100%">
        <thead>
          <tr class="table-warning">
            <th class="text-center">No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($Siswa as $swa) {
        ?>
          <tr>  
            <td class="text-center"><?= $no++ ;?></td>
            <td><?= $swa['nis']; ?></td>
            <td><?= $swa['nama']; ?></td>
            <td><?= $swa['jenis_kelamin']; ?></td>
            <td><?= $swa['tempat_lahir']; ?>, <?= $swa['tgl_lahir']; ?>
            </td>
            <td><?= $swa['alamat']; ?></td>
            <td>
            <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editmodal<?= $swa['id_siswa']; ?> ">Edit</a>
              <a onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="<?= base_url(); ?>siswa/hapus_siswa/<?= $swa['id_siswa']; ?>" type="button" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      </script>
    </div> 
  </div>        
</div>
<!-- ADD Modal HTML -->
<div class="modal fade" id="addSiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Siswa/tambah_siswa" method="POST">
      <div class="form-group">
      <div class="row">
        <div class="col">
        <label>NIS</label>
        <input type="text" class="form-control" placeholder="NIS">
        </div>
        <div class="col">
        <label>Nama</label>
        <input type="text" class="form-control" placceholder="Nama" >
        </div>
        </div>                
        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
            <option>--Pilih Jenis Kelamin--</option>
            <option value="perempuan">Laki-Laki</option>
            <option value="Laki">perempuan</option>
          </select>
        </div>
        <div class="row">
        <div class="col">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat Lahir">
        </div>
        <div class="col">
        <label>Tangal Lahir</label>
        <input type="date" class="form-control" >
        </div>
        </div>
        <div>
      <label>Alamat</label>
      <br>
      <textarea name="alamat" id="alamat" cols="48,5" rows="5"></textarea>
      </div>    
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="Cancel">Cancel</button>
          <button type="submit" class="btn btn-success" name="save">Tambah</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<?php 
$no=0;
foreach ($siswa as $swa) { $no++;
?>
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Siswa/edit_siswa" method="POST">
      <div class="form-group">
      <div class="row">
        <div class="col">
        <label>NIS</label>
        <input type="text" class="form-control" placeholder="NIS">
        </div>
        <div class="col">
        <label>Nama</label>
        <input type="text" class="form-control" placceholder="Nama" >
        </div>
        </div>                
        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
            <option>--Pilih Jenisa Kelamin--</option>
            <option value="perempuan">Laki-Laki</option>
            <option value="Laki">perempuan</option>
          </select>
        </div>
        <div class="row">
        <div class="col">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat Lahir">
        </div>
        <div class="col">
        <label>Tangal Lahir</label>
        <input type="date" class="form-control" >
        </div>
        </div>
        <div>
      <label>Alamat</label>
      <br>
      <textarea name="alamat" id="alamat" cols="48,5" rows="5"></textarea>
      </div>    
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="Cancel">Cancel</button>
          <button type="submit" class="btn btn-success" name="save">Tambah</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>