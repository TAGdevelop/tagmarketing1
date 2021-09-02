<?php
/*
 Show Site ID

 
*/
 
class Add_Blog_ID {
    public static function init() {
        $class = __CLASS__ ;
        if ( empty( $GLOBALS[ $class ] ) )
            $GLOBALS[ $class ] = new $class;
    }
    public function __construct() {
        add_filter( 'wpmu_blogs_columns', array( $this, 'get_id' ) );
        add_action( 'manage_sites_custom_column', array( $this, 'add_columns' ), 10, 2 );
        add_action( 'manage_blogs_custom_column', array( $this, 'add_columns' ), 10, 2 );
        add_action( 'admin_footer-sites.php', array( $this, 'add_style' ) );
    }

    private function array_put_to_position(&$array, $object, $position, $name = null) {
        $count = 0;
        $return = array();
        foreach ($array as $k => $v) {  
                // insert new object
                if ($count == $position) {  
                        if (!$name) $name = $count;
                        $return[$name] = $object;
                        $inserted = true;
                }  
                // insert old object
                $return[$k] = $v;
                $count++;
        }  
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        $array = $return;
        return $array;
    }

    public function add_columns( $column_name, $blog_id ) {
        if ( 'blog_id' === $column_name ) {
            echo $blog_id;
            //render column value
        } elseif ( 'template' === $column_name ) {
            echo get_blog_option($blog_id, 'template', "Default Value To Show if none");
        }
        return $column_name;
    }
    // Add in a column header
    public function get_id( $columns ) {
        $columns = $this->array_put_to_position($columns, 'ID', 1, 'blog_id');
        $columns['template'] = __('Using Theme');
        return $columns;
    }

    public function add_style() {
        echo '<style>#blog_id { width:7%; }</style>';
    }
}
add_action( 'init', array( 'Add_Blog_ID', 'init' ) );