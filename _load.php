<?php
/*
Plugin Name: CasePress. Печатная форма исходящего письма
Description: Позволяет распечатывать сопроводительные письма.
License: MIT
Plugin URI: https://github.com/systemo-biz/print_form_outgoing_mail_cp
GitHub Plugin URI: https://github.com/systemo-biz/print_form_outgoing_mail_cp
GitHub Branch: master
Version: 20150701-1
*/

class Print_Form_Order_Repair_CP_Singleton {
    
var $case_category = "ishodyashhij-dokument"; //задаем slug термина таксономии functions у которой будет появляться ссылка
var $url_key = "print-ishodyashhij-dokument"; //параметр url по которому будет генерироваться форма
    
private static $_instance = null;
private function __construct() {
    add_action( 'template_redirect', array($this, 'view_cover_cp'), 0, 5);
    add_action('add_action_cp', array($this, 'add_view_cover_to_action_box'));
}

//загружаем шаблон из папки, если обнаружен параметр view=cover
function view_cover_cp() {

    if(empty($_REQUEST['view'])) return;

    if ( $_REQUEST['view'] == $this->url_key ) {
            include( plugin_dir_path(__FILE__) . 'inc/tmpl.php' );
            exit();
    }
} 
    
 

function add_view_cover_to_action_box(){

    if (is_singular('cases') and has_term($this->case_category, 'functions')){ 
        $url = add_query_arg( array('view' => $this->url_key));
        ?>
        <li>
            <a href="<?php echo $url ?>" target="_blank">Печать исходящего письма</a>
        </li>
        <?php
    }
} 
    
     
/**
 * Служебные функции одиночки
 */
protected function __clone() {
	// ограничивает клонирование объекта
}
static public function getInstance() {
	if(is_null(self::$_instance))
	{
	self::$_instance = new self();
	}
	return self::$_instance;
}    
    
} $Print_Form_Order_Repair_CP = Print_Form_Order_Repair_CP_Singleton::getInstance();
