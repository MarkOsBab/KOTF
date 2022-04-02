<div class="modal fade bd-example-modal-lg" id="RankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: #222222;">
      <!-- Modal -->
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">Ranking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="ranking" class="table table-striped table-bordered rounded text-white" style="width: 100%; background-color: #222222;">
        <thead>
            <tr>

                <th class="text-white">Username</th>
                <th class="text-white">Level</th>
                <th class="text-white">Kills</th>
                <th class="text-white">Deaths</th>
                <th class="text-white">Monster Kills</th>
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
<tr style="background-color: #222222;">
<td class="text-white"><?php echo $user['Username'] ?></td>
<td class="text-white"><?php echo $user['Level'] ?></td>
<td class="text-white"><?php  echo $user['Kills'] ?></td>
<td class="text-white"><?php echo $user['Deaths'] ?></td>
<td class="text-white"><?php echo $user['MKills'] ?></td>
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