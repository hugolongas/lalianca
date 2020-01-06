<?php 
    $posts = get_posts(array (
        'post_type' => 'event',
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => 'ASC',
    ));
?>

<select name="Event" class="ticket-line">
	<?php foreach($posts as $post):?>
    <option <?php if($post->ID == get_the_ID()) echo 'selected'; ?> value="<?php echo get_the_title($post->ID);?>"><?php echo get_the_title($post->ID);?></option>
	<?php endforeach; ?>
</select>