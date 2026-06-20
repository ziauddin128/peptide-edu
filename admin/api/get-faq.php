<?php
require "../config.php";

$sql = "SELECT * FROM `faq` ORDER BY `id` DESC";
$res = mysqli_query($conn, $sql);

$html = "";
if (mysqli_num_rows($res) > 0) {
  $sl = 1;
  while ($row = mysqli_fetch_assoc($res)) {
    $html .= '<tr id="data-row-' . $row['id'] . '">
                <td>' . $sl . '</td>
                <td>' . $row['question'] . '</td>
                <td>' . $row['answer'] . '</td>
                <td>
                  <div class="d-flex" style="gap: 5px">
                    <a href="edit-faq?id=' . $row['id'] . '" class="btn btn-warning py-2">Edit</a>
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
              </tr>';
}

echo $html;
