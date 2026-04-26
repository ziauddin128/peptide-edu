<?php
require "../admin/config.php";


$action = $_POST['action'];

if ($action == "get-peptides") {

  $categoryVal = $_POST['categoryVal'];
  $categoryType = $_POST['categoryType'];

  $category = "category1";
  if ($categoryType == "category2") {
    $category = "category2";
  }

  if ($categoryVal == "All") {
    $sql = "SELECT * FROM `peptides` ORDER BY `id` ASC";
    $res = $GLOBALS['conn']->prepare($sql);
    $res->execute();
  } else {
    $sql = "SELECT * FROM `peptides` WHERE `$category` = ? ORDER BY `id` ASC";
    $res = $GLOBALS['conn']->prepare($sql);
    $res->bind_param("s", $categoryVal);
    $res->execute();
  }

  $result = $res->get_result();

  if ($result->num_rows > 0) {
    $html = '<div class="row">';
    while ($row = $result->fetch_assoc()) {

      $categoryShow = ($category == "category1") ? $row['category1'] : $row['category2'];
      $name = ($category == "category1") ? $row['name1'] : $row['name2'];
      $short_desc = ($category == "category1") ? $row['short_desc1'] : $row['short_desc2'];
      $readMore = ($category == "category1") ? "Read More" : "Read More 2";

      $html .= '<div class="col-sm-6 col-md-4 col-lg-3">
              <div class="product-item">
                <div class="product-img">
                  <a href="details?id=' . $row['id'] . '">
                    <img src="admin/storage/' . $row['thumbnail'] . '" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-category">' . $categoryShow . '</div>
                  <h1>' . $name . '</h1>
                  <p>' . $short_desc . '</p>
                  <a href="details?id=' . $row['id'] . '">' . $readMore . '</a>
                </div>
              </div>
            </div>';
    }
    $html .= '</div>';

    $response = [
      "success" => true,
      "message" => "Found data",
      "data" => $html,
    ];
  } else {
    $response = [
      "success" => false,
      "message" => "No data available"
    ];
  }
}

echo json_encode($response);
