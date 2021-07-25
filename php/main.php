<?php   
	require_once 'session-start.php';
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
    }

    $id = $_SESSION['id'];
        require_once 'connect.php';

        /* проверка соединения */
        if ($mysqli->connect_errno) {
            printf("Соединение не удалось: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT * FROM `Person` WHERE `id` = $id ORDER by id";
        $query2 = "SELECT * FROM `Costs` WHERE `id_person` = $id ORDER BY date DESC";
        $query3 = "SELECT * FROM `Profit` WHERE `id_person` = $id ORDER BY date DESC";

        $vars = [];
        if ($result = $mysqli->query($query)) {
            while ($var = $result->fetch_assoc()) {
                $vars["id"] = $var["id"];
                $vars["name"] = $var["name"];
                $vars["surname"] = $var["surname"];
                $vars["mail"] = $var["mail"];
                $vars["currency"] = $var["currency"];
            }

        }

        $vars_cost = [];
        $cost = 0;
        if ($result = $mysqli->query($query2)) {
            $y = 0;
            while ($var = $result->fetch_assoc()) {
                $vars_cost[$y]["id"] = $var["id"];
                $vars_cost[$y]["cost"] = $var["cost"];
                $vars_cost[$y]["date"] = $var["date"];
                $vars_cost[$y]["account"] = $var["account"];
                $vars_cost[$y]["type"] = $var["type"];
                $y++;
            }
            $cost = $y;
        }
        $profit = 0;
        $vars_profit = [];
        if ($result = $mysqli->query($query3)) {
            $y = 0;
            while ($var = $result->fetch_assoc()) {
                $vars_profit[$y]["id"] = $var["id"];
                $vars_profit[$y]["profit"] = $var["profit"];
                $vars_profit[$y]["date"] = $var["date"];
                $vars_profit[$y]["account"] = $var["account"];
                $vars_profit[$y]["type"] = $var["type"];
                $y++;
            }
            $profit = $y;
        }

