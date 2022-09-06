<form action="<?= base_url('hitung') ?>" method="post">
    <button type="submit" class="btn btn-primary btn-user btn-block" style="width: fit-content;">Refresh</button>
    <br>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Cluster 1</th>
                    <th scope="col">Cluster 2</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($cluster as $cls) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $cls->nama ?></td>
                        <td><?= $cls->cluster1 ?></td>
                        <td><?= $cls->cluster2 ?></td>
                        <td><?= $cls->status ?></td>
                        <?php $i++ ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>