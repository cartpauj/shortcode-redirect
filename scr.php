<?php
/*
Plugin Name: ShortCode Redirect
Plugin URI: https://github.com/cartpauj/shortcode-redirect
Description: This plugin allows you to add a shortcode or a block to a page. When rendered it re-directs the user to a pre-defined URL. You can also set how many seconds to wait before redirecting the user.
Author: Cartpauj
Version: 1.1.0
Author URI: https://github.com/cartpauj

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if (!defined('SCR_VERSION')) {
	$scr_data = get_file_data(__FILE__, array('Version' => 'Version'));
	define('SCR_VERSION', $scr_data['Version'] ?: '0.0.0');
	unset($scr_data);
}

add_shortcode('redirect', 'scr_do_redirect');
function scr_do_redirect($atts)
{
	ob_start();
	$myURL = (isset($atts['url']) && !empty($atts['url'])) ? esc_url($atts['url']) : "";
	$mySEC = (isset($atts['sec']) && !empty($atts['sec']) && is_numeric($atts['sec'])) ? intval($atts['sec']) : 0;
	$showMsg = true;
	if (isset($atts['show_message'])) {
		$v = $atts['show_message'];
		if (is_bool($v)) {
			$showMsg = $v;
		} else {
			$lv = strtolower((string) $v);
			$showMsg = !in_array($lv, array('false', '0', 'no', 'off'), true);
		}
	}
	if(!empty($myURL))
  {
?>
		<meta http-equiv="refresh" content="<?php echo $mySEC; ?>; url=<?php echo $myURL; ?>">
<?php if ($showMsg) { ?>
		Please wait while you are redirected...or <a href="<?php echo $myURL; ?>">Click Here</a> if you do not want to wait.
<?php } ?>
<?php
	}
	return ob_get_clean();
}

add_action('init', 'scr_register_block');
function scr_register_block()
{
	if (!function_exists('register_block_type')) {
		return;
	}
	register_block_type(__DIR__ . '/block', array(
		'render_callback' => 'scr_render_block',
	));
}

function scr_render_block($attributes)
{
	return scr_do_redirect(array(
		'url'          => isset($attributes['url']) ? $attributes['url'] : '',
		'sec'          => isset($attributes['sec']) ? $attributes['sec'] : 0,
		'show_message' => isset($attributes['showMessage']) ? (bool) $attributes['showMessage'] : true,
	));
}

?>
