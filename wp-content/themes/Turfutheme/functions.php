<?php
add_theme_support( 'post-thumbnails' );



// Phrase d'admin perso
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	if ( 0 != $user_id ) {
		/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __('Bienvenue dans le Turfu, %1$s'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu( array(
			'id' => 'my-account',
			'parent' => 'top-secondary',
			'title' => $howdy . $avatar,
			'href' => $profile_url,
			'meta' => array(
			'class' => $class,
			),
		) );
	}
}


// Ajout d'un texte perso avant le nom de l'auteur
add_filter('the_author', 'custom_the_author');
function custom_the_author($author) {
	$my_custom_text = 'Prédiction de ';
	$author = $my_custom_text.$author;
	
	return $author;
}
