<div class="modal fade bd-example-modal-lg" id="RankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-white text-white">
      <!-- Modal -->
      <div class="modal-header bg-white text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ranking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-white text-white">
      <table id="ranking" class="content table " style="width: 100%">
        <thead>
            <tr>

                <th>Username</th>
                <th>Level</th>
                <th>Kills</th>
                <th>Deaths</th>
                <th>Monster Kills</th>
            </tr>
        </thead>
        <tbody>
           
<?php
$db = getDB();
$sql = $db->prepare("SELECT * FROM meh_users WHERE Access <= 39 ORDER By Level DESC, Kills");
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $user) {
?>
<tr class="odd gradeX bg-white text-dark">
<td class="tablesell"><?php echo $user['Username'] ?></td>
<td class="tablesell"><?php echo $user['Level'] ?></td>
<td class="tablesell"><?php  echo $user['Kills'] ?></td>
<td class="tablesell"><?php echo $user['Deaths'] ?></td>
<td class="tablesell"><?php echo $user['MKills'] ?></td>
</td>
</tr>
<?php

}
?>

        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>