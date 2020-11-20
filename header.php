<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_asset('/favicon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_asset('/favicon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_asset('/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_asset('/favicon/favicon-16x16.png'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_asset('/favicon/ms-icon-150x150.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <title><?= bloginfo('name'); ?></title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T5N8BXP');</script>
    <!-- End Google Tag Manager -->
    
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5N8BXP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

	<?php wp_head(); ?>
</head>
<body <?php body_class(get_field('bg', $post->ID) ?? ''); ?>>
<?php   
    if($_POST['type'] === 'presentation'): 
        create_mail($_POST);
    else:
        component('presentation-modal');
    endif; 
?>
<?php if(get_field('notification', 'option')): ?>
    <div class="bg-red-1 py-2 color-white w-100 px-body text-center notification">
        <?php the_field('notification', 'option'); ?>
    </div>
<?php else: ?>
    <div class="bg-red-1 py-2 color-white w-100 px-body text-center notification d-flex justify-content-center align-items-center d-lg-none">
        <div class="mr-2">
            <?php svg('phone'); ?>
        </div>
        <?php the_field('general_phone', 'option'); ?>
    </div>
<?php endif; ?>
<div class="top-bar d-none d-lg-block">
    <div class="container-fluid p-0 d-flex justify-content-end">
        <?php wp_nav_menu(array('theme_location' => 'top')); ?>
        <ul>
            <li>
                <a class="d-flex align-items-center" href="<?php echo get_privacy_policy_url(); ?>">
                    <img class="privacy-icon mr-1" src="<?php echo get_asset('/images/privacy-icon.png'); ?>">
                    <span>
                        Privatlivspolitik
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<header class="bg-white">
    <div class="container-fluid p-0 d-flex justify-content-between align-items-center">
        <a href="<?php echo home_url(); ?>">
            <img class="logo" src="<?php echo get_asset('/images/logo-positive.svg'); ?>">
        </a>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container_class' => 'd-none d-lg-block menu-primary-desktop')); ?>
        <div class="d-block d-lg-none mobile-nav-toggle mobile-nav-open d-flex align-items-center justify-content-center flex-column">
          <span></span><span></span><span></span>
        </div>
    </div>
</header>

<div class="mobile-nav position-fixed d-none w-100 bg-white z-9">
	<?php if(get_field('notification', 'option')): ?>
    <div class="bg-red-1 py-2 color-white w-100 px-body text-center notification">
		<?php the_field('notification', 'option'); ?>
    </div>
	<?php else: ?>
    <div class="bg-red-1 py-2 color-white w-100 px-body text-center notification d-flex justify-content-center align-items-center d-lg-none">
      <div class="mr-2">
		<?php svg('phone'); ?>
      </div>
		<?php the_field('general_phone', 'option'); ?>
    </div>
	<?php endif; ?>
    <div class="mobile-nav-body">
        <div class="d-flex justify-content-end">
            <div class="mobile-nav-close mobile-nav-toggle"></div>
        </div>
        <div class="mt-4 pt-2 primary">
            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        </div>
        <div class="extra mt-4 pt-2">
            <?php wp_nav_menu(array('theme_location' => 'top')); ?>
        </div>
        <a class="d-flex align-items-center privacy-link mt-5 pt-2" href="<?php echo get_privacy_policy_url(); ?>">
            <img class="privacy-icon mr-1" src="<?php echo get_asset('/images/privacy-icon.png'); ?>">
            <span>
                Privatlivspolitik
            </span>
        </a>
    </div>
</div>