<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total Pengeluaran</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['tanggal']; ?></td>
          <td><?= $row['biaya']; ?></td>
      <?php endforeach ?>
    </tbody>
</table>