<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once "../config/connect.php";
include_once "../models/Excise.php";

$database = new Database();
$db = $database->connect();
$excise = new Excise($db);

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['req'])) {
    if ($data['req'] == "ปี 2562") {
        $data = $excise->getExcise62();
        $itemCount = $data->rowCount();
        if ($itemCount > 0) {
            $exciseArr = array();
            $exciseArr["excise"] = array();
            $exciseArr["itemCount"] = $itemCount;
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $excise = array(
                    "column_0" => $column_0,
                    "column_1" => $column_1,
                    "column_2" => $column_2,
                    "column_3" => $column_3,
                    "column_4" => $column_4,
                    "column_5" => $column_5,
                    "column_6" => $column_6,
                    "column_7" => $column_7,
                    "column_8" => $column_8,
                    "column_9" => $column_9,
                    "column_10" => $column_10,
                    "column_11" => $column_11,
                    "column_12" => $column_12,
                    "column_13" => $column_13,
                    "column_14" => $column_14,
                    "column_15" => $column_15,
                    "column_16" => $column_16,
                    "column_17" => $column_17,
                    "column_18" => $column_18,
                    "column_19" => $column_19,
                    "column_20" => $column_20,
                    "column_21" => $column_21,
                    "column_22" => $column_22,
                    "column_23" => $column_23,
                    "column_24" => $column_24,
                    "column_25" => $column_25,
                    "column_26" => $column_26,
                    "column_27" => $column_27,
                    "column_28" => $column_28,
                    "column_29" => $column_29,
                    "column_30" => $column_30,
                );
                array_push($exciseArr["excise"], $excise);
            }
            echo json_encode($exciseArr);
        } else {
            echo json_encode(
                array("message" => "No record found.")
            );
        }
    } else if ($data['req'] == "ปี 2563") {
        $data = $excise->getExcise63();
        $itemCount = $data->rowCount();
        if ($itemCount > 0) {
            $exciseArr = array();
            $exciseArr["excise"] = array();
            $exciseArr["itemCount"] = $itemCount;
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $excise = array(
                    "column_0" => $column_0,
                    "column_1" => $column_1,
                    "column_2" => $column_2,
                    "column_3" => $column_3,
                    "column_4" => $column_4,
                    "column_5" => $column_5,
                    "column_6" => $column_6,
                    "column_7" => $column_7,
                    "column_8" => $column_8,
                    "column_9" => $column_9,
                    "column_10" => $column_10,
                    "column_11" => $column_11,
                    "column_12" => $column_12,
                    "column_13" => $column_13,
                    "column_14" => $column_14,
                    "column_15" => $column_15,
                    "column_16" => $column_16,
                    "column_17" => $column_17,
                    "column_18" => $column_18,
                    "column_19" => $column_19,
                    "column_20" => $column_20,
                    "column_21" => $column_21,
                    "column_22" => $column_22,
                    "column_23" => $column_23,
                    "column_24" => $column_24,
                    "column_25" => $column_25,
                    "column_26" => $column_26,
                    "column_27" => $column_27,
                    "column_28" => $column_28,
                    "column_29" => $column_29,
                    "column_30" => $column_30,
                );
                array_push($exciseArr["excise"], $excise);
            }
            echo json_encode($exciseArr);
        } else {
            echo json_encode(
                array("message" => "No record found.")
            );
        }
    }
} else if (isset($data['text62'])) {
    $excise->column_8 = $data['text62'];
    $data = $excise->getExcise62One();
    $itemCount = $data->rowCount();
    if ($itemCount > 0) {
        $exciseArr = array();
        $exciseArr["excise"] = array();
        $exciseArr["itemCount"] = $itemCount;
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $excise = array(
                "column_0" => $column_0,
                "column_1" => $column_1,
                "column_2" => $column_2,
                "column_3" => $column_3,
                "column_4" => $column_4,
                "column_5" => $column_5,
                "column_6" => $column_6,
                "column_7" => $column_7,
                "column_8" => $column_8,
                "column_9" => $column_9,
                "column_10" => $column_10,
                "column_11" => $column_11,
                "column_12" => $column_12,
                "column_13" => $column_13,
                "column_14" => $column_14,
                "column_15" => $column_15,
                "column_16" => $column_16,
                "column_17" => $column_17,
                "column_18" => $column_18,
                "column_19" => $column_19,
                "column_20" => $column_20,
                "column_21" => $column_21,
                "column_22" => $column_22,
                "column_23" => $column_23,
                "column_24" => $column_24,
                "column_25" => $column_25,
                "column_26" => $column_26,
                "column_27" => $column_27,
                "column_28" => $column_28,
                "column_29" => $column_29,
                "column_30" => $column_30,
            );
            array_push($exciseArr["excise"], $excise);
        }
        echo json_encode($exciseArr);
    } else {
        echo json_encode(
            array("count" => 0)
        );
    }
} else if (isset($data['text63'])) {
    $excise->column_8 = $data['text63'];
    $data = $excise->getExcise63One();
    $itemCount = $data->rowCount();
    if ($itemCount > 0) {
        $exciseArr = array();
        $exciseArr["excise"] = array();
        $exciseArr["itemCount"] = $itemCount;
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $excise = array(
                "column_0" => $column_0,
                "column_1" => $column_1,
                "column_2" => $column_2,
                "column_3" => $column_3,
                "column_4" => $column_4,
                "column_5" => $column_5,
                "column_6" => $column_6,
                "column_7" => $column_7,
                "column_8" => $column_8,
                "column_9" => $column_9,
                "column_10" => $column_10,
                "column_11" => $column_11,
                "column_12" => $column_12,
                "column_13" => $column_13,
                "column_14" => $column_14,
                "column_15" => $column_15,
                "column_16" => $column_16,
                "column_17" => $column_17,
                "column_18" => $column_18,
                "column_19" => $column_19,
                "column_20" => $column_20,
                "column_21" => $column_21,
                "column_22" => $column_22,
                "column_23" => $column_23,
                "column_24" => $column_24,
                "column_25" => $column_25,
                "column_26" => $column_26,
                "column_27" => $column_27,
                "column_28" => $column_28,
                "column_29" => $column_29,
                "column_30" => $column_30,
            );
            array_push($exciseArr["excise"], $excise);
        }
        echo json_encode($exciseArr);
    } else {
        echo json_encode(
            array("count" => 0)
        );
    }
}
