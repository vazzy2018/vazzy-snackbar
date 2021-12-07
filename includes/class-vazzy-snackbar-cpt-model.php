<?php

/**
 * Post Model and ACF Group
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Vazzy_Snackbar
 * @subpackage Vazzy_Snackbar/includes
 */

/**
 * Post Model and ACF Group
 *.
 *
 * @since      1.0.0
 * @package    Vazzy_Snackbar
 * @subpackage Vazzy_Snackbar/includes
 * @author     Your Name <email@example.com>
 */
class Vazzy_Snackbar_Cpt_Model
{

	function __construct()
	{
	}

	public function register_cpt()
	{
		register_post_type('vazzy_snackbar', [
			'label'  => null,
			'labels' => [
				'name'               => 'Snackbars',
				'singular_name'      => 'Snackbar',
			],
			'description'         => '',
			'public'              => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_menu'        => true,
			'show_in_rest'        => false,
			'menu_icon'           => null,
			'hierarchical'        => false,
			'supports'            => ['title', 'editor'],
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
		]);
	}
}
