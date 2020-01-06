<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

require('../../wp-load.php');

include_once('../include/Config.php');

require '../libs/Slim/vendor/autoload.php';



$app = new \Slim\App();

$app->get('/news', function ($request, $response) {
    $recent_posts = wp_get_recent_posts();
    $newsArray = array();
    foreach($recent_posts as $post){
        
        $thePostID = $post["ID"];
        $post_thumbnail_id = get_post_thumbnail_id($thePostID);
        $post_img_url = wp_get_attachment_url( $post_thumbnail_id );  
        $news = new News($thePostID,$post['post_content'],$post['post_title'],$post['post_date'],$post_img_url);
        $newsArray[] = $news;
    };

    if (count($newsArray)>0) {
        return $response->withJson($newsArray); // Status=200 is default.
    } else {
        return null;
    }
});

$app->get('/events',function($request,$response){

    $query_l = new WP_Query(array (
        'post_type' => 'event',
        'posts_per_page' => 10,
        'orderby' => 'id',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => 'DESC'
    )); 
    $eventsArray = array();
    foreach($query_l->posts as $post){
        
        $thePostID = $post->ID;
        $options = get_post_meta($thePostID, 'slide_options', true);
        $price =  $options['event_price']['price'];
        $location = $options['event_location'];
        $post_thumbnail_id = get_post_thumbnail_id($thePostID);
        $post_img_url = wp_get_attachment_url( $post_thumbnail_id );
        $date = date_i18n(get_option('date_format'), get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));
        $event = new Event($thePostID,$post->post_content,$post->post_title,$price,$location,$date,$post_img_url);
        $eventsArray[] = $event;
    };

   if(count($eventsArray)>0)
   return $response->withJson($eventsArray); // Status=200 is default.
   else
   return null;
});

$app->get('/usuario', function ($request, $response) {
    $uName = $_SERVER['PHP_AUTH_USER'];
    $uPass = $_SERVER['PHP_AUTH_PW'];
    $hash = password_hash($uPass, PASSWORD_BCRYPT);

    $mysqli = mysqli_connect(DB_HOST_2, DB_USER_2, DB_PASSWORD_2, DB_NAME_2);
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

// Run app
$app->run();
