<?php

/**
* Optimize core
*
* @package Ctwp
*/

namespace CTWP_THEME\Inc;

use CTWP_THEME\Inc\Traits\Singleton;

class Optimize_Core {
	use Singleton;
    public function __construct()
    {
        $this->setup_hooks();
    }
    protected function setup_hooks() {
		/**
		 * Actions.
		 */        
        add_action('wp_head', array($this,'meta_facebook'),5);
        // add_action('wp_head', array($this,'optimize_font'),5);
        // add_action( 'wp_footer', array($this,'optimize_scripts'), 9999 );
        add_filter( 'style_loader_tag', array($this,'add_rel_preload'), 10, 4 );
        add_filter( 'script_loader_tag', array($this,'vnvd_js_defer_attr'), 10);

	}

    public function meta_facebook() {
        echo '<meta property="fb:app_id" content="466900214051933" />';
    }

    public function optimize_font() {
        ?>
        <script defer src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script> 
        <script>
            WebFontConfig = {
                google: { families: [ 'Roboto:400,700:latin,vietnamese' ] }
            };
        </script>
        <?php
    }
    public function vnvd_js_defer_attr($tag) {
        if (is_admin()) {
            return $tag;
        }
        $scripts_to_exclude = array('jquery.js');
        foreach($scripts_to_exclude as $exclude_script) {
            if (true == strpos($tag, $exclude_script ) )
                return $tag; 
        }
        return str_replace( ' src', ' defer src', $tag );
    }

    public function optimize_scripts() {
        ?>
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
        <!-- Subiz -->
        <script>
            (function(s, u, b, i, z){
                u[i]=u[i]||function(){
                    u[i].t=+new Date();
                    (u[i].q=u[i].q||[]).push(arguments);
                };
                z=s.createElement('script');
                var zz=s.getElementsByTagName('script')[0];
                z.async=1; z.src=b; z.id='subiz-script';
                zz.parentNode.insertBefore(z,zz);
            })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
            subiz('setAccount', 'acqqvvblehkveqrhphqe');
        </script>
        <!-- End Subiz -->
        <script>
            let js = document.createElement('script');
            js.src = 'https://www.googletagmanager.com/gtag/js?id=UA-141054655-2';
            document.body.appendChild(js);
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); } gtag('js', new Date());
            gtag('config', 'UA-141054655-2');
            setTimeout(function() { initScript();
                initFontAwesome(); }, 1500);
            function initScript() { js = document.createElement('script');
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0';
            document.body.appendChild(js); let jsDMCA = document.createElement('script');
            jsDMCA.src = 'https://images.dmca.com/Badges/DMCABadgeHelper.min.js';
            jsDMCA.async = '';
            document.body.appendChild(jsDMCA); return null; 
            js = document.createElement('script');
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&autoLogAppEvents=1';
            }
            function initFontAwesome() { let script = document.createElement('script');
            script.src = 'https://use.fontawesome.com/releases/v5.13.0/js/solid.js';
            document.head.appendChild(script);
            script = document.createElement('script');
            script.src = 'https://use.fontawesome.com/releases/v5.13.0/js/brands.js';
            document.head.appendChild(script);
            script = document.createElement('script');
            script.src = 'https://use.fontawesome.com/releases/v5.13.0/js/fontawesome.js';
            document.head.appendChild(script); return null; }
        </script>
        <?php
        if (is_single()) {
            ?>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=466900214051933";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <?php
        }
    }
public function add_rel_preload($html, $handle, $href, $media) {
if (is_admin())
return $html;
if($handle === 'ctwp-first-screen')
return $html;
$html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" 
id='$handle' href='$href' type='text/css' media='all' />
EOT;

return $html;
}	

}