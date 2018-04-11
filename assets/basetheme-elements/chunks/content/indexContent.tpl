<!-- index content -->
<main id="main">
    <section class="production" id="production">
        <header class="picture" id="picture">
            <h1>[[%test_history_n_today_title? &topic=`default` &namespace=`babel`]]</h1>
        </header>
        <div class="inblock">
            <!-- History -->
            [[pdoResources?
                &parents=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`9`]]`
                &depth=`0`
                &includeContent=`1`
                &limit=`3`
                &sortdir=`ASC`
                &tpl=`historyItemIndex`
                &tplFirst=`historyFirstItemIndex`
                &includeTVs=`img`
                &processTVs=`1`
                &tvPrefix=``
            ]]
            <!-- Test (services) -->
            [[pdoResources?
                &parents=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`6`]]`
                &includeContent=`1`
                &limit=`2`
                &sortdir=`ASC`
                &tpl=`testItemIndex`
                &tplFirst=`testFirstItemIndex`
                &includeTVs=`img,contentImg`
                &processTVs=`1`
                &tvPrefix=``
            ]]
        </div>
    </section>
    <!-- Examples (events) -->
    [[pdoResources?
        &parents=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`3`]]`
        &includeContent=`1`
        &limit=`8`
        &tpl=`eventsItemIndex`
        &tplWrapper=`eventsOuterIndex`
        &includeTVs=`img,imgPreview,video,place,time,allBlockLink,active`
        &processTVs=`1`
        &tvPrefix=``
    ]]
    <!-- Our specialists -->
    [[pdoResources?
        &parents=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`5`]]`
        &tpl=`specialistsItemIndex`
        &tplWrapper=`specialistsPartnersOuterIndex`
        &includeContent=`1`
        &limit=`2`
        &sortdir=`ASC`
        &includeTVs=`img`
        &processTVs=`1`
        &tvPrefix=``
    ]]
    <!-- Contact and feedback -->
    <div class="backcall" id="contact">
        <div class="inblock">
            <p class="title">[[%backcall_title? &topic=`default` &namespace=`babel`]]</p>
            <p>[[%backcall_subtitle? &topic=`default` &namespace=`babel`]]</p>
            [[!FormIt?
                &hooks=`email`
                &emailFrom=`azovmashtest@ukr.net`
                &emailFromName=`azovmashtest.com`
                &emailSubject=`Feedback message from azovmashtest.org website`
                &emailTpl=`contactForm`
                &emailTo=`azovmashtest@ukr.net`
                &successMessage=`<span id="success_message">[[%success_message? &topic=`translate` &namespace=`babel`]]</span>`
                &validate=`name:required, email:email:required, message:required:stripTags`
            ]]
            <form id="contactForm" class="form" method="post" action="[[~[[*id]]]]#contactForm">
                <div class="line req">
                    <input type="text" class="required" name="name" id="name" value="[[!+fi.name]]" placeholder="[[%name_placeholder? &topic=`default` &namespace=`babel`]]" [[!+fi.error.name:!empty=`class="error"`]]>
                </div>
                <div class="line req">
                    <input type="email" class="required" name="email" id="email" value="[[!+fi.email]]" placeholder="[[%e-mail_placeholder? &topic=`default` &namespace=`babel`]]" [[!+fi.error.email:!empty=`class="error"`]]>
                </div>
                <div class="line">
                    <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" placeholder="[[%subject_placeholder? &topic=`default` &namespace=`babel`]]" [[!+fi.error.subject:!empty=`class="error"`]]>
                </div>
                <div class="line req">
                    <textarea class="required" name="message" id="message" value="[[!+fi.message]]" placeholder="[[%message_placeholder? &topic=`default` &namespace=`babel`]]" [[!+fi.error.message:!empty=`class="error"`]]></textarea>
                </div>
                <span class="help-block">
                    [[!+fi.validation_error_message:notempty=`<p>[[!+fi.validation_error_message]]</p>`]]
                    [[!+fi.successMessage:notempty=`<p>[[!+fi.successMessage]]</p>`]]
                </span>
                <button id="submit" type="submit" class="but">[[%send_button? &topic=`default` &namespace=`babel`]]</button>
                <p class="help"><sup>*</sup>[[%reqired_label? &topic=`default` &namespace=`babel`]]</p>
            </form>
        </div>
    </div>
</main>