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
    <link rel="stylesheet" id="print-css"  href='<?php echo plugins_url( '/style.css', __FILE__ ); ?>' type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
        //Вывод формы печати сразу после того как загрузим страницу
        jQuery(document).ready(function(){
            window.print()
        });
    </script>
</head>

<body>

    <div id="content" class="clearfix">
        <?php if ( have_posts() ) while ( have_posts() ) :
            the_post();
            global $post;
        ?>
        
        
        <p id="print"><a href="javascript:window.print()">Печать</a></p>
        <div id="for_client">
            <img src="http://mr-smart.ru/wp-content/uploads/2013/09/smart.png" alt="">
            <h1 class="article-title">Заявка № <?php the_ID(); ?> от <?php  the_date() ?></h1>
            <div>Услуга: Ремонт</div>
            <div id="client_wrapper">
                <strong>Клиент:</strong>
                <br />
                <ul>
                    <li>Имя контактного лица: <?php echo get_post_meta($post->ID, 'contact_name', true); ?></li>
                    <li>Телефон основной: <?php echo get_post_meta($post->ID, 'tel', true); ?></li>
                    <li>Дополнительные контактные данные: <?php echo get_post_meta($post->ID, 'contact_ext', true); ?></li>
                </ul>
            </div>
            <div id="product_wrapper">
                <p><strong>Описание техники:</strong>
                <br /><?php echo get_post_meta($post->ID, 'product', true); ?></p>
            </div>
            <div id="sn_wrapper">
                <p><strong>Серийны номер:</strong>
                <br /><?php echo get_post_meta($post->ID, 'sn', true); ?></p>
            </div>
            <div id="sign_responsible">
                <p>Подпись ответственного о приемке: </p>
                <hr/>
            </div>
            <div><small>Экземпляр клиента</small></div>
            <hr style="border-style: dashed;"/>
        </div>
        <div id="for_archive">
            <img src="http://mr-smart.ru/wp-content/uploads/2013/09/smart.png" alt="">
            <h1 class="article-title">Заявка № <?php the_ID(); ?> от <?php  echo get_the_date() ?></h1>
            <div>Услуга: Ремонт</div>
            <div id="client_wrapper">
                <strong>Клиент:</strong>
                <br />
                <ul>
                    <li>Имя контактного лица: <?php echo get_post_meta($post->ID, 'contact_name', true); ?></li>
                    <li>Телефон основной: <?php echo get_post_meta($post->ID, 'tel', true); ?></li>
                    <li>Дополнительные контактные данные: <?php echo get_post_meta($post->ID, 'contact_ext', true); ?></li>
                </ul>
            </div>
            <div id="product_wrapper">
                <p><strong>Описание техники:</strong>
                <br /><?php echo get_post_meta($post->ID, 'product', true); ?></p>
            </div>
            <div id="product_wrapper">
                <p><strong>Серийны номер:</strong>
                <br /><?php echo get_post_meta($post->ID, 'sn', true); ?></p>
            </div>
            <div id="sign_responsible">
                <p>Подпись клиента: </p>
                <hr/>
            </div>
            <div><small>Экземпляр исполнителя</small></div>

        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>