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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTransaksiPenjualanModal"><i class="fas fa-fw fa-plus"></i>Add New Penjualan</a>
                            <a class="btn btn-danger mb-3" href="<?= base_url('admin/PdfviewTransaksiPenjualan') ?>"><i class="far fa-fw fa-file-pdf"></i>Export PDF</a>
                            <table id="dataTable" class="table-responsive table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Penjualan</th>
                                        <th scope="col">Tanggal Penjualan</th>
                                        <th scope="col">Kode Pelanggan</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($transaksiPenjualan as $tp) : ?>
                                        <tr>
                                            <td scope="row" align="center"><?= $i ?></td>
                                            <td align="center"><?= $tp['kd_penjualan']; ?></td>
                                            <td align="center"><?= $tp['tgl_penjualan']; ?></td>
                                            <td align="center"><?= $tp['kd_pelanggan']; ?></td>
                                            <td><?= $tp['nama_pelanggan']; ?></td>
                                            <td align="center"><?= $tp['kd_barang']; ?></td>
                                            <td><?= $tp['nama_barang']; ?></td>
                                            <td align="right">
                                                <?= rupiah($tp['harga']); ?>
                                            </td>
                                            <td align="center"><?= $tp['qty']; ?></td>
                                            <td align="right">
                                                <?= rupiah($tp['harga'] * $tp['qty']); ?>
                                            </td>
                                            <td align="center">
                                                <a href="" data-toggle="modal" data-target="#editTransaksiPenjualanModal<?= $tp['kd_penjualan'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deleteTransaksiPenjualan/' . $tp['kd_penjualan']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $tp['kd_penjualan']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
                <div class="modal fade" id="newTransaksiPenjualanModal" tabindex="-1" aria-labelledby="newTransaksiPenjualanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newTransaksiPenjualanModalLabel">Add New Penjualan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/transaksipenjualan'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Kode Penjualan : </label>
                                        <div class="col-lg">
                                            <input type="text" readonly class="form-control" id="kd_penjualan" name="kd_penjualan" value="T<?php echo sprintf("%03s", $kd_penjualan) ?>" placeholder="Kode Penjualan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Tanggal Penjualan : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control datepicker" id="tgl_penjualan" name="tgl_penjualan" placeholder="yyyy / mm / dd" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Kode Pelanggan : </label>
                                        <div class="col-lg">
                                            <select name="kd_pelanggan" id="kd_pelanggan" class="form-control" required>
                                                <option value=""> --->Pelanggan<--- </option> <?php foreach ($masterPelanggan as $mp) : ?>
                                                <option value="<?= $mp['kd_pelanggan']; ?>"><?= $mp['nama_pelanggan']; ?></option>
                                            <?php endforeach; ?>
                                            <!-- <input type="text" class="form-control" id="kd_pelanggan" name="kd_pelanggan" placeholder="Kode Pelanggan"> -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Nama Pelanggan : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Kode Barang : </label>
                                        <div class="col-lg"> <select name="kd_barang" id="kd_barang" class="form-control" required>
                                                <option value=""> --->Barang<--- </option><?php foreach ($masterBarang as $mb) : ?>
                                                <option value="<?= $mb['kd_barang']; ?>"><?= $mb['nama_barang']; ?></option>
                                            <?php endforeach; ?>
                                            <!-- <input type="text" class="form-control" id="kd_barang" name="kd_barang" placeholder="Kode Barang"> -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Nama Barang : </label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Harga : </label>
                                        <div class="col-lg">
                                            <input type="number" step="any" class="form-control" id="harga" name="harga" placeholder="Harga">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-form-label col-lg label-align">QTY : </label>
                                        <div class="col-lg">
                                            <input type="number" step="any" class="form-control" id="qty" name="qty" placeholder="QTY" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-form-label col-lg label-align">Jumlah : </label>
                                        <div class="col-lg">
                                            <input type="number" step="any" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                                        </div>
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit Modal -->
                <?php foreach ($transaksiPenjualan as $etp) : ?>
                    <div class="modal fade" id="editTransaksiPenjualanModal<?= $etp['kd_penjualan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editTransaksiPenjualanModal<?= $etp['kd_penjualan'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTransaksiPenjualanModal<?= $etp['kd_penjualan'] ?>">Edit Penjualan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/editTransaksiPenjualan/' . $etp['kd_penjualan']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Kode Penjualan : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $etp['kd_penjualan'] ?>" readonly id="kd_penjualan" name="kd_penjualan" placeholder="Kode Penjualan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Tanggal Penjualan : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control datepicker" value="<?= $etp['tgl_penjualan'] ?>" id="tgl_penjualan" name="tgl_penjualan" placeholder="Tanggal Penjualan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Kode Pelanggan : </label>
                                            <div class="col-lg"> <select name="kd_pelanggan" id="kd_pelanggan" class="form-control">
                                                    <?php foreach ($masterPelanggan as $mpp) : ?>
                                                        <?php if ($etp['kd_pelanggan'] == $mpp['kd_pelanggan']) : ?>
                                                            <option value="<?= $mpp['kd_pelanggan']; ?>" selected> <?= $mpp['nama_pelanggan']; ?> </option>
                                                        <?php else : ?>
                                                            <option value="<?= $mpp['kd_pelanggan']; ?>"> <?= $mpp['nama_pelanggan']; ?> </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <!-- <input type="text" class="form-control" id="kd_barang" name="kd_barang" placeholder="Kode Barang"> -->
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Nama Pelanggan : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $etp['nama_pelanggan'] ?>" id="nama_pelanggan" name="kd_pelanggan" placeholder="Nama Pelanggan">
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Kode Barang : </label>
                                            <div class="col-lg"> <select name="kd_barang" id="kd_barang" class="form-control">
                                                    <?php foreach ($masterBarang as $mbb) : ?>
                                                        <?php if ($etp['kd_barang'] == $mbb['kd_barang']) : ?>
                                                            <option value="<?= $mbb['kd_barang']; ?>" selected> <?= $mbb['nama_barang']; ?> </option>
                                                        <?php else : ?>
                                                            <option value="<?= $mbb['kd_barang']; ?>"> <?= $mbb['nama_barang']; ?> </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <!-- <input type="text" class="form-control" id="kd_barang" name="kd_barang" placeholder="Kode Barang"> -->
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Nama Barang : </label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" value="<?= $etp['nama_barang'] ?>" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Harga : </label>
                                            <div class="col-lg">
                                                <input type="number" step="any" class="form-control" value="<?= $etp['harga'] ?>" id="harga" name="harga" placeholder="Harga">
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-form-label col-lg label-align">QTY : </label>
                                            <div class="col-lg">
                                                <input type="number" step="any" class="form-control" value="<?= $etp['qty'] ?>" id="qty" name="qty" placeholder="QTY">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-form-label col-lg label-align">Jumlah : </label>
                                            <div class="col-lg">
                                                <input type="number" step="any" class="form-control" value="<?= $etp['harga'] * $etp['qty'] ?>" id="jumlah" name="jumlah" placeholder="Jumlah">
                                            </div>
                                        </div> -->
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