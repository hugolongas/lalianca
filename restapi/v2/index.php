<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

include_once('../include/Config.php');

require '../libs/Slim/vendor/autoload.php';



$app = new \Slim\App();

$app->get('/news', function ($request, $response) {    
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT p.id as ID,p.post_title as Title, p.post_content as Content,p.post_date as post_date, pa.guid as imgUrl 
    FROM wp_posts p    
    LEFT JOIN wp_posts pa ON p.id = pa.post_parent AND pa.post_type = 'attachment'
    where p.post_type = 'post'
    AND p.post_status = 'publish'
    ORDER BY p.post_date DESC";

    if (!$result = $mysqli->query($query)) {

        die('There was an error running the query: ' . $login . ' [' . $mysqli->error . ']');
    }
    $newsArray = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            $news = new News($row['ID'],$row['Content'],$row['Title'],$row['post_date'],$row['imgUrl']);
            $newsArray[] = $news;
        }
        return $response->withJson($newsArray); // Status=200 is default.
    } else
        return null;    
});

$app->get('/events',function($request,$response){
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($mysqli, "utf8");
    $query = "SELECT p.id as ID,p.post_title as Title, p.post_content as Content,mo.meta_value as options,md.meta_value as publish_date ,pa.guid as imgUrl from wp_posts p
    LEFT JOIN wp_postmeta mo ON p.id = mo.post_id AND mo.meta_key = 'slide_options'
    LEFT JOIN wp_postmeta md ON p.id = md.post_id AND md.meta_key LIKE '%_event_start%'
    LEFT JOIN wp_posts pa ON p.id = pa.post_parent AND pa.post_type = 'attachment'
    where p.post_type = 'event'
    AND p.post_status = 'publish'
    ORDER BY p.post_date DESC";

    if (!$result = $mysqli->query($query)) {

        die('There was an error running the query: ' . $login . ' [' . $mysqli->error . ']');
    }
    $eventsArray = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            $options =get_Options( $row['options']);
            $price =  $options['event_price']['price'];
            $location = $options['event_location'];
            $date = get_date($row['publish_date']);
            $event = new Event($row['ID'],$row['Content'],$row['Title'],$price,$location,$date,$row['imgUrl']);
            $eventsArray[] = $event;
        }
        return $response->withJson($eventsArray); // Status=200 is default.
    } else
        return null;
});

$app->get('/usuario', function ($request, $response) {
    $uName = $_SERVER['PHP_AUTH_USER'];
    $uPass = $_SERVER['PHP_AUTH_PW'];
    $hash = password_hash($uPass, PASSWORD_BCRYPT);

    $mysqli = mysqli_connect(DB_HOST1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1);
    mysqli_set_charset($mysqli, "utf8");
    $login = "SELECT password,soci_id FROM users where username='" . $uName . "'";

    if (!$result = $mysqli->query($login)) {

        die('There was an error running the query: ' . $login . ' [' . $mysqli->error . ']');
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password = $row['password'];
        $valid = password_verify($uPass, $password);
        if ($valid) {
            $soci_id = $row['soci_id'];
            $soci = "SELECT * FROM socis where id=".$soci_id;

            if (!$rSoci = $mysqli->query($soci)) {

                die('There was an error running the query: ' . $soci . ' [' . $mysqli->error . ']');
            }
            $data = $rSoci->fetch_assoc();
            return $response->withJson($data);
        } else {
            return "Constraseña incorrecta";
        }
    } else
        return "El usuario No Existe";
});
function get_Options( $data) {    
    $mydata = unserialize($data);
    return $mydata;
    }

    function get_date($timestamp) {
        $date = gmdate("Y-m-d\TH:i:s\Z", $timestamp);
        return $date;
    }

// Run app
$app->run();
