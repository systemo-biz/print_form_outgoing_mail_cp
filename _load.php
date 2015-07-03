<?php
/*
Plugin Name: CasePress. Печатная форма исходящего письма
Description: Позволяет распечатывать сопроводительные письма.
License: MIT
*/

class Print_Form_Order_Repair_CP_Singleton {
private static $_instance = null;
private function __construct() {
    add_action( 'template_redirect', array($this, 'view_cover_cp'), 0, 5);
    add_action('add_action_cp', array($this, 'add_view_cover_to_action_box'));
}

//загружаем шаблон из папки, если обнаружен параметр view=cover
function view_cover_cp() {

    if(empty($_REQUEST['view'])) return;

    if ( $_REQUEST['view'] == 'ishodyashhij-dokument' ) {
            include( plugin_dir_path(__FILE__) . 'tmpl.php' );
            exit();
    }
} 
    
 

function add_view_cover_to_action_box(){

    if (is_singular('cases') and has_term( 'ishodyashhij-dokument', 'functions')){ 
        $url = add_query_arg( array('view' => 'ishodyashhij-dokument'));
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
