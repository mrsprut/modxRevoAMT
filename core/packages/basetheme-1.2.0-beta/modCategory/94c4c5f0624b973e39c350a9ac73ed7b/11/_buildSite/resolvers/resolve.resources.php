<?php

/*
* Create documents
*/
function createDocs(&$modx, $context_key, $node, $doc = null)
{
    $base_params = array(
        'update' => true,
    );

    if (isset($node['childs'])) {
        $menuIndex = 0;
        foreach ($node['childs'] as $resource => $options) {
            $classKey = 'modResource';
            $keyInName = explode(':', $resource);
            if (isset($keyInName[1])) {
                $classKey = $keyInName[1];
            }

            $menuIndex++;
            $pid = ($doc ? $doc->id : 0);
            $params = array_merge($base_params, $options);
            $params['parent'] = $pid;
            if (!$doc__ = $modx->getObject($classKey,
                $params['parentCheck'] ?
                    array(
                        'context_key' => $context_key,
                        'alias' => $params['alias'],
                    )
                    :
                    array(
                        'context_key' => $context_key,
                        'parent' => $pid,
                        'alias' => $params['alias'],
                    )
            )
            ) {
                $params['menuindex'] = $menuIndex;
                $doc__ = $modx->newObject($classKey);
                $doc__->fromArray($params, '', true, true);
                $doc__->cleanAlias($params['alias']);
                if (!$doc__->save()) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Can not save {$params['pagetitle']} document");
                } else {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Create resource ' . $params['pagetitle'] . '.');
                }
            } else if ($params['update'] === true) {
                $doc__->fromArray($params);
                if (!$doc__->save()) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Can not update {$params['pagetitle']} document");
                } else {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Update resource ' . $params['pagetitle'] . '.');
                }
            }
            if (isset($params['group']) && !empty($params['group'])) {
                $doc__->joinGroup($params['group']);
                $modx->log(modX::LOG_LEVEL_INFO, 'Join resource ' . $params['pagetitle'] . ' to group ' . $params['group'] . '.');
            }

            if (isset($params['tvs']) && !empty($params['tvs'])) {
                foreach ($params['tvs'] as $tvName => $value) {
                    $tv = $modx->getObject('modTemplateVar', array('name' => $tvName));
                    if (empty($tv)) {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not find TV: ' . $tvName . ' to associate to Templates.');
                        continue;
                    }

                    $templateVarResource = $modx->getObject('modTemplateVarResource', array(
                        'tmplvarid' => $tv->get('id'),
                        'contentid' => $doc__->get('id'),
                    ));
                    if (!$templateVarResource) {
                        $templateVarResource = $modx->newObject('modTemplateVarResource');
                        $templateVarResource->fromArray(array(
                            'tmplvarid' => $tv->get('id'),
                            'contentid' => $doc__->get('id'),
                            'value' => $value,
                        ), '', true, true);

                        if ($templateVarResource->save() == false) {
                            $modx->log(xPDO::LOG_LEVEL_ERROR, 'An unknown error occurred while trying to associate the TV ' . $tvName . ' to the Resource ' . $doc__->get('id'));
                        }
                    }
                }
            }

            createDocs($modx, $context_key, $options, $doc__);
        }
    }
}

/*
 * Content
 */

function getIntro($content)
{
    $intro = substr(strip_tags($content), 0, 200);
    return $intro;
}

if ($object && $object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            /*
             * search templates
             */
            $templateNames = array(
                'index',
                'list',
                'topic',
                'memberships'
            );
            $templateVarPrefix = 'tpl_';
            foreach ($templateNames as $templateName) {
                $varName = $templateVarPrefix . $templateName;
                if (!$$varName = $modx->getObject('modTemplate', array('templatename' => $templateName))) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Could not get Template with name '{$templateName}'");
                    return false;
                }
            }


            /* Content*/
            $indexContent = '<p class="a"><strong>ООО «Первая фумигационная компания»</strong> является одним из наиболее
крупных предприятий в секторе обработки с/х продукции Восточной Украины.</p>
<p class="a">&nbsp;</p>
<p class="a">Предприятие
было основано в 2009 году и первоначально было направлено на проведение
обеззараживания экспортных грузов в трюмах морских судов портов Азовского моря:
ГП Бердянский морской торговый порт, ГП Мариупольский морской торговый порт и
ООО «Укртрансагро» (причал № 2 СРЗ).</p>
<p class="a">&nbsp;</p>
<p class="a"><span style="line-height: 1.5em;">На
сегодняшний день в состав </span><span style="line-height: 1.5em;">ООО «Первая фумигационная компания» </span><span style="line-height: 1.5em;">входит три филиала, обеспеченные полным
кадровым составом, материальной и технической базой. Основываясь на этом, мы
обеспечиваем на высоком уровне услугами наших клиентов в портах Мариуполь,
Бердянск, Херсон и Николаев.</span></p>
<p class="a"><span style="line-height: 1.5em;"><br /></span></p>
<p>
<strong>Нашей
целью</strong> является предоставление
качественных услуги и соблюдение безопасности всех участников вовлеченных в
процесс транспортировки зерна покупателям.</p>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<p>&nbsp;</p>';

            $service2Content = '<img style="vertical-align: middle;" src="&lt;iframe width=&quot;425&quot; height=&quot;349&quot; src=&quot;http:/www.youtube.com/embed/SIX45pWgGG0?hl=ru&amp;fs=1&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;" alt="" />';

            $service4Content = '<p>Колорация или окраска пшеницы и ячменя производиться при экспорте в страны Арабского мира с целью идентификации импортного груза. Колорация проводиться только по требованию покупателя груза, <a href="http://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%BF%D0%B8%D1%89%D0%B5%D0%B2%D1%8B%D1%85_%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BE%D0%BA_E100_%E2%80%94_E199">пищевыми красителями</a> разрешенными для применения в Украине и в стране импортере.</p>
<span style="line-height: 1.5em;">  Экспортируемый груз может быть окрашен следующими веществами:
<ul>
<li>
<ul>
<li><span style="line-height: 1.5em;">- Желтый </span><a style="line-height: 1.5em;" title="&quot;Солнечный закат&quot;" href="http://ru.wikipedia.org/wiki/%D0%96%D1%91%D0%BB%D1%82%D1%8B%D0%B9_%C2%AB%D1%81%D0%BE%D0%BB%D0%BD%D0%B5%D1%87%D0%BD%D1%8B%D0%B9_%D0%B7%D0%B0%D0%BA%D0%B0%D1%82%C2%BB" target="_blank">"Солнечный закат"</a><span style="line-height: 1.5em;">, индекс Е 110 (</span><a class="extiw" style="line-height: 1.5em;" title="en:Sunset Yellow FCF" href="http://en.wikipedia.org/wiki/Sunset_Yellow_FCF" target="_blank">Sunset Yellow FCF</a><span style="line-height: 1.5em;">);</span></li>
<li><span style="line-height: 1.5em;">- Красный "</span><a style="line-height: 1.5em;" title="Кармазин (пищевая добавка)" href="http://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D1%80%D0%BC%D0%B0%D0%B7%D0%B8%D0%BD_(%D0%BF%D0%B8%D1%89%D0%B5%D0%B2%D0%B0%D1%8F_%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BA%D0%B0)" target="_blank">Кармазин</a><span style="line-height: 1.5em;">", индекс Е 122 (</span><a class="extiw" style="line-height: 1.5em;" title="en:Azorubine" href="http://en.wikipedia.org/wiki/Azorubine" target="_blank">Azorubine</a><span style="line-height: 1.5em;"> (carmoisine));</span></li>
<li><span style="line-height: 1.5em;">- Зеленый "Зеленое яблоко", смесь красителей синего и желтого;</span></li>
<li><span style="line-height: 1.5em;">- Зеленый "</span><a style="line-height: 1.5em;" title="Зелёный S" href="http://ru.wikipedia.org/wiki/%D0%97%D0%B5%D0%BB%D1%91%D0%BD%D1%8B%D0%B9_S" target="_blank">Зелёный S</a><span style="line-height: 1.5em;">", индекс Е 142 (</span><a class="extiw" style="line-height: 1.5em;" title="en:Green S" href="http://en.wikipedia.org/wiki/Green_S" target="_blank">Green S</a><span style="line-height: 1.5em;">).</span></li>
</ul>
</li>
</ul>
</span>
<p><span style="line-height: 1.5em;">Колорация груза проводится в процессе погрузки его на судно, в потоке на ленте элеватора или в лотках при погрузке портовыми кранами.</span></p>';

            $service5Content = '<p><span style="line-height: 1.5em;">Фумигация длительный процесс, при грамотном проведении которого, после окончания периода экспозиции может представлять значительную опасность для персонала, задействованого при разгрузке вагонов, морских судов. В связи с этим грузовые операции по погрузке или выгрузке фумигированного груза требуют проведения дегазации, т.е. проветривания груза от токсичного газа. </span></p>
<p><span style="line-height: 1.5em;">Дегазация проводиться только с целью подтверждения безопасности дальнейших грузовых операций с грузом и ни в коей мере не может подтверждать качество и эффективность проведенной фумигации.</span></p>
<p>Наше придприятие обладает всем необходимым измерительным оборудованием для обнаружения газа в фумигированном грузе при пассивной дегазации. Имеющимся оборудованием возможно обнаружить концентрации газа в десять раз меньшие ПДК принятые в Украине. Т.е. проведенные замеры со значительным запасом подтверждают безопасность дальнейших грузовых операций с грузом. </p>
<p>Не смотря на тот факт, что проводимые замеры дают мгновенно результаты, следует учитывать время на пассивную дегазацию до 12 часов при благоприятных погодных условиях.</p>';

            $aboutContent = '<p class="a"><strong>Соответствие украинским
нормативам.</strong> В связи с тем, что украинским законодательством предусмотрено
лицензирование ряда видов деятельности к которым относиться и обеззараживание
(фумигация) подкарантинных грузов, с сентября 2009 года ООО «Первая фумигационная
компания» входит в реестр лицензиатов Министерства аграрной политики:
«Проведение фумигации (обеззараживания) объектов регулирования, которые
определены Законом Украины «Про карантин растений», которые перемещаются через
государственную границу Украины и карантинные зоны». Лицензия серии АВ № 456277
от 21.09.2009 г.</p>
<p class="a"><span style="line-height: 1.5em;">К работам по фумигации зерновых грузов в портах предъявляются
жесткие требований по санитарно-гигиеническим и экологическим нормативам. В
связи с этим специалистами ведущего профильного научного учреждения «Институт
гигиены и медицинской экологии им. А.Н. Марзеева» в г. Киев была выполнена
комплексная экспертиза ООО «Первая фумигационная компания» на предмет
соответствия нормам коллективной безопасности. Что подтверждено Заключением Санитарно-гигиенической
экспертизы № 05.03.02-07/91501 от 08.10.2013 года Министерства
здравоохранения Украины.</span></p>
<p class="a">В свою очередь в области экологической безопасности ООО «Первая
фумигационная компания» имеет Разрешения Министерства экологии и природных
ресурсов Украины на все виды деятельности связанные с использованием таких
опасных веществ, как фумиганты. </p>
<p class="a">Наличие собственного специализированного автопарка для
транспортировки фумигантов гарантирует своевременное выполнение поступающих
заказов, а так же обеспечение безопасности для окружающих при использовании
фумигантов.</p>
<p class="a"><strong>Повышение уровня
безопасности. </strong>ГП «Донецкий экспертно-технический центр национального
научно-исследовательского института промышленной безопасности и охраны труда»<strong> </strong>регулярно проводит экспертизу<strong> </strong>ООО «Первая фумигационная компания»,
подтверждая возможность предприятия выполнять работы повышенной опасности, связанные
с газацией препаратами I
класса опасности и проведением работ по дегазации. </p>
<p class="a">Свою деятельность в области международных отношений и обеспечении
безопасности экипажей морских судов предприятие проводит в соответствии с:</p>
<span style="line-height: 1.5em;">
<ul>
<li>
<ul>
<li><span style="line-height: 1.5em;">Рекомендациями по безопасному использованию
пестицидов на судах редакции 2002
 г. (Recommendation of the safe use pesticide on ships)
Международной морской организации (IMO);</span></li>
<li><span style="line-height: 1.5em;">Инструкций по перевозке опасных грузов (IMDG code);</span></li>
<li><span style="line-height: 1.5em;">Правил GAFTA No.132. (Fumigation Rules).</span></li>
</ul>
</li>
</ul>
<ul>
</ul>
</span>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="assets/userimages/Hold ventilation - closed 640x480.jpg" alt="" width="640" height="480" /></p>
<p>В процессе работы и развития специалистами
предприятия было разработано уникальное <strong>«Технологическое
руководство по проведению фумигации на морских судах»</strong>, которое объединило <span style="text-decoration: underline;">все</span>
действующие инструкции по Охране труда и определило единые правила безопасности
для всех лиц прямо или косвенно участвующих в процессе фумигации на морских
судах. Данное Технологическое руководство было представлено на рассмотрение в специализированные
подразделения Министерства транспорта и Министерства здравоохранения и получило
положительные отзывы от ведущих специалистов в области безопасности на морском
транспорте. На сегодняшний день Технологическое руководство было не однократно
пересмотрено и доработано в соответствии с ужесточающимися требованиями по
безопасности на морских судах.</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="assets/userimages/Danger sign 640х480.jpg" alt="" width="640" height="480" /></p>
<p>Очередным этапом стало повышение квалификации
сотрудников предприятия в Институте последипломного образования специалистов
морского и речного транспорта с целью подготовки руководителей и работников
фумигационных отрядов  к предупреждению
аварийных ситуаций и отравления персонала при проведении фумигации в
специфических условиях порта и на судах. В результате чего ООО «Первая
фумигационная компания» - <span style="text-decoration: underline;">единственное предприятие</span> в восточном регионе
Украины, имеющее освидетельствованных специалистов по безопасному проведению
фумигационных работ в портах и на морских судах, что в свою очередь дает нашим
клиентам уверенность в качестве выполняемых работ и отсутствии задержек судов,
связанных с несчастными случаями.</p>
<p>&nbsp;</p>
<p class="a"><strong>Политика в области качества. </strong>Основной
наш принцип<strong> </strong>работы:  КАЧЕСТВО и БЕЗОПАСНОСТЬ! </p>
<p class="a">Каждая обработка, будь то складское помещения или зерно в трюме
судна, проходит этапы подготовки связанные с оценкой пригодности и
подготовленности объекта к газации, возможности обеспечить безопасность
стороннего персонала, расчета необходимых условий как для фумигации, так и для
дезинсекции. Мы уверены в том, что качественно выполненная фумигация при
жестком соблюдении норм безопасности – это единственный ключ к успеху.</p>
<p class="a"><span style="line-height: 1.5em;">Всегда находимся в Вашем распоряжении.</span></p>
<hr />
<blockquote>
<p>&nbsp;</p>
</blockquote>';

            $membership1Content = '<p>С первых месяцев своей работы коллектив ООО «Первая
фумигационная компания» является активным членом Всеукраинской общественной
организации «Фумигационная ассоциация» и членом совета по фумигации на морском
транспорте в составе ассоциации. Основным направлением деятельности ВОО
«Фумигационная ассоциация» является поддержка и экспертная консультация
исполнительных органов власти в вопросах безопасности работ по фумигации, а
также механизм общественного влияния на законодательные органы власти в области
обеззараживания сельскохозяйственных продуктов.</p>
<hr />
<p> Более подробно о ассоциации:  <a href="http://fumigacia.com/">fumigacia.com</a></p>';

            $membership2Content = '<p><span style="line-height: 1.5em;">C 2010 года ООО «Первая
фумигационная компания» являеться </span><span style="text-decoration: underline;">членом Международной Ассоциации
Торговли Зерном и Кормами</span><span style="line-height: 1.5em;"> (GAFTA) в качестве специализированного
предприятия по фумигации экспортных зерновых грузов. В структуре GAFTA мы занимаем категорию J –
фумигационный оператор. </span></p>
<hr />
<p>&nbsp;</p>
<p>Более подробно о ассоциации: <a style="color: #0000ff;" title="GAFTA" href="http://www.gafta.com" target="_blank">gafta.com </a></p>';

            $membership3Content = '<p>Федерация ассоциаций
производителей масла, семян и жиров (FOSFA INTERNATIONAL). </p>
<p>Очередным этапом развития ООО "Первая фумигационная компания" в 2011 году стало вступление в <span style="text-decoration: underline;">члены Федерации ассоциаций производителей масла, семян и жиров (FOSFA INTERNATIONAL)</span> в качестве члена "не трейдера".  Тем самым мы подтверждаем свое намерение к улучшению и расширению предоставляемых услуг нашим клиентам. Т.е. на сегодняшний день наши клиенты могут получить качественну фумигацию грузов в портах, подтвержденную фумигационным сертификатом члена двух крупнейших в мире ассоциаций на рынке зерна.</p>
<hr />
Более подробно о федерации: <a style="color: #0000ff;" href="http://fosfa.com/" target="_blank">fosfa.com</a>
<p>&nbsp;</p>';

            $contactsContent = '<p>&nbsp;</p>
<table>
<tbody>
<tr>
<td><img style="display: block; margin-left: auto; margin-right: auto;" src="assets/userimages/logo.png" alt="" width="151" height="45" /></td>
<td class="justifyleft">ООО «Первая фумигационная компания» <br />
<p class="justifyright">70, ул. Жовтневая, г. Мариуполь, Донецкая область, 87535, Украина</p>
<p class="justifyright">Тел.  +38 0629 47 68 74</p>
<p class="justifyright">Факс. +38 067 236 65 12</p>
<p class="justifyright">Эл. почта: <a title="Запрос на услуги по фумигации" tabindex="Запрос на услуги по фумигации" href="mailto:DenisL@ffum.in.ua">DenisL@ffum.in.ua</a></p>
</td>
</tr>
</tbody>
</table>
<hr />
<p>&nbsp;</p>
<p><span style="white-space: pre;">	</span>Вас интересует фумигация грузов в портах Мариуполь, Бердянск, Херсон и Николаев. Или к Вам поступили инструкции с указанием: фумигационный сертификат подписанный членом <a href="memberships/">GAFTA и / или FOSFA</a> - свяжитесь с нами по электронной почте. Мы в кратчайшие сроки подготовим для Вас коммерческое предложение и драфты контрактов как для резидентов Украины, так и для иностранных компаний.</p>';

            /*  */
            $resources = array(
                'childs' => array(
                    'home' => array(
                        'template' => $tpl_index->get('id'),
                        'pagetitle' => 'Home',
                        'longtitle' => 'Фумигация - ООО «Первая фумигационная компания»',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'index',
                        'uri' => 'index',
                        'link_attributes' => '',
                        'content' => $indexContent,
                        'isfolder' => false,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                    ),
                    'services' => array(
                        'template' => $tpl_list->get('id'),
                        'pagetitle' => 'Услуги',
                        'longtitle' => 'Услуги',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'services',
                        'uri' => 'services',
                        'link_attributes' => '',
                        'content' => '',
                        'isfolder' => true,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                        'tvs' => array(
                            'image' => 'assets/userimages/kolosok.jpg'
                        ),
                        'childs' => array(
                            'service1' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Комплексное обеззараживание высокотоксичным газом зерновых и масленичных продуктов на местах хранения',
                                'longtitle' => 'Комплексное обеззараживание высокотоксичным газом зерновых и масленичных продуктов на местах хранения',
                                'description' => '',
                                'introtext' => '',
                                'alias' => '3',
                                'uri' => '3',
                                'link_attributes' => '',
                                'content' => '',
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/ascets/userimages/kolosok.jpg'
                                ),
                            ),
                            'service2' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Обеззараживание складских помещений методами аэрозольной обработки.',
                                'longtitle' => 'Обеззараживание складских помещений методами аэрозольной обработки.',
                                'description' => '',
                                'introtext' => '',
                                'alias' => '4',
                                'uri' => '4',
                                'link_attributes' => '',
                                'content' => $service2Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/Fogging_W.jpg'
                                ),

                            ),
                            'service3' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Фумигация в транзите зерновых, отрубей пшеничных, семечки подсолнечника и т.п. загруженного в трюма морских судов',
                                'longtitle' => 'Фумигация в транзите зерновых, отрубей пшеничных, семечки подсолнечника и т.п. загруженного в трюма морских судов',
                                'description' => '',
                                'introtext' => '',
                                'alias' => '5',
                                'uri' => '5',
                                'link_attributes' => '',
                                'content' => '',
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/ffcc3.jpg'
                                ),
                            ),
                            'service4' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Колорация пищевыми красителями зерна.',
                                'longtitle' => 'Колорация пищевыми красителями зерна.',
                                'description' => '',
                                'introtext' => '',
                                'alias' => '6',
                                'uri' => '6',
                                'link_attributes' => '',
                                'content' => $service4Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/FFumComp coloration.jpg'
                                ),
                            ),
                            'service5' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Дегазация фумигированных грузов на местах хранения, в ж/д вагонах и в трюмах морских судов',
                                'longtitle' => 'Дегазация фумигированных грузов на местах хранения, в ж/д вагонах и в трюмах морских судов',
                                'description' => '',
                                'introtext' => '',
                                'alias' => '6',
                                'uri' => '6',
                                'link_attributes' => '',
                                'content' => $service5Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/ffcc3.jpg'
                                ),
                            ),
                        ),
                    ),
                    'about' => array(
                        'template' => $tpl_topic->get('id'),
                        'pagetitle' => 'О компании',
                        'longtitle' => 'О компании',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'about',
                        'uri' => 'about',
                        'link_attributes' => '',
                        'content' => $aboutContent,
                        'isfolder' => false,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                    ),
                    'membership' => array(
                        'template' => $tpl_memberships->get('id'),
                        'pagetitle' => 'Членство в ассоциациях',
                        'longtitle' => 'Членство в ассоциациях',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'memberships',
                        'uri' => 'memberships',
                        'link_attributes' => '',
                        'content' => $aboutContent,
                        'isfolder' => true,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                        'childs' => array(
                            'membership1' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'Всеукраинская общественная организация',
                                'longtitle' => 'Всеукраинская общественная организация',
                                'description' => '',
                                'introtext' => '',
                                'alias' => 'membership1',
                                'uri' => 'membership1',
                                'link_attributes' => '',
                                'content' => $membership1Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/gerb.jpg'
                                ),
                            ),
                            'membership2' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'GAFTA',
                                'longtitle' => 'GAFTA',
                                'description' => '',
                                'introtext' => '',
                                'alias' => 'membership2',
                                'uri' => 'membership2',
                                'link_attributes' => '',
                                'content' => $membership2Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/001-GAFTA.jpg'
                                ),
                            ),
                            'membership3' => array(
                                'template' => $tpl_topic->get('id'),
                                'pagetitle' => 'FOSFA',
                                'longtitle' => 'The Federation of Oils, Seeds and Fats Associations',
                                'description' => 'The Federation of Oils, Seeds and Fats Associations',
                                'introtext' => '',
                                'alias' => 'membership3',
                                'uri' => 'membership3',
                                'link_attributes' => '',
                                'content' => $membership3Content,
                                'isfolder' => false,
                                'published' => true,
                                'publishedon' => time(),
                                'hidemenu' => false,
                                'cacheable' => true,
                                'searchable' => true,
                                'richtext' => true,
                                'context_key' => 'web',
                                'menutitle' => '',
                                'tvs' => array(
                                    'image' => 'assets/userimages/Certificate FFum 2014.jpg'
                                ),
                            ),
                        ),
                    ),
                    'contacts' => array(
                        'template' => $tpl_index->get('id'),
                        'pagetitle' => 'Контакты',
                        'longtitle' => 'Контакты',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'contacts',
                        'uri' => 'contacts',
                        'link_attributes' => '',
                        'content' => $contactsContent,
                        'isfolder' => false,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                    ),
                    'partners' => array(
                        'template' => $tpl_topic->get('id'),
                        'pagetitle' => 'Наши партнеры',
                        'longtitle' => 'Наши партнеры',
                        'description' => '',
                        'introtext' => '',
                        'alias' => 'partners',
                        'uri' => 'partners',
                        'link_attributes' => '',
                        'content' => '',
                        'isfolder' => false,
                        'published' => true,
                        'publishedon' => time(),
                        'hidemenu' => false,
                        'cacheable' => true,
                        'searchable' => true,
                        'richtext' => true,
                        'context_key' => 'web',
                        'menutitle' => '',
                    ),
                ),
            );
            createDocs($modx, 'web', $resources, null);
            $modx->reloadContext('web');
            break;

    }
}
return true;