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
                <hr>
                <header class="row">
                    <div class="our_company_data col-xs-6">
                        <img src="<?php echo plugins_url( 'logo.png', __FILE__ ); ?>" style="width: 200px;">
                        <div><small>Сайт: <a href="http://systemo.biz">systemo.biz</a></small></div>
                        <div><small>Телефон: <a href="tel:+78002008812">+7 (800) 200 8812</a></small></div>
                        <div><small>Электронная почта: <a href="email:s@systemo.biz">s@systemo.biz</a></small></div>
                        <div><small>Почтовый адрес: <br/>625039, г. Тюмень, а/я 6490</small></div>
                        <div class="reg_num"><small>Исх. № <?php the_ID(); ?> от <?php  the_date() ?></small></div>
                    </div>
                    <div class="client_wrapper col-xs-6">
                        <strong>Адресат:</strong>
                        <?php
                            $reporter = get_post_meta($post->ID, 'cp_to', true);
                            $reporter = get_post($reporter);

                        ?>
                        <br />
                        <div>
                            <div>
                                <small>Наименование:</small><br><?php echo $reporter->post_title; ?>
                            </div>
                            <div>
                                <small>Почтовый адрес:</small><br><?php echo get_post_meta($reporter->ID, 'postadress', true); ?>
                            </div>
                        </div>
                    </div>
                </header>
                <hr>
                <main class="clearfix">
                    <div id="text_letter">
                        <?php echo get_post_meta($post->ID, 'mail_text', true); ?>
                    </div>
                </main>
                <hr/>
                <footer id="sign_responsible">
                    <p>С уважением<br>компания Системо</p>
                </footer>
                <hr/>
            </div>

        <?php endwhile; ?>
    </div>
</body>
</html>
