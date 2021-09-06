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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMasterBarangModal"><i class="fas fa-fw fa-plus"></i>Add New Item</a>
                            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#importBarangModal"><i class="fas fa-fw fa-file-import"></i>Import Master Item</a>
                            <a class="btn btn-danger mb-3" href="<?= base_url('admin/PdfviewBarang') ?>"><i class="far fa-fw fa-file-pdf"></i>Export PDF</a>
                            <table id="dataTable" class="table-responsive-xl table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($masterBarang as $mb) : ?>
                                        <tr>
                                            <th scope="row" align="center"><?= $i ?></th>
                                            <td align="center">
                                                <?= $mb['kd_barang']; ?>
                                            </td>
                                            <td><?= $mb['nama_barang']; ?></td>
                                            <td align="center">
                                                <?= $mb['satuan']; ?>
                                            </td>
                                            <td align="right">
                                                <?= rupiah(($mb['harga'])); ?>
                                            </td>
                                            <td align="center">
                                                <a href="" data-toggle="modal" data-target="#editMasterBarangModal<?= $mb['kd_barang'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deleteMasterBarang/' . $mb['kd_barang']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $mb['kd_barang']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
                <div class="modal fade" id="newMasterBarangModal" tabindex="-1" aria-labelledby="newMasterBarangModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMasterBarangModalLabel">Add New Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/masterbarang'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Kode Barang : </label>
                                        <div class="col-lg">
                                            <input type="text" readonly class="form-control" id="kd_barang" name="kd_barang" value="B<?php echo sprintf("%04s", $kd_barang) ?>" placeholder="Kode Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Nama Barang : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Select Satuan : </label>
                                        <div class="col-lg">
                                            <select name="satuan" id="satuan" class="form-control" required>
                                                <option value=""> --->Satuan<--- </option>
                                                <option value="Pcs">Pcs</option>
                                                <option value="Unit">Unit</option>
                                                <option value="Roll">Roll</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Harga : </label>
                                        <div class="col-lg">
                                            <input type="number" step="any" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tambah via Upload Excel Modal -->
                <div class="modal fade" id="importBarangModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"> Import New Item</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- ada sesuatu disini yang menyebabkan javascript ga jalan -->

                                <!-- pokoknya diatas ini -->
                                <form action="<?php print site_url(); ?>admin/importBarang" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                                            <a href="<?php print base_url('assets/uploads/sampleBarang.xlsx') ?>" class="btn btn-link btn-sm" target="_blank"><i class="fa fa-file-excel-o"></i> Sample Barang.xlsx</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit Modal -->
                <?php foreach ($masterBarang as $emb) : ?>
                    <div class="modal fade" id="editMasterBarangModal<?= $emb['kd_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="editMasterBarangModal<?= $emb['kd_barang'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMasterBarangModal<?= $emb['kd_barang'] ?>">Edit Master Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/editMasterBarang/' . $emb['kd_barang']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Kode Barang : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $emb['kd_barang'] ?>" readonly id="kd_barang" name="kd_barang" placeholder="Kode Barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Nama Barang : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $emb['nama_barang'] ?>" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Select Satuan : </label>
                                            <div class="col-lg">
                                                <select name="satuan" id="satuan" class="form-control" required>
                                                    <option value="<?= $emb['satuan'] ?>"> <?= $emb['satuan'] ?> </option>
                                                    <?php if ($emb['satuan'] == 'Unit') {
                                                        echo '<option value="Pcs">Pcs</option>';
                                                        echo '<option value="Roll">Roll</option>';
                                                    } elseif ($emb['satuan'] == 'Pcs') {
                                                        echo '<option value="Unit">Unit</option>';
                                                        echo '<option value="Roll">Roll</option>';
                                                    } elseif ($emb['satuan'] == 'Roll') {
                                                        echo '<option value="Pcs">Pcs</option>';
                                                        echo '<option value="Unit">Unit</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Harga : </label>
                                            <div class="col-lg">
                                                <input type="number" step="any" class="form-control" value="<?= $emb['harga'] ?>" id="harga" name="harga" placeholder="Harga">
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