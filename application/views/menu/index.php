                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i>Add New Menu</a>
                            <table class="table  table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="100">No.</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col" width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <th scope="row" align="center"><?= $i ?></th>
                                            <td><?= $m['menu']; ?></td>
                                            <td align="center">
                                                <a href="" data-toggle="modal" data-target="#editMenuModal<?= $m['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                                <a href="<?= base_url('menu/deleteMenu/' . $m['id']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $m['menu']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
                <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('menu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
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

                <!-- edit Modal -->
                <?php foreach ($menu as $em) : ?>
                    <div class="modal fade" id="editMenuModal<?= $em['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModal<?= $em['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMenuModal<?= $em['id'] ?>">Edit Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('menu/editMenu/' . $em['id']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $em['menu'] ?>" id="menu" name="menu" placeholder="Menu name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- End edit Modal -->