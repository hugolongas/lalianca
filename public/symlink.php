<?php
$target = '/home/rasendis/public_html/lalianca/storage/app/public';
$shortcut = '/home/rasendis/public_html/lalianca/public/storage';
symlink($target, $shortcut);
echo 'symlink'
?>