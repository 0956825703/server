<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once "../config/connect.php";
include_once "../models/Cases.php";

$database = new Database();
$db = $database->connect();
$Case = new Cases($db);

$data = json_decode(file_get_contents("php://input"), true);

    // echo "req ====> ".$data['req'];
if (isset($data['req'])) {
    if ($data['req'] == "ปี 2563") {
        $data = $Case->getCase63();

        $itemCount = $data->rowCount();

        if ($itemCount > 0) {

            $CaseArr = array();
            $CaseArr["Case"] = array();
            $CaseArr["itemCount"] = $itemCount;

            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $Case = array(
                    "id" => $id,
                    "column_0" => $column_0,
                    "column_1" => $column_1,
                    "column_2" => $column_2,
                    "column_3" => $column_3,
                    "column_4" => $column_4,
                );
                array_push($CaseArr["Case"], $Case);
            }
            echo json_encode($CaseArr);
        } else {
            echo json_encode(
                array("message" => "No record found.")
            );
        }
    }else if ($data['req'] == "ปี 2562"){
        $data = $Case->getCase62();

        $itemCount = $data->rowCount();

        if ($itemCount > 0) {

            $CaseArr = array();
            $CaseArr["Case"] = array();
            $CaseArr["itemCount"] = $itemCount;

            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $Case = array(
                    "id" => $id,
                    "column_0" => $column_0,
                    "column_1" => $column_1,
                    "column_2" => $column_2,
                    "column_3" => $column_3,
                    "column_4" => $column_4,
                );
                array_push($CaseArr["Case"], $Case);
            }
            echo json_encode($CaseArr);
        } else {
            echo json_encode(
                array("message" => "No record found.")
            );
        }
    }
} else if (isset($data['text62'])) {
    $Case->column_0 = $data['text62'];
    $data = $Case->getCase62One();

    $itemCount = $data->rowCount();

    if ($itemCount > 0) {

        $CaseArr = array();
        $CaseArr["Case"] = array();
        $CaseArr["itemCount"] = $itemCount;

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $Case = array(
                "id" => $id,
                "column_0" => $column_0,
                "column_1" => $column_1,
                "column_2" => $column_2,
                "column_3" => $column_3,
                "column_4" => $column_4,
            );
            array_push($CaseArr["Case"], $Case);
        }
        echo json_encode($CaseArr);
    } else {
        echo json_encode(
            array("count" => 0)
        );
    }
} else if (isset($data['text63'])) {
    $Case->column_0 = $data['text63'];
    $data = $Case->getCase63One();

    $itemCount = $data->rowCount();

    if ($itemCount > 0) {

        $CaseArr = array();
        $CaseArr["Case"] = array();
        $CaseArr["itemCount"] = $itemCount;

        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $Case = array(
                "id" => $id,
                "column_0" => $column_0,
                "column_1" => $column_1,
                "column_2" => $column_2,
                "column_3" => $column_3,
                "column_4" => $column_4,
            );
            array_push($CaseArr["Case"], $Case);
        }
        echo json_encode($CaseArr);
    } else {
        echo json_encode(
            array("count" => 0)
        );
    }
} 