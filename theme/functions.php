<?php

if ( ! function_exists( 'venus_child_styles' ) ) {
	function venus_child_styles() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'venus-child-style', get_stylesheet_uri(), array( 'venus-style' ), $theme_version );
		wp_style_add_data( 'venus-child-style', 'rtl', 'replace' );
//		 Add print css
		wp_enqueue_style( 'venus-child-print-style', get_stylesheet_directory_uri() . '/print.css', array(), $theme_version, 'print' );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_child_styles' );

if ( ! function_exists( 'venus_child_scripts' ) ) {
	function venus_child_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-child-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array( 'jquery' ), $theme_version );
		wp_script_add_data( 'venus-child-script', 'async', true );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_child_scripts' );

if ( ! function_exists( 'venus_child_block_editor_styles' ) ) {
	function venus_child_block_editor_styles() {
		wp_enqueue_style( 'venus-child-block-editor-styles', get_theme_file_uri( '/assets/css/editor-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
		wp_style_add_data( 'venus-child-block-editor-styles', 'rtl', 'replace' );

		wp_enqueue_script( 'venus-child-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array(
			'wp-blocks',
			'wp-dom'
		), wp_get_theme()->get( 'Version' ), true );
	}
}

add_action( 'enqueue_block_editor_assets', 'venus_child_block_editor_styles', 1, 1 );


if ( ! function_exists( 'venus_child_classic_editor_styles' ) ) {
	function venus_child_classic_editor_styles() {
		$classic_editor_styles = array(
			'/assets/css/editor-classic.css',
		);

		add_editor_style( $classic_editor_styles );
	}
}

add_action( 'init', 'venus_child_classic_editor_styles' );

if ( ! function_exists( 'venus_child_customize_controls_enqueue_scripts' ) ) {
	function venus_child_customize_controls_enqueue_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-child-customize', get_stylesheet_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'venus-child-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls.js', array(
			'venus-color-calculations',
			'customize-controls',
			'underscore',
			'jquery'
		), $theme_version, false );
	}
}

add_action( 'customize_controls_enqueue_scripts', 'venus_child_customize_controls_enqueue_scripts' );

if ( ! function_exists( 'venus_child_customize_preview_init' ) ) {
	function venus_child_customize_preview_init() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-child-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array(
			'customize-preview',
			'customize-selective-refresh',
			'jquery'
		), $theme_version, true );
	}
}

add_action( 'customize_preview_init', 'venus_child_customize_preview_init' );
