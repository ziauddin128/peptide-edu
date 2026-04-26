<?php
require "../config.php";

$sql = "SELECT * FROM `peptides` ORDER BY `id` DESC";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    $html = "";
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
                  <div class="d-flex" style="gap: 5px">
                    <button class="btn btn-warning py-2">Edit</button>
                    <button class="btn btn-danger py-2">Delete</button>
                  </div>
                </td>
              </tr>';
    }
}

echo $html;
