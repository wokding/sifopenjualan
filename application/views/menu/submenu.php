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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-fw fa-plus"></i>Add New Submenu</a>
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row" align="center"><?= $i ?></th>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td align="center"><?php if ($sm['is_active'] == 0) {
                                                                    echo "NO";
                                                                } else {
                                                                    echo "YES";
                                                                } ?></td>
                                            <td align="center">
                                                <a href="" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                                <a href="<?= base_url('menu/deleteSubMenu/' . $sm['id']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $sm['menu']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
                <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                                    </div>
                                    <div class="form-group">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active?
                                            </label>
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

                <!-- Edit Modal -->
                <?php foreach ($subMenu as $esm) : ?>
                    <div class="modal fade" id="editSubMenuModal<?= $esm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModal<?= $esm['id'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSubMenuModal<?= $esm['id'] ?>Label">Add New Sub Menu</h5>
                                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </buttond>
                                </div>
                                <form action="<?= base_url('menu/editSubMenu/' . $esm['id']); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $esm['title'] ?>" id="title" name="title" placeholder="Submenu Title">
                                        </div>
                                        <div class="form-group">
                                            <select name="menu_id" id="menu_id" class="form-control">
                                                <option>Select Menu</option>
                                                <?php foreach ($menu as $mm) : ?>
                                                    <?php if ($esm['menu_id'] == $mm['id']) : ?>
                                                        <option value="<?= $mm['id']; ?>" selected> <?= $mm['menu']; ?> </option>
                                                    <?php else : ?>
                                                        <option value="<?= $mm['id']; ?>"> <?= $mm['menu']; ?> </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $esm['url'] ?>" id="url" name="url" placeholder="Submenu Url">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $esm['icon'] ?>" id="icon" name="icon" placeholder="Submenu Icon">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <?php if ($esm['is_active'] == 1) : ?>
                                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active<?= $esm['id'] ?>" checked>
                                                <?php else : ?>
                                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active<?= $esm['id'] ?>">
                                                <?php endif; ?>
                                                <label class="form-check-label" for="is_active<?= $esm['id'] ?>">
                                                    Active?
                                                </label>
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
                <!-- End Edit Modal -->