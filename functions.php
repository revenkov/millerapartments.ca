<?php
$includes = array(
    'includes/vendor/autoload.php',
	'includes/functions.php',
    'includes/init.php',
    'includes/scripts.php',
    'includes/ajax.php',
	'includes/woocommerce.php',
);

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'selectrum'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
