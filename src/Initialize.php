<?php
namespace AgroTheme;

class Initialize
{
    /**
     * The single instance of the class.
     *
     * @var giorgiosaud
     * @since 2.1
     */
    protected static $_instance = null;
    public $version="1.0";
    /**
     * Main Giorgio Blog Instance.
     *
     * Ensures only one instance of giorgiosaud is loaded or can be loaded.
     *
     * @since 2.1
     * @static
     * @see giorgio()
     * @return giorgiosaud - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
                self::$_instance = new self();
        }
            return self::$_instance;
    }
        /**
     * Cloning is forbidden.
     *
     * @since 2.1
     */
    public function __clone()
    {
        wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'agro_theme'), '2.1');
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 2.1
     */
    public function __wakeup()
    {
        wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'agro_theme'), '2.1');
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
    /**
     * on creation of class execute.
     *
     * @param mixed $key Key name.
     * @return mixed
     */
    public function __construct()
    {
        $this->defineConstants();
        
        $this->initHooks();
        if (is_admin()) {
            $my_settings_page = new Options();
        }
        do_action('giorgioplugin_loaded');
    }
    /**
     * Define agro_theme Constants.
     */
    private function defineConstants()
    {
        $upload_dir = wp_upload_dir(null, false);
        $this->define('AGROTHEME_ABSPATH', dirname(AGROTHEME_FILE) . '/');
        $this->define('AGROTHEME_BASENAME', plugin_basename(AGROTHEME_FILE));
        $this->define('AGROTHEME_VERSION', $this->version);
        // $this->define( 'WEDCONTEST_DELIMITER', '|' );
        $this->define('AGROTHEME_LOG_DIR', $upload_dir['basedir'] . '/wed-logs/');
        // $this->define( 'WEDCONTEST_SESSION_CACHE_GROUP', 'wedcontest_session_id' );
        // $this->define( 'WEDCONTEST_TEMPLATE_DEBUG_MODE', false );
    }
    /**
     * Initialize Hooks
     */
    private function initHooks()
    {
        new \AgroTheme\Shortcodes\Initialize();
        // register_activation_hook( WEDCONTEST_PLUGIN_FILE, array( Install::class, 'install' ) );
        // new \Zonapro\WedContest\Capabilities\Initialize();
        
        // register_deactivation_hook(WEDCONTEST_PLUGIN_FILE, array( Uninstall::class, 'uninstall' ));
        // new \Zonapro\WedContest\CustomPosts\Initialize();
        // new \Zonapro\WedContest\Capabilities\Initialize();
        // add_action('init',array('\Zonapro\WedContest\PostTypes','create'));
        // add_action('init',array('\Zonapro\WedContest\Capabilities','update'));
        // register_shutdown_function( array( $this, 'log_errors' ) );
        // new \Zonapro\WedContest\Shortcodes\Initialize();
        // new \Zonapro\WedContest\Widgets\Initialize();
        // add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );
        // add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
        // add_action( 'init', array( $this, 'init' ), 0 );
        // add_action( 'init', array( 'WedContest_Shortcodes', 'init' ) );
        // add_action( 'init', array( 'WC_Emails', 'init_transactional_emails' ) );
        // add_action( 'init', array( $this, 'wpdb_table_fix' ), 0 );
        // add_action( 'switch_blog', array( $this, 'wpdb_table_fix' ), 0 );
    }
}
