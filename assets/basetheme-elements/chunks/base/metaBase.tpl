<!DOCTYPE html>
<html lang="[[++cultureKey]]">
    <head>
        <meta name="description" content="[[*description:htmlent:default=`[[%lf_description:htmlent]]`]]" >
        <base href="[[++site_url]]" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!--<meta name="keywords" content="keywords">-->
        <meta charset="utf-8">
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="[[*pagetitle:htmlent]]">

        <!--Soc. groups-->
        <meta property="og:title" content="[[*longtitle:htmlent:default=`[[*pagetitle:htmlent]] / [[++site_name]]`]]" >
        <meta property="og:description" content="[[*description:htmlent:default=`[[%lf_description:htmlent]]`]]" >
        <meta property="og:type" content="website" >
        <meta property="og:url" content="[[~[[*id]]? &scheme=`full`]]" >
        <meta property="og:image" content="[[*img:notempty=`[[++site_url:replace=`/[[++cultureKey]]/==`]][[*img]]`:default=`[[++site_url]]assets/design/images/logo.png`]]" >
        <meta property="og:site_name" content="[[++site_name]]" >

        <meta http-equiv="x-dns-prefetch-control" content="on">
        <link rel="dns-prefetch" href="http://code.jquery.com" >
        <link rel="dns-prefetch" href="http://fonts.googleapis.com" >
        <link rel="dns-prefetch" href="http://www.google-analytics.com" >

        <link rel="icon" href="[[++site_url]]favicon.ico" type="image/x-icon" > 
        <link rel="shortcut icon" href="[[++site_url]]favicon.ico" type="image/x-icon" >

        [[Molt?
        &minifyCss=`1`
        &minifyJs=`1`
        &cssRegister=`placeholder`
        &cacheFolder=`[[++basetheme.design_url]]min/`
        &jsSources=`
            [[++basetheme.design_url]]js/jquery/plugins/slick/slick.js
            ,[[++basetheme.design_url]]js/jquery/plugins/scroll-reveal/scrollReveal.js
            ,[[++basetheme.design_url]]js/jquery/plugins/tooltip/jquery.tooltipster.min.js
            ,[[++basetheme.design_url]]js/jquery/plugins/jquery.imgpreload.js
            ,[[++basetheme.design_url]]js/jquery/plugins/jquery.form.js
            ,[[++basetheme.design_url]]js/jquery/plugins/validation/jquery.validate.js
            ,[[++basetheme.design_url]]js/otherlibs/validate-form.js
            ,[[++basetheme.design_url]]js/app/lib/site.js
            ,[[++basetheme.design_url]]js/app/lib/siteMode.js
            ,[[++basetheme.design_url]]js/app/mode/themeMode.js
            ,[[++basetheme.design_url]]js/app/modules/picView.js
            ,[[++basetheme.design_url]]js/app/modules/sliderEffect.js
            ,[[++basetheme.design_url]]js/app/modules/scrollReveal.js
            ,[[++basetheme.design_url]]js/app/modules/tooltip.js
            ,[[++basetheme.design_url]]js/app/modules/menu.js
            ,[[++basetheme.design_url]]js/init.js
        `
        &cssSources=`
            [[++basetheme.design_url]]css/reset.css
            ,[[++basetheme.design_url]]css/slick.css
            ,[[++basetheme.design_url]]css/style.css
            ,[[++basetheme.design_url]]css/custom.css
            ,[[++basetheme.design_url]]css/tooltipster.css
        `
        ]]
        [[+Molt.css]]
        <!--Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>

        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <-[endif]-->        
        <script>
            var designUrl = '[[++basetheme.design_url]]';
        </script>        
        [[++basetheme.ga_tracking_id:notempty=`
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', '[[++basetheme.ga_tracking_id]]', '[[++basetheme.ga_tracking_name]]');
                ga('send', 'pageview');
            </script>
        `]]
    </head>
<body>