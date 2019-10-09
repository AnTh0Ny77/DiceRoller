<?php
/*
Plugin Name: DiceRoller
Description: A DiceRoller plugin
Author: A Bizien
Version: 1.0
*/

include_once plugin_dir_path(__FILE__)."/DiceRoller.php";
add_action('widgets_init', function(){
	if ( is_user_logged_in() ) {
		register_widget('MultiDiceWidget');
	}
});

register_activation_hook(__FILE__, array('MultiDiceWidget', 'install'));
register_uninstall_hook(__FILE__, array('MultiDiceWidget', 'uninstall'));
add_action( 'init', array( 'MultiDiceWidget', 'traitement' ));
add_shortcode( 'liste_jets', 'MultiDiceWidget::liste_jets' );
