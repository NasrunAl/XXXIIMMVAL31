<?php
// pages/history_content.php
include 'db_config.php';
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
$res = $mysqli->query("SELECT * FROM runs ORDER BY id DESC");
?>
<div class="panel">
  <h4 class="mb-3">Riwayat Perhitungan</h4>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Deskripsi</th>
        <th>Waktu</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php while($r=$res->fetch_assoc()){
        echo "<tr>
                <td>".htmlspecialchars($r['id'])."</td>
                <td>".htmlspecialchars($r['description'])."</td>
                <td>".htmlspecialchars($r['created_at'])."</td>
                <td><a class='btn btn-sm btn-primary' href='view_run.php?id=".$r['id']."'>View</a></td>
              </tr>";
    } ?>
    </tbody>
  </table>
</div>
