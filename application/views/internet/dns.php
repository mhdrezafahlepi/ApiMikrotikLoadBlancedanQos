<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3>Konfigurasi DNS Servers</h3>
            <div class="card-body">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-queues">
                    Add DNS Servers
                </button>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Servers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($servers as $data) { ?>
                                <tr>
                                    <?php $id = str_replace('*', '', $data['.id']) ?>
                                    <th>1</th>
                                    <th><?= $data['servers']; ?></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add-queues" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title">Add DNS Servers</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= site_url('Internet/addDns') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="servers">Servers</label>
                            <input type="text" name="servers" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-light">Save</button>
                        </div>
                </form>
            </div>
        </div>