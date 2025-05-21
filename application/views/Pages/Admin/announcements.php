<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Announcements</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Announcements</li>
                    </ol>
                </div>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add Announcement</button>
                </div>
            </div>

            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">Manage Announcements</h6>
                                <p class="text-muted card-sub-title">Create, edit, or delete announcements</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered border-bottom dataTable" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">S/N</th>
                                            <th class="wd-20p">Title</th>
                                            <th class="wd-30p">Content</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-15p">Created</th>
                                            <th class="wd-10p">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; foreach ($announcements as $announcement) : ?>
                                            <tr>
                                                <td><?= $count++ ?>.</td>
                                                <td><?= $announcement['title'] ?></td>
                                                <td><?= substr($announcement['content'], 0, 50) ?>...</td>
                                                <td>
                                                    <?= $announcement['is_active'] ? 
                                                        '<span class="badge bg-success">Active</span>' : 
                                                        '<span class="badge bg-danger">Inactive</span>' ?>
                                                </td>
                                                <td><?= date('Y-m-d', strtotime($announcement['created_at'])) ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $announcement['id'] ?>">Edit</button>
                                                    <a href="<?= base_url('admin/delete_announcement/' . $announcement['id']) ?>" 
                                                       class="btn btn-sm btn-danger" 
                                                       onclick="return confirm('Are you sure you want to delete this announcement?')">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal<?= $announcement['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Announcement</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('admin/edit_announcement/' . $announcement['id']) ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title" value="<?= $announcement['title'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="content" class="form-label">Content</label>
                                                                    <textarea class="form-control" id="content" name="content" rows="4" required><?= $announcement['content'] ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="is_active" class="form-label">Status</label>
                                                                    <select class="form-control" id="is_active" name="is_active">
                                                                        <option value="1" <?= $announcement['is_active'] ? 'selected' : '' ?>>Active</option>
                                                                        <option value="0" <?= !$announcement['is_active'] ? 'selected' : '' ?>>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Create New Announcement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/create_announcement') ?>" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="is_active" class="form-label">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>