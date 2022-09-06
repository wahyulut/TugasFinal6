<div class="judul">
    <h3>Pusat Centorid</h3>
</div>
<div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Centroid</th>
                <th scope="col">Profesional</th>
                <th scope="col">Intergritas</th>
                <th scope="col">Amanah</th>
                <th scope="col">CPK</th>
                <th scope="col">Absensi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($status as $sts) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $sts->prof ?></td>
                    <td><?= $sts->inter ?></td>
                    <td><?= $sts->ama ?></td>
                    <td><?= $sts->cp ?></td>
                    <td><?= $sts->abs ?></td>
                    <?php $i++ ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= base_url('edit')?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">edit</a>