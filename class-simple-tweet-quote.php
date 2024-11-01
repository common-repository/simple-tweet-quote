<?php
/**
Plugin Name: Tweet Button for Quotes
Description: Allow your visitors to Tweet your blockquotes using a simple [tweetquote] shortcode.
Author: Benjamin Intal, Gambit Technologies, Inc.
Version: 1.0
Author URI: http://gambit.ph
Plugin URI: https://wordpress.org/plugins/simple-tweet-quote
Text Domain: tweet-quote
Domain Path: /languages
 *
 * The main plugin file
 *
 * @package Simple Tweet Quote
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

// Identifies the current plugin version.
defined( 'VERSION_SIMPLE_TWEET_QUOTE' ) || define( 'VERSION_SIMPLE_TWEET_QUOTE', '1.0' );

// The slug used for translations & other identifiers.
defined( 'SIMPLE_TWEET_QUOTE' ) || define( 'SIMPLE_TWEET_QUOTE', 'tweet-quote' );

// File path (needed for inter-file references).
defined( 'PATH_SIMPLE_TWEET_QUOTE' ) || define( 'PATH_SIMPLE_TWEET_QUOTE', __FILE__ );

// Initializes plugin class.
if ( ! class_exists( 'Simple_Tweet_Quote' ) ) {

	/**
	 * Initializes core plugin.
	 *
	 * @return	void
	 * @since	1.0
	 */
	class Simple_Tweet_Quote {

		/**
		 * Hook into WordPress.
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {

			// Our translations.
			add_action( 'init', array( $this, 'load_text_domain' ) );

			// PBS Link.
			add_filter( 'plugin_row_meta', array( $this, 'plugin_links' ), 10, 2 );

			// Shortcode.
			add_shortcode( 'tweetquote', array( $this, 'render_tweetquote' ) );
		}


		/**
		 * Loads the translations.
		 *
		 * @return	void
		 * @since	1.0
		 */
		public function load_text_domain() {
			load_plugin_textdomain( 'tweet-quote', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}


		/**
		 * Adds plugin links.
		 *
		 * @access	public
		 * @param	array  $plugin_meta The current array of links.
		 * @param	string $plugin_file The plugin file.
		 * @return	array The current array of links together with our additions.
		 * @since	1.0
		 **/
		public function plugin_links( $plugin_meta, $plugin_file ) {
			if ( plugin_basename( __FILE__ ) === $plugin_file ) {
				$plugin_data = get_plugin_data( __FILE__ );

				$plugin_meta[] = sprintf( "<a href='%s' target='_blank'>%s</a>",
					'https://pagebuildersandwich.com?utm_source=' . rawurlencode( $plugin_data['Name'] ) . '&utm_medium=plugin_link',
					__( 'This plugin is free, in exchange, please check out Page Builder Sandwich', 'tweet-quote' )
				);
			}
			return $plugin_meta;
		}

		/**
		 * Gets the Twitter user of the post author from Yoast SEO.
		 *
		 * @return string The Twitter user or blank if not available.
		 */
		public function get_twitter_user() {
			$user = '';

			global $post;
			if ( empty( $post ) ) {
				return '';
			}

			// Yoast puts the author's Twitter user here.
			$yoast_twitter = get_user_meta( $post->post_author, 'twitter', true );
			if ( ! empty( $yoast_twitter ) ) {
				$user = $yoast_twitter;
			}

			return apply_filters( 'stq_twitter_user', $user );
		}

		/**
		 * Creates a Tweet quote button or a blockquote with a Tweet button.
		 *
		 * @param array  $atts The attributes.
		 * @param string $content The content. If supplied, a blockquote will be rendered.
		 *
		 * @return The twitter button or a blockquote with a twitter button.
		 */
		public function render_tweetquote( $atts, $content = '' ) {

			$defaults = array(
				'via' => $this->get_twitter_user(),
				'related' => $this->get_twitter_user(),
				'url' => get_the_permalink(),
				'size' => 'large',
				'text' => '',
				'class' => '',
				'label' => __( 'Tweet', 'tweet-quote' ),
				'align' => 'right',
			);
			if ( empty( $atts ) ) {
				$atts = array();
			}
			$atts = array_merge( $defaults, $atts );

			if ( 'false' === $atts['via'] ) {
				$atts['via'] = '';
			}
			if ( 'false' === $atts['related'] ) {
				$atts['related'] = '';
			}

			ob_start();
			include( 'assets/js/script.js' );
			$script = ob_get_clean();

			wp_enqueue_script( 'simple-tweet-quote', '//platform.twitter.com/widgets.js' );
			wp_add_inline_script( 'simple-tweet-quote', $script, 'before' );
			wp_enqueue_style( 'simple-tweet-quote', plugins_url( 'assets/css/style.css', PATH_SIMPLE_TWEET_QUOTE ), array(), VERSION_SIMPLE_TWEET_QUOTE );

			$class = trim( 'stq_button ' . $atts['class'] );

			$ret = '<div class="stq_button_wrapper stq_' . esc_attr( $atts['align'] ) . '"><a '
				. 'href="https://twitter.com/share" '
				. 'rel="nofollow" '
				. 'data-size="' . esc_attr( $atts['size'] ) . '" '
				. 'data-text="' . esc_attr( $atts['text'] ) . '" '
				. 'data-url="' . esc_attr( $atts['url'] ) . '" '
				. 'class="twitter-share-button ' . esc_attr( $class ) . '" '
				. 'style="display: none; text-align: right" ';

			if ( ! empty( $atts['via'] ) ) {
				$ret .= 'data-via="' . esc_attr( $atts['via'] ) . '" ';
			}
			if ( ! empty( $atts['via'] ) ) {
				$ret .= 'data-related="' . esc_attr( $atts['related'] ) . '" ';
			}

			$ret .= '>' . esc_html( $atts['label'] ) . '</a></div>';

			if ( ! empty( $content ) ) {
				$ret = '<blockquote>' . do_shortcode( $content ) . $ret . '</blockquote>';
			}

			return apply_filters( 'stq_shortcode', $ret );
		}
	}

	new Simple_Tweet_Quote();
} // End if().
