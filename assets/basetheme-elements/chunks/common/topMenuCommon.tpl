<nav id="nav">
    <span class="touch" id="touch">меню</span>
    [[--!pdoMenu@mainMenu?
        &parents=`0`
        &tpl=`topMenuItemCommon`
        &tplHere=`topMenuHereCommon`
        &tplOuter=`topMenuOuterCommon`
    --]]
    <ul class="mainNav">
        <li class="index"><a href="[[++site_url]]">index</a></li>
        <li class=""><a href="[[++site_url]]">[[%main_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><a href="[[++site_url]]#services">[[%services_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><a href="[[++site_url]]#events">[[%events_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><a href="[[++site_url]]#contact">[[%contact_item? &topic=`default` &namespace=`babel`]]</a></li>
    </ul>

    <ul class="lang">
        [[BabelLinks? &showCurrent=`1` &tpl=`topMenuBabelCommon` &ignoreSiteStatus=`1`]]
        [[--BabelLinks? &showCurrent=`1` &ignoreSiteStatus=`1`--]]
    </ul>
    [[--!pdoMenu@mainMenu?
        &parents=`0`
        &tpl=`@INLINE <li class="[[+classnames]]"><img src="[[++basetheme.design_url]]images/small/ico_logo.png" class="ic-site"><a href="[[+link]]" [[+attributes]]>[[+menutitle]]</a></li>`
        &tplHere=`@INLINE <li class="[[+classnames]]"><img src="[[++basetheme.design_url]]images/small/ico_active_logo.png" class="ic-site"><a href="#" onclick="return false;" [[+attributes]]>[[+menutitle]]</a></li>`
        &tplOuter=`@INLINE <ul class="siteNav">[[+wrapper]]</ul>`
    --]]
    <ul class="siteNav">
        <li class=""><img src="/assets/basetheme-design/images/small/ico_active_logo.png" class="ic-site"><a href="[[++site_url]]">[[%main_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><img src="/assets/basetheme-design/images/small/ico_logo.png" class="ic-site"><a href="[[++site_url]]#history" >[[%history_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><img src="/assets/basetheme-design/images/small/ico_logo.png" class="ic-site"><a href="[[++site_url]]#services" >[[%services_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><img src="/assets/basetheme-design/images/small/ico_logo.png" class="ic-site"><a href="[[++site_url]]#events" >[[%events_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><img src="/assets/basetheme-design/images/small/ico_logo.png" class="ic-site"><a href="[[++site_url]]#specialists" >[[%specialists_item? &topic=`default` &namespace=`babel`]]</a></li>
        <li class=""><img src="/assets/basetheme-design/images/small/ico_logo.png" class="ic-site"><a href="[[++site_url]]#contact" >[[%contact_item? &topic=`default` &namespace=`babel`]]</a></li>
        
    </ul>

    <!--div class="info">
        <p>[[%lf_topmenu_copyright]]</p>
        <a href="#">[[%lf_topmenu_legalnotice]]</a>
    </div-->
</nav>