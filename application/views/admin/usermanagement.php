                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Registered</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($users as $u) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $u['name']; ?></td>
                                                        <td><?= $u['email']; ?></td>
                                                        <td>
                                                            <?php if ($u['id'] == 1) : ?>
                                                                <span class="badge badge-primary"><?= $u['role']; ?></span>
                                                            <?php else : ?>
                                                                <a href="#" data-toggle="modal" data-target="#changeRoleModal<?= $u['id'] ?>" class="badge badge-info">
                                                                    <?= $u['role']; ?> <i class="fas fa-edit"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($u['is_active'] == 1) : ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger">Inactive</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= date('d M Y', $u['date_created']); ?></td>
                                                        <td class="text-nowrap">
                                                            <?php if ($u['id'] != 1) : ?>
                                                                <div class="btn-group" role="group">
                                                                    <?php if ($u['is_active'] == 1) : ?>
                                                                        <a href="<?= base_url('admin/deactivateUser/' . $u['id']); ?>" class="btn btn-warning btn-sm delete-confirm" data-item="<?= $u['name']; ?>" data-action="deactivate">
                                                                            <i class="fas fa-ban"></i> Deactivate
                                                                        </a>
                                                                    <?php else : ?>
                                                                        <a href="<?= base_url('admin/activateUser/' . $u['id']); ?>" class="btn btn-success btn-sm delete-confirm" data-item="<?= $u['name']; ?>" data-action="activate">
                                                                            <i class="fas fa-check"></i> Activate
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <a href="<?= base_url('admin/deleteUser/' . $u['id']); ?>" class="btn btn-danger btn-sm delete-confirm" data-item="<?= $u['name']; ?>">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </a>
                                                                </div>
                                                            <?php else : ?>
                                                                <span class="text-muted">Super Admin</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Change Role Modal -->
                <?php foreach ($users as $u) : ?>
                    <?php if ($u['id'] != 1) : ?>
                        <div class="modal fade" id="changeRoleModal<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="changeRoleModalLabel<?= $u['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changeRoleModalLabel<?= $u['id'] ?>">Change Role for <?= $u['name']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/changeUserRole/' . $u['id']); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="role_id">Select Role</label>
                                                <select name="role_id" id="role_id" class="form-control" required>
                                                    <?php foreach ($roles as $r) : ?>
                                                        <option value="<?= $r['id']; ?>" <?= ($u['role_id'] == $r['id']) ? 'selected' : ''; ?>>
                                                            <?= $r['role']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update Role</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- End Change Role Modal -->
