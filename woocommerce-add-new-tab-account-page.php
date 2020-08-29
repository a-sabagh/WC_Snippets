class AccountController {

    const my_account_tab_slug = 'rhs-service-orders';

    public function __construct($service_container){
        $this->register_my_account_tab_endpoint();
    }

    public function register_my_account_tab_endpoint(){
        add_action('init',function(){
            add_rewrite_endpoint( self::my_account_tab_slug, EP_ROOT | EP_PAGES );
        });
        add_filter('query_vars',function($vars){
            $vars[] = self::my_account_tab_slug;
            return $vars;
        });
        add_filter('woocommerce_account_menu_items',function($items){
            $items[self::my_account_tab_slug] = __("Service Orders","rhs");
            return $items;
        });
        add_action('woocommerce_account_' .self::my_account_tab_slug .'_endpoint',[$this,'my_account_service_orders']);
    }

    public function my_account_service_orders(){
        echo 'it work';
    }

}
