                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?= $this->session->flashdata('message'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMasterPelangganModal"><i class="fas fa-fw fa-plus"></i>Add New Pelanggan</a>
                            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#importPelangganModal"><i class="fas fa-fw fa-file-import"></i>Import Master Pelanggan</a>
                            <a class="btn btn-danger mb-3" href="<?= base_url('admin/PdfviewPelanggan') ?>"><i class="far fa-fw fa-file-pdf"></i>Export PDF</a>
                            <table id="dataTable" class="table-responsive-xl table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Pelanggan</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Agama</th>
                                        <th scope="col">HP</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($masterPelanggan as $mp) : ?>
                                        <tr>
                                            <td scope="row" align="center"><?= $i ?></td>
                                            <td align="center">
                                                <?= $mp['kd_pelanggan']; ?>
                                            </td>
                                            <td><?= $mp['nama_pelanggan']; ?></td>
                                            <td align="center">
                                                <?= $mp['jk']; ?>
                                            </td>
                                            <td align="center">
                                                <?= $mp['tgl_lahir']; ?>
                                            </td>
                                            <td align="center">
                                                <?= $mp['agama']; ?>
                                            </td>
                                            <td><?= $mp['hp']; ?></td>
                                            <td><?= $mp['alamat']; ?></td>
                                            <td align="center">
                                                <a href="" data-toggle="modal" data-target="#editMasterPelangganModal<?= $mp['kd_pelanggan'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deleteMasterPelanggan/' . $mp['kd_pelanggan']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $mp['kd_pelanggan']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Add Modal -->
                <div class="modal fade" id="newMasterPelangganModal" tabindex="-1" aria-labelledby="newMasterPelangganModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMasterPelangganModalLabel">Add New Pelanggan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/masterpelanggan'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Kode Pelanggan : </label>
                                        <div class="col-lg">
                                            <input type="text" readonly class="form-control" id="kd_pelanggan" name="kd_pelanggan" value="P<?php echo sprintf("%03s", $kd_pelanggan) ?>" placeholder="Kode Pelanggan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Nama Pelanggan : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Select Jenis Kelamin : </label>
                                        <div class="col-lg">
                                            <select name="jk" id="jk" class="form-control" required>
                                                <option value=""> --->Jenis Kelamin<--- </option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Tanggal Lahir : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" placeholder="yyyy / mm / dd" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Select Agama : </label>
                                        <div class="col-lg">
                                            <select name="agama" id="agama" class="form-control" required>
                                                <option value=""> ---.Agama<--- </option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">HP : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="hp" name="hp" placeholder="HP" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Alamat : </label>
                                        <div class="col-lg">
                                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Tambah via Upload Excel Modal -->
                <div class="modal fade" id="importPelangganModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"> Import New Pelanggan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- ada sesuatu disini yang menyebabkan javascript ga jalan -->

                                <!-- pokoknya diatas ini -->
                                <form action="<?php print site_url(); ?>admin/importPelanggan" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        </div>
                                        <div class="" style="margin-left:5px;">
                                            <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="col-lg">
                                    <div class="col-lg">
                                        <div> <label>Contoh template excel untuk upload</label> </div>
                                        <div class="">
                                            <a href="<?php print base_url('assets/uploads/samplePelanggan.xlsx') ?>" class="btn btn-link btn-sm" target="_blank"><i class="fa fa-file-excel-o"></i> Sample Pelanggan.xlsx</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit Modal -->
                <?php foreach ($masterPelanggan as $emp) : ?>
                    <div class="modal fade" id="editMasterPelangganModal<?= $emp['kd_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editMasterPelangganModal<?= $emp['kd_pelanggan'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMasterPelangganModal<?= $emp['kd_pelanggan'] ?>">Edit Master Pelanggan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/editMasterPelanggan/' . $emp['kd_pelanggan']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Kode Pelanggan : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $emp['kd_pelanggan'] ?>" readonly id="kd_pelanggan" name="kd_pelanggan" placeholder="Kode Pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Nama Pelanggan : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $emp['nama_pelanggan'] ?>" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Select Jenis Kelamin : </label>
                                            <div class="col-lg">
                                                <select name="jk" id="jk" class="form-control" required>
                                                    <option value="<?= $emp['jk'] ?>"> <?= $emp['jk'] ?> </option>
                                                    <?php if ($emp['jk'] == 'P') {
                                                        echo '<option value="L">L</option>';
                                                    } else {
                                                        echo '<option value="P">P</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Tanggal Lahir : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control datepicker" value="<?= $emp['tgl_lahir'] ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">
                                                Select Agama :
                                            </label>
                                            <div class="col-lg">
                                                <select name="agama" id="agama" class="form-control" required>
                                                    <option value="<?= $emp['agama'] ?>"> <?= $emp['agama'] ?> </option>
                                                    <?php
                                                    if ($emp['agama'] == 'Kristen') {
                                                        echo '<option value="Islam">Islam</option>';
                                                        echo '<option value="Katolik">Katolik</option>';
                                                        echo '<option value="Hindu">Hindu</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Konghucu">Konghucu</option>';
                                                    } elseif ($emp['agama'] == 'Hindu') {
                                                        echo '<option value="Kristen">Kristen</option>';
                                                        echo '<option value="Islam">Islam</option>';
                                                        echo '<option value="Katolik">Katolik</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Konghucu">Konghucu</option>';
                                                    } elseif ($emp['agama'] == 'Islam') {
                                                        echo '<option value="Kristen">Kristen</option>';
                                                        echo '<option value="Hindu">Hindu</option>';
                                                        echo '<option value="Katolik">Katolik</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Konghucu">Konghucu</option>';
                                                    } elseif ($emp['agama'] == 'Katolik') {
                                                        echo '<option value="Kristen">Kristen</option>';
                                                        echo '<option value="Hindu">Hindu</option>';
                                                        echo '<option value="Islam">Islam</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Konghucu">Konghucu</option>';
                                                    } elseif ($emp['agama'] == 'Katolik') {
                                                        echo '<option value="Kristen">Kristen</option>';
                                                        echo '<option value="Hindu">Hindu</option>';
                                                        echo '<option value="Islam">Islam</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Konghucu">Konghucu</option>';
                                                    } elseif ($emp['agama'] == 'Konghucu') {
                                                        echo '<option value="Kristen">Kristen</option>';
                                                        echo '<option value="Hindu">Hindu</option>';
                                                        echo '<option value="Islam">Islam</option>';
                                                        echo '<option value="Budha">Budha</option>';
                                                        echo '<option value="Katolik">Katolik</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">HP : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $emp['hp'] ?>" id="hp" name="hp" placeholder="HP">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Alamat : </label>
                                            <div class="col-lg">
                                                <textarea class="form-control" value="" id="alamat" name="alamat" placeholder="Alamat"><?= $emp['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- End edit Modal -->