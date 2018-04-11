<main>
    <!--section>
        <header class="picture" id="content-heading">
            <h1>[[pdoField?&id=`3`&field=`pagetitle`]]</h1>
        </header>
        <div class="inblock">
            <article class="brief">
                <div class="brief-ic left"><img src="[[*img]]" alt="">
                </div>
                <div class="brief-txt">
                    <h2>[[*pagetitle]]</h2>
                    <p>
                        [[*content]]
                    </p>
                </div>
            </article>
        </div>
    </section-->
    <section>
        <header class="picture" id="content-heading">
            <h1>[[pdoField?&id=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`5`]]`&field=`pagetitle`]]</h1>
        </header>
        <div class="inblock">
            [[pdoResources?
                &parents=`[[BabelTranslation? &contextKey=`[[*context_key]]` &resourceId=`5`]]`
                &tpl=`specialistsItemSpecialists`
                &includeContent=`1`
                &sortdir=`ASC`
                &includeTVs=`img`
                &processTVs=`1`
                &tvPrefix=``
            ]]
        </div>
    </section>
</main>