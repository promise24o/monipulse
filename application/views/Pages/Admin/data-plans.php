<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Data Plans</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Plans</li>
                    </ol>
                </div>
            </div>
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">Data Plans</h6>
                                <p class="text-muted card-sub-title">Manage all data plans</p>
                            </div>
                            <ul class="nav nav-tabs mb-3" id="dataPlansTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="data24-tab" data-bs-toggle="tab" href="#data24" role="tab" aria-controls="data24" aria-selected="true">Data24 Data Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="jonet-tab" data-bs-toggle="tab" href="#jonet" role="tab" aria-controls="jonet" aria-selected="false">Jonet Data Plans</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="dataPlansTabContent">
                                <div class="tab-pane fade show active" id="data24" role="tabpanel" aria-labelledby="data24-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-bottom" id="data24_table" role="grid" aria-describedby="data24_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="wd-10p">S/N</th>
                                                    <th class="wd-20p">Network</th>
                                                    <th class="wd-25p">Data Plan</th>
                                                    <th class="wd-15p">Type</th>
                                                    <th class="wd-15p">Price</th>
                                                    <th class="wd-15p">Status</th>
                                                    <th class="wd-15p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1; 
                                                foreach ($data24_plans as $plan) : ?>
                                                    <tr>
                                                        <td><?= $count++ ?>.</td>
                                                        <td><?= htmlspecialchars($plan['network_name']) ?></td>
                                                        <td><?= htmlspecialchars($plan['dataplan']) ?></td>
                                                        <td><?= htmlspecialchars($plan['TYPE']) ?></td>
                                                        <td class="price-cell" data-plan-id="<?= $plan['id'] ?>"><?= htmlspecialchars($plan['price']) ?></td>
                                                        <td class="status-cell" data-plan-id="<?= $plan['id'] ?>"><?= htmlspecialchars($plan['status']) ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm update-price-btn" data-bs-toggle="modal" data-bs-target="#updateModalData24_<?= $plan['id'] ?>" data-plan-id="<?= $plan['id'] ?>" data-source="data24">Update</button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="updateModalData24_<?= $plan['id'] ?>" tabindex="-1" aria-labelledby="updateModalLabelData24_<?= $plan['id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateModalLabelData24_<?= $plan['id'] ?>">Update for <?= htmlspecialchars($plan['dataplan']) ?> (Data24)</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form class="update-price-form" data-plan-id="<?= $plan['id'] ?>" data-source="data24">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="plan_id" value="<?= $plan['id'] ?>">
                                                                        <input type="hidden" name="source" value="data24">
                                                                        <div class="mb-3">
                                                                            <label for="price" class="form-label">New Price</label>
                                                                            <input type="number" step="0.01" class="form-control" name="price" value="<?= $plan['price'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="status" class="form-label">Status</label>
                                                                            <select class="form-control" name="status" required>
                                                                                <option value="AVAILABLE" <?= $plan['status'] === 'AVAILABLE' ? 'selected' : '' ?>>AVAILABLE</option>
                                                                                <option value="unavailable" <?= $plan['status'] === 'unavailable' ? 'selected' : '' ?>>unavailable</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="alert alert-success d-none" id="success-message-<?= $plan['id'] ?>"></div>
                                                                        <div class="alert alert-danger d-none" id="error-message-<?= $plan['id'] ?>"></div>
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
                                <div class="tab-pane fade" id="jonet" role="tabpanel" aria-labelledby="jonet-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-bottom" id="jonet_table" role="grid" aria-describedby="jonet_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="wd-10p">S/N</th>
                                                    <th class="wd-15p">Network</th>
                                                    <th class="wd-20p">Data Plan</th>
                                                    <th class="wd-15p">Type</th>
                                                    <th class="wd-15p">Price</th>
                                                    <th class="wd-15p">Status</th>
                                                    <th class="wd-15p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1; 
                                                foreach ($jonet_plans as $plan) : ?>
                                                    <tr>
                                                        <td><?= $count++ ?>.</td>
                                                        <td><?= htmlspecialchars($plan['network']) ?></td>
                                                        <td><?= htmlspecialchars($plan['name']) ?></td>
                                                        <td><?= htmlspecialchars($plan['plan_type']) ?></td>
                                                        <td class="price-cell" data-plan-id="<?= $plan['id'] ?>"><?= htmlspecialchars($plan['price']) ?></td>
                                                        <td class="status-cell" data-plan-id="<?= $plan['id'] ?>"><?= htmlspecialchars($plan['status']) ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm update-price-btn" data-bs-toggle="modal" data-bs-target="#updateModalJonet_<?= $plan['id'] ?>" data-plan-id="<?= $plan['id'] ?>" data-source="jonet">Update</button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="updateModalJonet_<?= $plan['id'] ?>" tabindex="-1" aria-labelledby="updateModalLabelJonet_<?= $plan['id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateModalLabelJonet_<?= $plan['id'] ?>">Update for <?= htmlspecialchars($plan['name']) ?> (Jonet)</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form class="update-price-form" data-plan-id="<?= $plan['id'] ?>" data-source="jonet">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="plan_id" value="<?= $plan['id'] ?>">
                                                                        <input type="hidden" name="source" value="jonet">
                                                                        <div class="mb-3">
                                                                            <label for="price" class="form-label">New Price</label>
                                                                            <input type="number" step="0.01" class="form-control" name="price" value="<?= $plan['price'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="status" class="form-label">Status</label>
                                                                            <select class="form-control" name="status" required>
                                                                                <option value="AVAILABLE" <?= $plan['status'] === 'AVAILABLE' ? 'selected' : '' ?>>AVAILABLE</option>
                                                                                <option value="unavailable" <?= $plan['status'] === 'unavailable' ? 'selected' : '' ?>>unavailable</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="alert alert-success d-none" id="success-message-<?= $plan['id'] ?>"></div>
                                                                        <div class="alert alert-danger d-none" id="error-message-<?= $plan['id'] ?>"></div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-aio.min.js"></script>

<script>
$(document).ready(function() {
    const data24Table = $('#data24_table').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true,
        "pageLength": 10
    });

    const jonetTable = $('#jonet_table').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true,
        "pageLength": 10
    });

    $('.update-price-form').on('submit', function(e) {
        e.preventDefault();

        const form = $(this);
        const planId = form.data('plan-id');
        const source = form.data('source');
        const formData = form.serialize();
        const table = (source === 'jonet') ? jonetTable : data24Table;

        $.ajax({
            url: '<?= base_url('admin/update_data_plan_price') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Notiflix.Notify.success(response.message, {
                        timeout: 5923,
                        showOnlyTheLastOne: true,
                    });

                    table.clear();
                    response.updated_data.forEach(function(plan, index) {
                        if (source === 'jonet') {
                            table.row.add([
                                index + 1,
                                plan.network,
                                plan.name,
                                plan.plan_type,
                                plan.price,
                                plan.status,
                                `<button class="btn btn-primary btn-sm update-price-btn" data-bs-toggle="modal" data-bs-target="#updateModalJonet_${plan.id}" data-plan-id="${plan.id}" data-source="jonet">Update</button>`
                            ]);
                        } else {
                            table.row.add([
                                index + 1,
                                plan.network_name,
                                plan.dataplan,
                                plan.TYPE,
                                plan.price,
                                plan.status,
                                `<button class="btn btn-primary btn-sm update-price-btn" data-bs-toggle="modal" data-bs-target="#updateModalData24_${plan.id}" data-plan-id="${plan.id}" data-source="data24">Update</button>`
                            ]);
                        }
                    });
                    table.draw();

                    setTimeout(() => {
                        $('#updateModal' + (source === 'jonet' ? 'Jonet' : 'Data24') + '_' + planId).modal('hide');
                    }, 1500);
                } else {
                    $('#error-message-' + planId).removeClass('d-none').text(response.message);
                    $('#success-message-' + planId).addClass('d-none');
                }
            },
            error: function() {
                $('#error-message-' + planId).removeClass('d-none').text('An error occurred. Please try again.');
                $('#success-message-' + planId).addClass('d-none');
            }
        });
    });
});
</script>