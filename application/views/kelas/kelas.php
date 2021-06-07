<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Kelas Index</title>
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
            <h2>Data <b>Kelas</b></h2>
          </div>
          <div class="col-sm-7,5">
            <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#addKelasModal"><i class="material-icons">&#xE147;</i> <span>Add Kelas</span></a>
                  
          </div>
          <br>
        </div>
      </div>
      <table id="example" class="display table table-bordered" style="width:100%">
        <thead>
          <tr class="table-warning">
            <th class="text-center">No</th>
            <th>Jenjang</th>
            <th>Jurusan</th>
            <th>Jumlah</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($kelas as $kls) {
        ?>
          <tr>  
            <td class="text-center"><?=$no++ ;?></td>
            <td><?= $kls['jenjang']; ?></td>
            <td><?= $kls['jurusan']; ?></td>
            <td><?= $kls['jmlh']; ?></td>
            <td>
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editmodal<?= $kls['id_kelas']; ?> ">Edit</a>
              <a onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="<?= base_url(); ?>kelas/hapus_kelas/<?= $kls['id_kelas']; ?>" type="button" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="addKelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Kelas/tambah_kelas" method="POST">          
        <div class="form-group">
          <label for="jenjang">Jenjang</label>
          <select name="jenjang" class="form-control" id="jenjang">
            <option>--Pilih Jenjang--</option>
            <option value="XII">XII</option>
            <option value="XI">XI</option>
            <option value="X">X</option>
          </select>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" class="form-control" id="jurusan">
            <option>--Pilih Jurusan--</option>
            <option value="RPL">RPL</option>
            <option value="MM">MM</option>
            <option value="AKL">AKL</option>
          </select>
        </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input class="form-control form-control-sm" type="text" id="jmlh" name="jmlh">
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
foreach ($kelas as $kls) { $no++;
?>
<div class="modal fade" id="editmodal<?= $kls['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Kelas/edit_kelas" method="POST">
      <input type="hidden" name="id_kelas" id="kelas" value="<?= $kls['id_kelas']?>">      
        <div class="form-group">
          <label for="jenjang">Jenjang</label>
          <select name="jenjang" class="form-control" id="jenjang">
            <option><?= $kls['jenjang'];?></option>
            <option value="XII">XII</option>
            <option value="XI">XI</option>
            <option value="X">X</option>
          </select>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" class="form-control" id="jurusan">
            <option><?= $kls['jurusan'];?></option>
            <option value="RPL">RPL</option>
            <option value="MM">MM</option>
            <option value="AKL">AKL</option>
          </select>
        </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input class="form-control form-control-sm" value="<?php echo $kls['jmlh'];?>" type="text" id="jmlh" name="jmlh">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="">Cancel</button>
          <button type="submit" class="btn btn-success" name="submit">Edit</buttom>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>