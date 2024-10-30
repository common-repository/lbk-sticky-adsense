<?php

// Exit if accessed directly
if ( !defined ( 'ABSPATH' ) ) exit;

if ( !class_exists( 'LBKStickyAdsenseAdmin' ) ) {
    /**
     * Class LBKStickyAdsenseAdmin
     */
    final class LBKStickyAdsenseAdmin {
        /**
         * Setup plugin for admin use
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function __construct() {
            $this->hooks();
        }

        /**
         * Add the core admin hooks.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        private function hooks() {
            add_action( 'admin_init', array( $this, 'registerScripts' ) );
            add_action( 'admin_menu', array( $this, 'menu' ) );
            add_action( 'admin_init', array( $this, 'register_lbk_sticky_adsense_general_settings') );
            // add_action( 'init', array( $this, 'registerMetaboxes' ), 99 );
            // add_action( 'plugin_action_links_' . LBK_FC_BASE_NAME, array( $this, 'pluginActionLinks' ), 10, 2 );
            // add_filter( 'plugin_action_links', array( $this, 'add_settings_link' ), 10, 2 );
        }
        /**
         * Register the scripts used in the admin
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function registerScripts() {
            wp_register_script( 'lbk_sticky_adsense_admin_script', LBK_STICKY_ADSENSE_URL . 'assets/js/admin.js', array( 'jquery'), LBKStickyAdsense::VERSION, true );
        }
        /**
         * Register settings.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function register_lbk_sticky_adsense_general_settings() { 
            // Register all settings for general settings page 
            register_setting( 'lbk_sticky_adsense_settings', 'sticky_adsense_client_id'); 

            register_setting( 'lbk_sticky_adsense_settings', 'display_sticky_adsense');
            register_setting( 'lbk_sticky_adsense_settings', 'hide_sticky_adsense_on_page');
            register_setting( 'lbk_sticky_adsense_settings', 'hide_sticky_adsense_on_single');
            register_setting( 'lbk_sticky_adsense_settings', 'hide_sticky_adsense_on_product_page');

            register_setting( 'lbk_sticky_adsense_settings', 'main_content_width');
            register_setting( 'lbk_sticky_adsense_settings', 'sticky_adsense_top_space');
            register_setting( 'lbk_sticky_adsense_settings', 'sticky_adsense_space'); 
            register_setting( 'lbk_sticky_adsense_settings', 'sticky_adsense_col_width'); 
        }

        /**
         * Callback to add the settings link to the plugin action links.
         * 
         * @access private
         * @since 1.0
         * @static
         * 
         * @param $links
         * @param $file
         * 
         * @return array
         */
        public function pluginActionLinks( $links, $file ) {}

        /**
         * Callback to add plugin as a submenu page of the Options page.
         * 
         * This also adds the action to enqueue the scripts to be loaded on plugin's admin page only.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function menu() {
            $page = add_submenu_page( 
                'options-general.php',
                esc_html__( 'LBK Sticky Adsense', 'lbk-sticky-adsense' ),
                esc_html__( 'LBK Sticky Adsense', 'lbk-sticky-adsense' ),
                'manage_options',
                'lbk-sticky_adsense',
                array( $this, 'page' )
            );

            add_action( 'admin_print_styles-' . $page, array( $this, 'enqueueScripts' ) );
        }

        /**
         * Enqueue the scripts.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function enqueueScripts() {
            wp_enqueue_script( 'lbk_sticky_adsense_admin_script' );
        }

        /**
         * Callback used to render the admin options page.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function page() {
            include LBK_STICKY_ADSENSE_PATH . 'includes/inc.admin-options-page.php';
        }
    }

    new LBKStickyAdsenseAdmin();
}