<?php
/**
 * Plugin Name: Messengers
 * Description: Плагин выводит мессенджеры через шорткод
 * Plugin URI:  https://z-website.ru
 * Author URI:  https://z-website.ru
 * Author:      Korablev Denis
 * Version:     Версия плагина, например 1.0
 *
 * Text Domain: Идентификатор перевода, указывается в load_plugin_textdomain()
 * Domain Path: /languages
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Network:     true
 */

wp_register_style('your_namespace', plugins_url('css/messengers.css',__FILE__ ));

add_shortcode( 'messengers_zw', function ( $atts ) { 	?>
    <?php $atts = shortcode_atts( array( 'size' => '20px',
										 'color' => '',
                                         'telegram_url' => '',
                                         'viber_url' => '',
                                         'whatsapp_url' => '',
                                         'vk_url' => '',
                                         'facebook_url' => '',
                                         'youtube_url' => '',
                                         'instagram_url' => '',
                                         ), $atts, 'messengers_zw' ); 
$urlplugin = plugin_dir_url( $file ) .'messengers';
$color_icon = $atts['color'];																										
$telegram_url = $atts['telegram_url'];
$viber_url = $atts['viber_url'];
$whatsapp_url = $atts['whatsapp_url'];
$facebook_url = $atts['facebook_url'];
$youtube_url = $atts['youtube_url'];
$instagram_url = $atts['instagram_url'];
$vk_url = $atts['vk_url'];
$messengers_zw = '<style>
.messengers_zw a {
    padding: 5px;
}
.messengers_zw {
    display: flex;
}
</style>';
$messengers_zw .= '<div class=messengers_zw>';
$icon_size = $atts['size'];					
$image_url = 'image/';
																																				
if ($color_icon == 'black' ) : {
$image_url = 'image_black/';
$image_postfix = '_black';
} elseif ($color_icon == 'color') : {
   $image_url = 'image_color/';
} elseif ($color_icon == 'white') : {
   $image_url = 'image_white/';
	  $image_postfix = '_white';
} endif;																									
if ( $telegram_url ) : {													
$messengers_zw .= '<a href="' . $telegram_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'Telegram'. $image_postfix. '.svg" alt="Написать в Telegram" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Написать в Telegram">
</a>';
} endif;
if ( $whatsapp_url ) : {
$messengers_zw .= '<a href="' . $whatsapp_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'WhatsApp'.$image_postfix.'.svg" alt="Написать в Whatsapp" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Написать в Whatsapp">
</a>';
} endif;
if ( $vk_url ) : {
$messengers_zw .= '<a href="' . $vk_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'VK'.$image_postfix.'.svg" alt="Написать в Vk" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Написать в Vk">
</a>';
} endif;
if ( $viber_url ) : {
$messengers_zw .= '<a href="' . $viber_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'Viber'.$image_postfix.'.svg" alt="Написать в Viber" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Написать в Viber">
</a>'; 
} endif;
if ( $facebook_url ) : {
$messengers_zw .= '<a href="' . $facebook_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'Facebook'.$image_postfix.'.svg" alt="Перейти в Facebook" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Перейти в Facebook">
</a>'; 
} endif;
if ( $youtube_url ) : {
$messengers_zw .= '<a href="' . $youtube_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'Youtube'.$image_postfix.'.svg" alt="Перейти в Yotube" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Перейти в Yotube">
</a>'; 
} endif;
if ( $instagram_url ) : {
$messengers_zw .= '<a href="' . $instagram_url . '"><img loading="lazy" 
src="' . $urlplugin .'/image/'.$image_url.'Instagram'.$image_postfix.'.svg" alt="Перейти в Instagram" class="zw-telegram" width="'.$icon_size.'" height="'.$icon_size.'" title="Перейти в Instagram">
</a>'; 
} endif;
$messengers_zw .= '</div>';
?>


<?php	return $messengers_zw;
wp_reset_postdata();
} );


add_action('admin_menu', function(){
	add_menu_page( 'Информация по выводу Shorctode плагина Messenger', 'Мессенджеры', 'manage_options', 'site-options', 'add_my_setting', '', 4 );
} );


function add_my_setting(){
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>
		<h3>Образец шоткода</h3>
		<p>[messengers_zw size=30px color=color telegram_url=https://tlg.name/donvoyagebot viber_url=viber://pa?chatURI=donvoyage whatsapp_url=https://api.whatsapp.com/send?phone=79381126161 vk_url=https://vk.me/club87612931  instagram_url=fdf facebook_url=555]</p>

		
	</div>
	<?php

}