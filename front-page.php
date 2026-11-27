<?php get_header(); ?>

<main class="main lp-home" id="top">
    <section class="home-hero" aria-labelledby="hero-title">
        <?php
        $hero_images = array(
            'hero-left.webp',
            'hero-right.webp',
            'hero-meeting.webp',
            'hero-exterior-3.webp',
            'hero-exterior-2.webp',
        );
        ?>
        <div class="home-hero__photos" aria-hidden="true">
            <div class="home-hero__track" id="hero-track" data-hero-speed="40">
                <?php foreach ($hero_images as $hero_index => $hero_image) : ?>
                    <div class="home-hero__photo">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $hero_image); ?>" width="1368" height="1536" alt=""<?php if ($hero_index === 0) : ?> fetchpriority="high"<?php endif; ?> decoding="async">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="home-hero__copy">
            <h1 class="home-hero__title" id="hero-title">人と街に夢を</h1>
            <p class="home-hero__lead" lang="en">Dreams for people and cities</p>
        </div>
        <button class="home-hero__toggle" type="button" aria-controls="hero-track" hidden>スライドショーを停止</button>
    </section>
    <section class="home-concept" aria-labelledby="concept-title">
        <div class="home-concept__background" aria-hidden="true">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/concept-background.webp" width="2560" height="1000" alt="" loading="lazy" decoding="async">
        </div>
        <div class="home-concept__content cnt">
            <h2 class="home-concept__title" id="concept-title">
                <span class="home-concept__vertical">岡山を、</span>
                <span class="home-concept__vertical">もっとステキに。</span>
            </h2>
            <div class="home-concept__body">
                <p class="home-concept__statement">
                    <span class="home-concept__vertical">建物をつくる。</span>
                    <span class="home-concept__vertical">道をつくる。</span>
                    <span class="home-concept__vertical">暮らしをつくる。</span>
                    <span class="home-concept__vertical">人を支える。</span>
                </p>
                <p class="home-concept__closing">
                    <span class="home-concept__vertical">人と街のよりよい</span>
                    <span class="home-concept__vertical">未来のために。</span>
                </p>
            </div>
        </div>
    </section>
    <section class="home-synergy" id="group-synergy" aria-labelledby="synergy-title">
        <img class="home-synergy__vector home-synergy__vector--yellow" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-decoration-yellow.svg" width="498" height="465" alt="" aria-hidden="true" loading="lazy" decoding="async">
        <img class="home-synergy__vector home-synergy__vector--green" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-decoration-green.svg" width="566" height="615" alt="" aria-hidden="true" loading="lazy" decoding="async">
        <img class="home-synergy__vector home-synergy__vector--blue" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-decoration-blue.svg" width="498" height="465" alt="" aria-hidden="true" loading="lazy" decoding="async">
        <div class="home-synergy__inner cnt">
            <div class="home-synergy__header t-center">
                <p class="ttl-en home-synergy__title-en" lang="en">GROUP SYNERGY</p>
                <h2 class="ttl-ja home-synergy__title-ja" id="synergy-title">SATO GROUPの強み</h2>
            </div>
            <p class="home-synergy__lead"><span><span class="home-synergy__number">6</span>つの事業で、岡山のこれからをつくる。</span></p>
            <div class="home-synergy__content">
                <div class="home-synergy__description">
                    <p>SATO GROUPは、<br>
                        「建設」「土木・インフラ」「資材・砕石」「住宅」<br>
                        「設備工事・技術」「福祉・地域づくり」の<br>
                        6つの領域を通じて、人々の暮らしと地域社会に<br>
                        関わるさまざまな事業を展開しています。</p>
                    <p>それぞれの分野の専門性を高めながら、<br>
                        その知識や技術、経験をグループの中でつなぐことで、<br>
                        より幅広い地域の課題やニーズに応えています。</p>
                    <p>人と街のよりよい未来のために、<br>
                        岡山のこれからに必要とされる可能性を、<br>
                        グループ全体で広げていきます。</p>
                </div>
                <figure class="home-synergy__figure" aria-label="SATO GROUPと6つの事業領域の関係図">
                    <div class="home-synergy__diagram">
                        <img class="home-synergy__hub" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-hub.svg" width="277" height="320" alt="" loading="lazy">
                        <img class="home-synergy__logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-logo.svg" width="143" height="120" alt="SATO GROUP" loading="lazy">
                        <ul class="home-synergy__domains">
                            <li class="home-synergy__domain home-synergy__domain--construction">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-construction.svg" width="138" height="138" alt="" loading="lazy"><span>建設</span>
                            </li>
                            <li class="home-synergy__domain home-synergy__domain--housing">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-housing.svg" width="138" height="138" alt="" loading="lazy"><span>住宅</span>
                            </li>
                            <li class="home-synergy__domain home-synergy__domain--infrastructure">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-infrastructure.svg" width="138" height="138" alt="" loading="lazy"><span>土木<br>インフラ</span>
                            </li>
                            <li class="home-synergy__domain home-synergy__domain--welfare">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-welfare.svg" width="138" height="138" alt="" loading="lazy"><span>福祉<br>地域づくり</span>
                            </li>
                            <li class="home-synergy__domain home-synergy__domain--equipment">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-equipment.svg" width="138" height="138" alt="" loading="lazy"><span>設備工事<br>技術</span>
                            </li>
                            <li class="home-synergy__domain home-synergy__domain--materials">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/synergy-materials.svg" width="138" height="138" alt="" loading="lazy"><span>資材<br>砕石</span>
                            </li>
                        </ul>
                    </div>
                </figure>
            </div>
        </div>
    </section>
    <section class="home-companies" id="group-companies" aria-labelledby="companies-title">
        <div class="home-companies__intro cnt t-center">
            <div class="home-companies__header">
                <p class="ttl-en home-companies__title-en" lang="en">GROUP COMPANIES</p>
                <h2 class="ttl-ja home-companies__title-ja" id="companies-title">グループ企業</h2>
            </div>
            <p class="home-companies__lead">サトウ・ホールディングス株式会社を持株会社として、<br>
                各社それぞれの分野で培ってきた専門性を活かしながら、<br>
                地域に根ざした事業を展開しています。</p>
        </div>
        <?php
        $home_companies = array(
            array(
                'id' => 'company-holdings',
                'name' => 'サトウ・ホールディングス株式会社',
                'main_image' => array('src' => 'company-main.webp', 'width' => 1366, 'height' => 1536, 'alt' => 'サトウ・ホールディングス株式会社の外観'),
                'gallery' => array(
                    'worker' => array('src' => 'company-worker.webp', 'width' => 460, 'height' => 560, 'alt' => '現場で働くスタッフ'),
                    'site' => array('src' => 'company-site.webp', 'width' => 560, 'height' => 560, 'alt' => '施設の全景'),
                    'meeting' => array('src' => 'company-meeting.webp', 'width' => 600, 'height' => 400, 'alt' => '図面を使った打ち合わせ'),
                ),
                'heading' => 'グループのつながりを支え、次の成長へ。',
                'paragraphs' => array(
                    'SATO GROUPの持株会社として、グループ各社の経営支援や経営基盤の強化を担っています。それぞれの会社が持つ専門性や強みを活かしながら、事業の枠を越えた連携を促し、グループ全体の持続的な成長と新たな価値の創出を目指します。',
                ),
                'representative' => '佐藤 公泰',
                'business' => '各社の経営支援、グループ経営・事業連携の推進、不動産管理',
            ),
            array(
                'id' => 'company-sato',
                'name' => '佐藤建設株式会社',
                'main_image' => array('src' => 'company-main.webp', 'width' => 1366, 'height' => 1536, 'alt' => '佐藤建設株式会社の外観'),
                'gallery' => array(
                    'worker' => array('src' => 'company-worker.webp', 'width' => 460, 'height' => 560, 'alt' => '現場で働くスタッフ'),
                    'site' => array('src' => 'company-site.webp', 'width' => 560, 'height' => 560, 'alt' => '施設の全景'),
                    'meeting' => array('src' => 'company-meeting.webp', 'width' => 600, 'height' => 400, 'alt' => '図面を使った打ち合わせ'),
                ),
                'heading' => '建設から、その先の街づくりまで。',
                'paragraphs' => array(
                    '創業以来、岡山に根ざし、建築・土木を中心に地域の街づくりに携わってきたSATO GROUPの中核企業です。',
                    '公共施設や商業施設、医療・福祉施設などの建築、道路や河川をはじめとする土木工事に加え、住宅、設計デザイン、不動産など、暮らしに関わる幅広い領域の事業を展開。',
                    '近年では、カフェや人が集う場の企画・運営など、建物をつくるだけではない新しい街の価値づくりにも取り組んでいます。地域で暮らす人の声に向き合いながら、岡山のこれからに必要な場所や仕組みをつくり続けています。',
                ),
                'representative' => '佐藤公泰',
                'business' => '建築工事、土木工事、住宅、舗装工事、不動産、一級建築士設計事務所、飲食事業 ほか',
                'capital' => '7,000',
                'url' => 'https://satoukensetsu.co.jp/',
            ),
        );
        ?>
        <ul class="home-companies__list">
            <?php foreach ($home_companies as $home_company) : ?>
                <li class="home-companies__item">
                    <article class="home-companies__article" id="<?php echo esc_attr($home_company['id']); ?>" aria-labelledby="<?php echo esc_attr($home_company['id'] . '-title'); ?>">
                        <div class="home-companies__main-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $home_company['main_image']['src']); ?>" width="<?php echo esc_attr($home_company['main_image']['width']); ?>" height="<?php echo esc_attr($home_company['main_image']['height']); ?>" alt="<?php echo esc_attr($home_company['main_image']['alt']); ?>" loading="lazy" decoding="async">
                        </div>
                        <div class="home-companies__details">
                            <div class="home-companies__profile">
                                <h3 class="home-companies__name" id="<?php echo esc_attr($home_company['id'] . '-title'); ?>"><?php echo esc_html($home_company['name']); ?></h3>
                                <div class="home-companies__summary">
                                    <h4 class="home-companies__summary-heading"><?php echo esc_html($home_company['heading']); ?></h4>
                                    <div class="home-companies__summary-text">
                                        <?php foreach ($home_company['paragraphs'] as $home_company_paragraph) : ?>
                                            <p><?php echo esc_html($home_company_paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <dl class="home-companies__overview">
                                    <div class="home-companies__overview-row">
                                        <dt>商号</dt>
                                        <dd><?php echo esc_html($home_company['name']); ?></dd>
                                    </div>
                                    <div class="home-companies__overview-row">
                                        <dt>代表者</dt>
                                        <dd class="home-companies__representative"><span>代表取締役</span><span><?php echo esc_html($home_company['representative']); ?></span></dd>
                                    </div>
                                    <div class="home-companies__overview-row">
                                        <dt>本社</dt>
                                        <dd>〒<span class="home-companies__latin">709-4316</span> 岡山県勝田郡勝央町勝間田<span class="home-companies__latin">225</span>番地<span class="home-companies__latin">27</span></dd>
                                    </div>
                                    <div class="home-companies__overview-row">
                                        <dt>事業内容</dt>
                                        <dd><?php if ($home_company['id'] === 'company-holdings') : ?><span class="home-companies__latin" lang="en">SATO GROUP</span><?php endif; ?><?php echo esc_html($home_company['business']); ?></dd>
                                    </div>
                                    <?php if (!empty($home_company['capital'])) : ?>
                                        <div class="home-companies__overview-row">
                                            <dt>資本金</dt>
                                            <dd><span class="home-companies__latin"><?php echo esc_html($home_company['capital']); ?></span>万円</dd>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($home_company['url'])) : ?>
                                        <div class="home-companies__overview-row home-companies__latin">
                                            <dt lang="en">HP</dt>
                                            <dd><a href="<?php echo esc_url($home_company['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($home_company['name'] . 'の公式サイト（別タブで開く）'); ?>"><?php echo esc_html($home_company['url']); ?></a></dd>
                                        </div>
                                    <?php endif; ?>
                                </dl>
                            </div>
                            <ul class="home-companies__gallery" aria-label="<?php echo esc_attr($home_company['name'] . 'の写真'); ?>">
                                <?php foreach ($home_company['gallery'] as $home_company_image_position => $home_company_image) : ?>
                                    <li class="home-companies__gallery-image home-companies__gallery-image--<?php echo esc_attr($home_company_image_position); ?>">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $home_company_image['src']); ?>" width="<?php echo esc_attr($home_company_image['width']); ?>" height="<?php echo esc_attr($home_company_image['height']); ?>" alt="<?php echo esc_attr($home_company_image['alt']); ?>" loading="lazy" decoding="async">
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="home-recruit" id="recruit" aria-labelledby="recruit-title">
        <div class="home-recruit__inner cnt">
            <div class="home-recruit__card">
                <p class="home-recruit__decoration" lang="en" aria-hidden="true">RECRUIT</p>
                <div class="home-recruit__copy">
                    <div class="home-recruit__message">
                        <h2 class="home-recruit__title" id="recruit-title">岡山のこれからを、<br>一緒に作りませんか</h2>
                        <p class="home-recruit__description">佐藤建設の採用情報はこちらからご覧いただけます。</p>
                    </div>
                    <a class="home-recruit__link" href="<?php echo esc_url('https://satoukensetsu-recruit.jp/'); ?>" target="_blank" rel="noopener noreferrer" aria-label="佐藤建設の採用サイト（別タブで開く）">
                        <span>採用サイトはこちら</span>
                        <span class="home-recruit__link-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/recruit-external-link.svg" width="30" height="29.5922" alt=""></span>
                    </a>
                </div>
                <div class="home-recruit__photo">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/recruit-staff.webp" width="640" height="680" alt="ヘルメットを着用し現場で働くスタッフ" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
        <p class="home-recruit__tagline" lang="en" aria-hidden="true">LEARN ABOUT SATO'S ENVIRONMENT</p>
    </section>
</main>

<?php get_footer(); ?>
