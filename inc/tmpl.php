<!DOCTYPE html>

<html>
<head>
<title>
	<?php
		global $wpdb, $page;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
	?>
</title>
<?php
	$url=get_permalink();
	wp_head();
?>
    <link rel="stylesheet" id="print-css"  href='<?php echo plugins_url( 'style.css', __FILE__ ); ?>' type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
        //Вывод формы печати сразу после того как загрузим страницу
        jQuery(document).ready(function(){
            //window.print()
        });
    </script>
</head>

<body>

    <div id="content" class="clearfix">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); $post = get_post(); ?>
        
            <div id="print_wrapper" class="container">
                <p id="print"><a href="javascript:window.print()">Печать</a></p>
                <header class="row">
                    <div class="our_company_data col-xs-6">
                        <img src="<?php echo plugins_url( 'logo.png', __FILE__ ); ?>" alt="">
                        <p class="reg_num">Регистрационный номер № <?php the_ID(); ?> от <?php  the_date() ?></p>
                    </div>
                    <div class="client_wrapper col-xs-6">
                        <strong>Адресат:</strong>
                        <br />
                        <ul>
                            <li>Имя контактного лица: <?php echo get_post_meta($post->ID, 'contact_name', true); ?></li>
                            <li>Телефон основной: <?php echo get_post_meta($post->ID, 'tel', true); ?></li>
                            <li>Дополнительные контактные данные: <?php echo get_post_meta($post->ID, 'contact_ext', true); ?></li>
                        </ul>
                    </div>
                </header>
                <main class="clearfix">
                    <div>
                        <strong>Уважаемый</strong>
                    </div>

                    <div id="text_letter">
                        <p><?php echo $post->post_content; ?></p>
                    </div>
                </main>
                <footer id="sign_responsible">
                    <p>Подпись: </p>
                    <hr/>
                </footer>
            </div>
        
        <?php endwhile; ?>
    </div>
</body>
</html>