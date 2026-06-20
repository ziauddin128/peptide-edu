<?php
require "../config.php";

$sql = "SELECT * FROM `peptides` ORDER BY `id` DESC";
$res = mysqli_query($conn, $sql);

$html = "";

if (mysqli_num_rows($res) > 0) {
  $sl = 1;
  while ($row = mysqli_fetch_assoc($res)) {
    $html .= '<tr id="data-row-' . $row['id'] . '">
                <td>' . $sl . '</td>
                <td>' . $row['name1'] . '</td>
                <td>' . $row['category1'] . '</td>
                <td>
                  <img src="storage/' . $row['thumbnail'] . '" style="width: 80px; height: 80px; border-radius: 0px; object-fit: contain"/>
                </td>
                <td>
                  <a href="storage/' . $row['coa'] . '" target="_blank" class="btn btn-primary py-2">View CoA</a>
                </td>
                 <td>
                  <a href="sds?id=' . $row['id'] . '" class="btn btn-success py-2">SDS</a>
                </td>
                <td>
                  <div class="d-flex" style="gap: 5px">
                    <a href="edit-peptide?id=' . $row['id'] . '" class="btn btn-warning py-2">Edit</a>
                    <button class="btn btn-danger py-2" id="delete-btn" data-id="' . $row['id'] . '">Delete</button>
                  </div>
                </td>
              </tr>';
    $sl++;
  }
} else {
  $html .= '<tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>';
}
echo $html;
