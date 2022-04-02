<div class="modal fade bd-example-modal-lg" id="MapsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: #222222;">
      <!-- Modal -->
      <div class="modal-header ">
        <h5 class="modal-title text-white" id="exampleModalLabel">Maps</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table id="maps" class="table table-striped table-bordered rounded text-white" style="width: 100%; background-color: #222222;">
        <thead>
            <tr>
                <th style="color: white;">Map Name</th>
                <th style="color: white;">Max Players</th>
                <th style="color: white;">Required level</th>
            </tr>
        </thead>
        <tbody>
<?php
$db = getDB();
$sql = $db->prepare("SELECT * FROM meh_maps WHERE staffOnly <= 0");
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
echo '
<tr style="background-color: #222222;">
<td class="text-white">' . $row['Name'] . '</td>
<td class="text-white">' . $row['PlayersMax'] .'</td>
<td class="text-white">' . $row['ReqLevel'] . '</td>
</td>
</tr>
';
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

<div class="modal fade bd-example-modal-lg" id="DonationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: #222222;">
      <!-- Modal -->
      <div class="modal-header ">
        <h5 class="modal-title text-white" id="exampleModalLabel">Best Donators!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table id="maps" class="table table-striped table-bordered rounded text-white" style="width: 100%; background-color: #222222;">
        <thead>
            <tr>
                <th style="color: white;">Username</th>
                <th style="color: white;">Ammount</th>
                <th style="color: white;">Last Purchase</th>
            </tr>
        </thead>
        <tbody>
<?php
$db = getDB();
$sql = $db->prepare("SELECT * FROM meh_users WHERE Access <= 39 AND Donations > 0 ORDER BY Donations DESC");
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
echo '
<tr style="background-color: #222222;">
<td class="text-white">' . $row['Username'] . '</td>
<td class="text-white">$' . $row['Donations'] .'</td>
<td class="text-white">' . $row['Purchase'] . '</td>
</td>
</tr>
';
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
