<div class="main-content side-content pt-0">
    <div class="main-container container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Transactions</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">All Transactions List</h6>
                                <p class="text-muted card-sub-title">Searching, ordering and paging can be done on the user lists</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered border-bottom dataTable" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>User</th>
                                            <th>Transaction Type</th>
                                            <th>Amount</th>
                                            <th>Amount Charged</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactions as $transaction) : ?>
                                            <tr>
                                                <td><?= $transaction['transaction_id'] ?></td>
                                                <td><?= $this->crud_model->get_user_fullname($transaction['user']) ?></td>
                                                <td><?= $transaction['transaction_type'] ?></td>
                                                <td><?= $transaction['amount'] ?></td>
                                                <td><?= $transaction['amount_charged'] ?></td>
                                                <td><?= $transaction['description'] ?></td>
                                                <td><?= $transaction['date'] ?></td>
                                              <td>
                                                <?php
                                                        $status = (int)$transaction['status'];
                                                        $statusBadge = [
                                                            0 => '<span class="badge bg-warning">Pending</span>',
                                                            1 => '<span class="badge bg-success">Paid</span>',
                                                            2 => '<span class="badge bg-danger">Failed</span>',
                                                            3 => '<span class="badge bg-secondary">Reversed</span>',
                                                        ];
                                                        echo $statusBadge[$status] ?? '<span class="badge bg-dark">Unknown</span>';
                                                    ?>
                                                </td>

                                               <td>
                                                    <?php if ($transaction['transaction_type'] !== 'Payment Reversal') : ?>
                                                        <?php if ($transaction['status'] == 1) : ?>
                                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#reverseModal" data-transaction-id="<?= $transaction['transaction_id'] ?>" data-user-id="<?= $transaction['user'] ?>" data-user-name="<?= $this->crud_model->get_user_fullname($transaction['user']) ?>" data-amount="<?= $transaction['amount'] ?>">Reverse</button>
                                                        <?php endif; ?>
                                                        <?php if (in_array($transaction['status'], [0, 2, 3])) : ?>
                                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#confirmModal" data-transaction-id="<?= $transaction['transaction_id'] ?>" data-user-id="<?= $transaction['user'] ?>" data-user-name="<?= $this->crud_model->get_user_fullname($transaction['user']) ?>" data-amount="<?= $transaction['amount'] ?>">Confirm</button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>
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

<!-- Reverse Payment Modal -->
<div class="modal fade" id="reverseModal" tabindex="-1" aria-labelledby="reverseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reverseModalLabel">Confirm Reverse Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reverse this payment?</p>
                <p><strong>Transaction ID:</strong> <span id="reverseTransactionId"></span></p>
                <p><strong>User:</strong> <span id="reverseUserName"></span> (<span id="reverseUserId"></span>)</p>
                <p><strong>Amount:</strong> <span id="reverseAmount"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmReverseBtn">Reverse Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Payment Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to confirm this payment?</p>
                <p><strong>Transaction ID:</strong> <span id="confirmTransactionId"></span></p>
                <p><strong>User:</strong> <span id="confirmUserName"></span> (<span id="confirmUserId"></span>)</p>
                <p><strong>Amount:</strong> <span id="confirmAmount"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirmPaymentBtn">Confirm Payment</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Reverse Modal
    document.getElementById('reverseModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const transactionId = button.getAttribute('data-transaction-id');
        const userId = button.getAttribute('data-user-id');
        const userName = button.getAttribute('data-user-name');
        const amount = button.getAttribute('data-amount');

        this.querySelector('#reverseTransactionId').textContent = transactionId;
        this.querySelector('#reverseUserId').textContent = userId;
        this.querySelector('#reverseUserName').textContent = userName;
        this.querySelector('#reverseAmount').textContent = amount;

        this.querySelector('#confirmReverseBtn').onclick = function () {
            fetch('<?= base_url('admin/reverse_payment') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ transaction_id: transactionId, user_id: userId, amount: amount })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Payment reversed successfully.');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => alert('An error occurred: ' + error.message));
            bootstrap.Modal.getInstance(this).hide();
        }.bind(this);
    });

    // Confirm Modal
    document.getElementById('confirmModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const transactionId = button.getAttribute('data-transaction-id');
        const userId = button.getAttribute('data-user-id');
        const userName = button.getAttribute('data-user-name');
        const amount = button.getAttribute('data-amount');

        this.querySelector('#confirmTransactionId').textContent = transactionId;
        this.querySelector('#confirmUserId').textContent = userId;
        this.querySelector('#confirmUserName').textContent = userName;
        this.querySelector('#confirmAmount').textContent = amount;

        this.querySelector('#confirmPaymentBtn').onclick = function () {
            fetch('<?= base_url('admin/confirm_payment') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ transaction_id: transactionId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Payment confirmed successfully.');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => alert('An error occurred: ' + error.message));
            bootstrap.Modal.getInstance(this).hide();
        }.bind(this);
    });
</script>