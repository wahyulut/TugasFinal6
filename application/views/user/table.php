<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Profesional</th>
            <th scope="col">Intergritas</th>
            <th scope="col">Amanah</th>
            <th scope="col">CPK</th>
            <th scope="col">Absensi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        <?php foreach ($pegawai as $pgw) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $pgw->nama ?></td>
                <td><?= $pgw->profesional ?></td>
                <td><?= $pgw->intergritas ?></td>
                <td><?= $pgw->amanah ?></td>
                <td><?= $pgw->cpk ?></td>
                <td><?= $pgw->absensi ?></td>
                <?php $i++ ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>