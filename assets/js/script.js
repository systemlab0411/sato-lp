// detailsは閉じる前に高さをアニメーションさせ、途中の再クリックにも対応します。
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.header__nav-disclosure').forEach(function(disclosure) {
        const summary = disclosure.querySelector('summary');
        if (!summary) return;

        let expanded = disclosure.open;
        let animation = null;

        summary.addEventListener('click', function(event) {
            event.preventDefault();
            const startHeight = disclosure.getBoundingClientRect().height;
            expanded = !expanded;

            if (animation) {
                animation.cancel();
                animation = null;
            }

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || typeof disclosure.animate !== 'function') {
                disclosure.open = expanded;
                disclosure.style.overflow = '';
                return;
            }

            disclosure.open = true;
            disclosure.style.overflow = 'hidden';
            const endHeight = expanded
                ? disclosure.getBoundingClientRect().height
                : summary.getBoundingClientRect().height;

            const currentAnimation = disclosure.animate(
                [{ height: startHeight + 'px' }, { height: endHeight + 'px' }],
                { duration: 250, easing: 'ease-in-out', fill: 'both' }
            );
            animation = currentAnimation;

            currentAnimation.onfinish = function() {
                if (animation !== currentAnimation) return;
                disclosure.open = expanded;
                currentAnimation.cancel();
                animation = null;
                disclosure.style.overflow = '';
            };
        });
    });
});

// 画面上部から3割の位置にあるセクションを、ナビの現在位置として扱います。
document.addEventListener('DOMContentLoaded', function() {
    const main = document.querySelector('.lp-home');
    const nav = document.querySelector('.header__nav');
    if (!main || !nav) return;

    const topLink = nav.querySelector('.header__nav-link--top');
    const synergyLink = nav.querySelector('a[href$="#group-synergy"]');
    const companiesLink = nav.querySelector('.header__nav-link--companies');
    const links = [topLink, synergyLink, companiesLink].filter(Boolean);
    const sections = [
        { element: main.querySelector('.home-hero'), link: topLink },
        { element: main.querySelector('.home-concept'), link: topLink },
        { element: main.querySelector('.home-synergy'), link: synergyLink },
        { element: main.querySelector('.home-companies'), link: companiesLink }
    ].filter(function(section) { return section.element && section.link; });
    let frame = null;

    function updateCurrent() {
        frame = null;
        const marker = window.innerHeight * 0.3;
        const current = sections.find(function(section) {
            const rect = section.element.getBoundingClientRect();
            return rect.top <= marker && rect.bottom > marker;
        });
        links.forEach(function(link) {
            const active = Boolean(current && current.link === link);
            link.classList.toggle('header__nav-link--current', active);
            if (active) link.setAttribute('aria-current', 'location');
            else link.removeAttribute('aria-current');
        });
    }

    function scheduleUpdate() {
        if (frame !== null) return;
        frame = window.requestAnimationFrame(updateCurrent);
    }

    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);
    window.addEventListener('load', scheduleUpdate);
    window.addEventListener('pageshow', scheduleUpdate);
    if (typeof ResizeObserver === 'function') {
        const observer = new ResizeObserver(scheduleUpdate);
        observer.observe(main);
    }
    updateCurrent();
});

//onを付与 ハンバーガー
// document.addEventListener('DOMContentLoaded', function() {
//     const ham_btn = document.getElementById("js-ham-btn");
//     const ham_list = document.getElementById("ham_list");

//     ham_btn.addEventListener("click", () => {
//         ham_btn.classList.toggle("on");
//         ham_list.classList.toggle("on");
//     });
// });

jQuery(window).on('load', function(){
    jQuery('body').removeClass('active');
});

// スライダー設定
// document.addEventListener('DOMContentLoaded', function() {
//     const columnSlider = new Swiper('.h-column__slide-area', {
//         loop: true,
//         slidesPerView: "auto",
//         speed: 800,
//         allowTouchMove: true,
//         autoplay: {
//             delay: 3000,
//             disableOnInteraction: false,
//         },
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//         breakpoints: {
//             // 768px以下の時（0px〜768px）
//             0: {
//                 spaceBetween: 30,
//             },
//             // 769px以上の時
//             769: {
//                 spaceBetween: 40,
//             }
//         },
//     });

//     let recruitSlider;
//     const initSlider = () => {
//         // すでにスライダーが存在していれば破棄する
//         if (recruitSlider) recruitSlider.destroy(true, true);
//         const isSp = window.innerWidth <= 768;
//         recruitSlider = new Swiper('.h-recruit__slider--1', {
//             // 768px以下なら 'horizontal'、それ以上なら 'vertical'
//             direction: isSp ? 'horizontal' : 'vertical',
//             loop: true,
//             slidesPerView: "auto",
//             speed: 6000,
//             allowTouchMove: false,
//             spaceBetween: 0,
//             autoplay: {
//                 delay: 0,
//                 disableOnInteraction: false,
//             },
//         });
//     };
//     // 初回実行
//     initSlider();
//     // リサイズ時に再判定（頻繁な実行を避けるならリサイズイベントにdebounceをかけるのが理想）
//     let timer = 0;
//     window.addEventListener('resize', () => {
//         if (timer > 0) clearTimeout(timer);
//         timer = setTimeout(() => {
//             initSlider();
//         }, 200);
//     });

//     let recruitSlider2;
//     const initSlider2 = () => {
//         // すでにスライダーが存在していれば破棄する
//         if (recruitSlider2) recruitSlider2.destroy(true, true);
//         const isSp = window.innerWidth <= 768;
//         recruitSlider2 = new Swiper('.h-recruit__slider--2', {
//             // 768px以下なら 'horizontal'、それ以上なら 'vertical'
//             direction: isSp ? 'horizontal' : 'vertical',
//             loop: true,
//             slidesPerView: "auto",
//             speed: 6000,
//             spaceBetween: 0,
//             allowTouchMove: false,
//             autoplay: {
//                 delay: 0,
//                 disableOnInteraction: false,
//                 reverseDirection: true
//             },
//         });
//     };
//     // 初回実行
//     initSlider2();
//     // リサイズ時に再判定（頻繁な実行を避けるならリサイズイベントにdebounceをかけるのが理想）
//     let timer2 = 0;
//     window.addEventListener('resize', () => {
//         if (timer2 > 0) clearTimeout(timer2);
//         timer2 = setTimeout(() => {
//             initSlider2();
//         }, 200);
//     });

//     const slider4 = new Swiper('.str-eyecatch__main-slider', {
//         loop: true,
//         slidesPerView: "auto",
//         speed: 15000,
//         allowTouchMove: false,
//         preventInteractionOnTransition: true,
//         autoplay: { // 自動再生
//             delay: 0, // 1秒後に次のスライド（初期値：3000）
//             disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
//         },
//     });
//     const slider5 = new Swiper('.rec__deco-slider', {
//         loop: true,
//         slidesPerView: "auto",
//         speed: 15000,
//         allowTouchMove: false,
//         preventInteractionOnTransition: true,
//         autoplay: { // 自動再生
//             delay: 0, // 1秒後に次のスライド（初期値：3000）
//             disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
//         },
//     });
// });

// トップ画面　背景動画関連
// document.addEventListener('DOMContentLoaded', () => {
//     if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
//     gsap.registerPlugin(ScrollTrigger);
//     const target = document.querySelector('.js-home-bg-movie');
//     let mm = gsap.matchMedia();

//     if(target) {
//         gsap.to(target, {
//             opacity: 0.1,
//             duration: 0.6,
//             scrollTrigger: {
//                 trigger: ".hero__movie",
//                 start: "bottom 90%",
//                 end: "bottom 50%",
//                 scrub: true,
//             }
//         });
//         // gsap.to(target, {
//         //     opacity: 0.2,
//         //     immediateRender: false,
//         //     scrollTrigger: {
//         //         trigger: ".h-news",
//         //         start: "top 65%",
//         //         end: "top 35%",
//         //         scrub: true,
//         //     }
//         // });
//         // gsap.to(target, {
//         //     opacity: 0.2,
//         //     duration: 0.6,
//         //     immediateRender: false,
//         //     scrollTrigger: {
//         //         trigger: ".h-service",
//         //         start: "top 20%",
//         //         scrub: true,
//         //     }
//         // });
//     }

    

//     mm.add("(min-width: 769px)", () => {
//         gsap.to('.header__wrap-bg', {
//             opacity: 1,
//             duration: 0.6,
//             scrollTrigger: {
//                 trigger: ".h-news",
//                 start: "top 65%",
//                 toggleActions: 'play none none reverse',
//             },
//         });
//         gsap.to('.header__nav-list--home', {
//             y: 0,
//             duration: 0.6,
//             scrollTrigger: {
//                 trigger: ".h-news",
//                 start: "top 65%",
//                 toggleActions: 'play none none reverse',
//             },
//         });
//         ScrollTrigger.create({
//             trigger: ".h-about",
//             start: "bottom 60%",
//             onEnter: () => {
//                 document.querySelector('.header__nav-btn-front-page').classList.add('header__nav-btn-front-page--is-none');
//             },
//             onLeaveBack: () => {
//                 document.querySelector('.header__nav-btn-front-page').classList.remove('header__nav-btn-front-page--is-none');
//             },
//         });
//     });
//     mm.add("(max-width: 768px)", () => {
//         gsap.to('.header__wrap-bg', {
//             opacity: 1,
//             duration: 0.6,
//             scrollTrigger: {
//                 trigger: ".h-about",
//                 start: "top 50%",
//                 scrub: true,
//             },
//         });
//     });
    
//     // heroセクション用フェードアップアニメーション
//     const heroSetupFadeUp = () => {
//         const targets = document.querySelectorAll('.hero-js-fade-up');
        
//         targets.forEach(el => {
//             gsap.fromTo(el, 
//                 { 
//                     opacity: 0, 
//                     y: 100 
//                 }, 
//                 {
//                     opacity: 1, 
//                     y: 0,
//                     duration: .5,
//                     ease: "power2.out",
//                     scrollTrigger: {
//                         trigger: el,
//                         start: "top 60%",
//                         toggleActions: "play none none none",
//                         once: true
//                     }
//                 }
//             );
//         });
//     };

//     heroSetupFadeUp();
//     // setupPageFVReveal();
// });

// 汎用アニメーション
// document.addEventListener('DOMContentLoaded', () => {
//     if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
//     gsap.registerPlugin(ScrollTrigger);

//     // 汎用フェードアップアニメーション
//     const setupFadeUp = () => {
//         const targets = document.querySelectorAll('.js-fade-up');
        
//         targets.forEach(el => {
//             gsap.fromTo(el, 
//                 { 
//                     opacity: 0, 
//                     y: 50 
//                 }, 
//                 {
//                     opacity: 1, 
//                     y: 0,
//                     duration: .6,
//                     ease: "power2.out",
//                     scrollTrigger: {
//                         trigger: el,
//                         start: "top 80%",
//                         toggleActions: "play none none none",
//                         once: true
//                     }
//                 }
//             );
//         });
//     };
//     // 汎用フェードインアニメーション
//     const setupFadeInLeft = () => {
//         const targets = document.querySelectorAll('.js-fade-left');
        
//         targets.forEach(el => {
//             gsap.fromTo(el, 
//                 { 
//                     opacity: 0, 
//                     x: 50 
//                 }, 
//                 {
//                     opacity: 1, 
//                     x: 0,
//                     duration: .8,
//                     ease: "power2.out",
//                     scrollTrigger: {
//                         trigger: el,
//                         start: "top 80%",
//                         toggleActions: "play none none none",
//                         once: true
//                     }
//                 }
//             );
//         });
//     };
//     // 汎用フェードインアニメーション
//     const setupFadeInRight = () => {
//         const targets = document.querySelectorAll('.js-fade-right');
        
//         targets.forEach(el => {
//             gsap.fromTo(el, 
//                 { 
//                     opacity: 0, 
//                     x: -50 
//                 }, 
//                 {
//                     opacity: 1, 
//                     x: 0,
//                     duration: .8,
//                     ease: "power2.out",
//                     scrollTrigger: {
//                         trigger: el,
//                         start: "top 80%",
//                         toggleActions: "play none none none",
//                         once: true
//                     }
//                 }
//             );
//         });
//     };
//     // 採用サイトライン背景アニメーション
//     // const setUpExpansion = () => {
//     //     const targets = document.querySelectorAll('.js-rec-bg-lines');

//     //     targets.forEach(el => {
//     //         gsap.fromTo(el,
//     //             {
//     //                 scale: 0,
//     //             },
//     //             {
//     //                 scale: 1,
//     //                 duration: .6,
//     //                 ease: 'bounce.out',
//     //                 scrollTrigger: {
//     //                     trigger: el,
//     //                     start: "top 90%",
//     //                     toggleActions: "play none none none",
//     //                     once: true,
//     //                 }
//     //             }
//     //         );
//     //     });
//     // }

//     setupFadeInLeft();
//     setupFadeInRight();
//     setupFadeUp();
//     // setUpExpansion();
// });


// document.addEventListener('DOMContentLoaded', () => {
    // お客様の声ボタン
    // const btns = document.querySelectorAll('.js-expand-btn');

    // btns.forEach(btn => {
    //     // --- ここから追加：初期状態で開いている要素の高さをGSAPに認識させる ---
    //     const card = btn.closest('.str-voice__card');
    //     const content = card.querySelector('.str-voice__hide-area');
        
    //     if (content.classList.contains('open')) {
    //         // 現在のautoの高さを具体的な数値としてGSAPに覚えさせる
    //         gsap.set(content, { height: "auto", opacity: 1 });
    //     }
    //     // --- ここまで ---

    //     btn.addEventListener('click', () => {
    //         const arrow = card.querySelector('.btn__arrow--vertical');
    //         const btnText = card.querySelector('.btn__text');

    //         const isCurrentlyOpen = content.classList.contains('open');

    //         if (!isCurrentlyOpen) {
    //             // 【開く】
    //             content.classList.add('open');
    //             arrow.classList.add('open');
    //             btn.classList.add('open');
                
    //             gsap.fromTo(content, 
    //                 { height: 0, opacity: 0 }, 
    //                 { height: "auto", opacity: 1, duration: 0.6, ease: "power2.out" }
    //             );
    //             btnText.textContent = '詳細を閉じる';
    //         } else {
    //             // 【閉じる】
    //             content.classList.remove('open');
    //             arrow.classList.remove('open');
    //             btn.classList.remove('open');

    //             // ここで具体的な数値から0へスムーズに動くようになります
    //             gsap.to(content, { 
    //                 height: 0, opacity: 0, duration: 0.5, ease: "power2.in" 
    //             });
    //             btnText.textContent = '詳細を見る';
    //         }
    //     });
    // });

    // 数字で見るアニメーション
    // gsap.utils.toArray('.js-count-up').forEach((el) => {
    //     const targetNum = el.getAttribute('data-num');
        
    //     // 小数点が含まれているか判定（あればその桁数、なければ0）
    //     // 例: "95.5" -> 1桁, "95" -> 0桁
    //     const decimals = (targetNum.split('.')[1] || []).length;

    //     gsap.to(el, {
    //         innerText: targetNum,
    //         duration: 2,
    //         ease: "power2.out",
    //         scrollTrigger: {
    //             trigger: el,
    //             start: "top 90%",
    //         },
    //         onUpdate: function() {
    //             // targetNumの桁数に合わせて表示を固定する
    //             // innerTextを数値に変換してからtoFixedを適用
    //             el.innerText = parseFloat(el.innerText).toFixed(decimals);
    //         }
    //     });
    // });
// });


// ヘッダー設定
// document.addEventListener('DOMContentLoaded', () => {
//     const navBtn = document.querySelector('.header__nav-btn-front-page');
//     const navBtnSp = document.querySelector('.header__nav-btn--sp');
//     const navBtnSpTarget = document.querySelector('.header__nav-btn--sp');
//     const navList = document.querySelector('.header__nav-list');
//     const navListSp = document.querySelector('.header__nav-list--sp');
    
//     if (navBtn) {
//         navBtn.addEventListener('click', () => {
//             navBtn.classList.toggle('is-active');
//             navList.classList.toggle('is-active');
//         });
//     }
//     if (navBtnSp) {
//         navBtnSp.addEventListener('click', () => {
//             navBtnSpTarget.classList.toggle('is-active');
//             navListSp.classList.toggle('is-active');
//         });
//     }
// });

// ドロップダウンエリア
// jQuery(function() {
//     jQuery('.js-req-show-area').click(function() {
//         jQuery(this).next().slideToggle();
//         jQuery(this).toggleClass('active');
//     }) 
// });

// ポップアップ設定
// jQuery(function() {
//     // ダイアログを開く
//     jQuery('.js-open-dialog').on('click', function(e) {
//         e.preventDefault(); // aタグのデフォルト挙動（ページ遷移）を防止
        
//         const targetId = jQuery(this).data('target');
//         const dialog = document.getElementById(targetId);
        
//         if (dialog) {
//             dialog.showModal();
//             // 背景固定（dialogタグでも念のため推奨）
//             jQuery('body').css('overflow', 'hidden');
//         }
//     });

//     // ダイアログを閉じる（閉じるボタン）
//     jQuery('.js-close-dialog').on('click', function() {
//         const dialog = jQuery(this).closest('dialog')[0];
//         dialog.close();
//     });

//     // 背景クリックで閉じるための設定
//     jQuery('dialog').on('click', function(e) {
//         if (e.target === this) {
//             this.close();
//         }
//     });

//     // ダイアログが閉じた時の処理（bodyのスクロール解除）
//     jQuery('dialog').on('close', function() {
//         jQuery('body').css('overflow', '');
//     });
// });

// 採用ページ　エントリーから戻るときの挙動
// document.addEventListener('DOMContentLoaded', function() {
//     // 1. 確認画面にある「戻る」ボタンを取得
//     const prevBtn = document.querySelector('.wpcf7-previous');

//     if (prevBtn) {
//         prevBtn.addEventListener('click', function(e) {
//             // 通常の「戻る」処理（ページ遷移）を一度完全にストップさせる
//             e.preventDefault();

//             // 2. ブラウザの履歴（履歴上の1つ前のページ＝入力画面）に戻す際、
//             //    末尾に強制的に #rec-form をくっつけてジャンプさせる
//             //    ※もし入力画面のURLが固定なら、直接 window.location.href = '/recruit/#rec-form'; でも可
            
//             const referrer = document.referrer; // 1つ前にいたページのURLを取得
//             if (referrer) {
//                 // 前のページのURLの末尾に #rec-form をつけて強制ジャンプ
//                 window.location.href = referrer.split('#')[0] + '#rec-form';
//             } else {
//                 // 万が一リファラが取れない場合の安全策（直接URLを指定）
//                 window.location.href = '/recruit/#rec-form'; 
//             }
//         });
//     }
// });


// フロントページ　テキストアニメーション
// ページの読み込み完了後に実行
// window.addEventListener('DOMContentLoaded', () => {

//     // 1. 対象のタイトル要素を取得
//     const heroTtl = document.querySelector('.hero__ttl');
    
//     if (heroTtl) {
//         // 2. タイトルのテキストを取得し、<br>で分割して配列にする（改行を維持するため）
//         const lines = heroTtl.innerHTML.split('<br>');
//         heroTtl.innerHTML = ''; // 一旦中身を空にする

//         // 3. 1文字ずつ <span> で囲み直して再配置する
//         lines.forEach((line, index) => {
//             // 文字列を1文字ずつの配列に分解
//             const chars = Array.from(line);
//             const wrappedChars = chars.map(char => `<span class="char">${char}</span>`).join('');
            
//             // 2行目以降の場合は <br> を挟んでHTMLに戻す
//             if (index > 0) {
//                 heroTtl.innerHTML += '<br>';
//             }
//             heroTtl.innerHTML += wrappedChars;
//         });

//         // 4. GSAP + ScrollTrigger でアニメーションを設定
//         gsap.fromTo('.hero__ttl .char', 
//             {
//                 opacity: 0,
//                 x: 50 // スタート位置（右に50pxずれた状態）
//             },
//             {
//                 opacity: 1,
//                 x: 0,  // ゴール位置（元の位置）
//                 duration: 1.2, // 1文字にかける時間（秒）
//                 ease: 'power2.out',
//                 stagger: 0.05, // 💡ここがポイント：次の文字が動き出すまでの時間差（0.05秒ずつズラす）
//                 scrollTrigger: {
//                     trigger: '.hero__ttl', // アニメーションの発火基準にする要素
//                     start: 'top 80%',     // 画面の下方（上から80%の位置）に対象が来たら発火
//                     toggleActions: 'play none none none', // 1回だけ再生
//                 }
//             }
//         );
//     }

// });

// window.addEventListener('DOMContentLoaded', () => {

    // heroセクションテキストアニメーション設定
    // const heroTtl = document.querySelector('.hero__ttl');
    
    // if (heroTtl) {
    //     // 1. 先ほどと同様に、テキストを1文字ずつ <span> に分解する
    //     const lines = heroTtl.innerHTML.split('<br>');
    //     heroTtl.innerHTML = '';

    //     lines.forEach((line, index) => {
    //         const chars = Array.from(line);
    //         const wrappedChars = chars.map(char => `<span class="char">${char}</span>`).join('');
            
    //         if (index > 0) {
    //             heroTtl.innerHTML += '<br>';
    //         }
    //         heroTtl.innerHTML += wrappedChars;
    //     });

    //     // 2. 💡 GSAPのタイムライン（一連の流れ）を作成し、ScrollTriggerと紐付ける
    //     const tl = gsap.timeline({
    //         scrollTrigger: {
    //             trigger: '.hero__ttl', // 発火基準
    //             start: 'top 75%',
    //             toggleActions: 'play none none none',
    //         }
    //     });

    //     // 3. 【第1走者】タイトルの文字アニメーション
    //     tl.fromTo('.hero__ttl .char', 
    //         {
    //             opacity: 0,
    //             x: 50
    //         },
    //         {
    //             opacity: 1,
    //             x: 0,
    //             duration: 0.8,
    //             ease: 'power2.out',
    //             stagger: 0.05
    //         }
    //     )
    //     // 4. 【第2走者】💡 タイトルが終わったら自動でこれがスタートする
    //     .fromTo('.hero-js-fade-left', 
    //         {
    //             opacity: 0,
    //             x: 50 // 元の設定に合わせて適宜調整してください（右へフェードなら開始はマイナス側など）
    //         },
    //         {
    //             opacity: 1,
    //             x: 0,
    //             duration: 0.8,
    //             ease: 'power2.out'
    //         },
    //         '-=1'
    //         // 💡 もし「完全に終わる直前、少し被らせて開始したい」場合は、ここに「'-=0.3'」などを入れると微調整できます
    //     )
        // HTMLで 2つの要素に共通して「class="js-fade-up"」とついている場合
        // .fromTo('.hero-js-fade-up', 
        //     { opacity: 0, y: 40 },
        //     { 
        //         opacity: 1, 
        //         y: 0, 
        //         duration: 0.8, 
        //         ease: 'power2.out',
        //         stagger: 0.5 // 💡 1つ目のフェードアップが始まって「0.2秒後」に自動で2つ目が動き出す
        //     }
        // );
    // }

    // タイトル周りのアニメーション設定
    // 1. 対象の要素を取得
    // const pageTtlEn = document.querySelector('.u-page__ttl-en');
    // const pageTtlJa = document.querySelector('.u-page__ttl-ja');
    
    // if (pageTtlEn) {
    //     // 💡 trim() ではなく前後の余白だけを除去（文章内の改行は残す）
    //     const text = pageTtlEn.textContent.replace(/^\s+|\s+$/g, '');
    //     pageTtlEn.innerHTML = ''; // 一旦空にする

    //    // 💡 改行コードを判定しながら1文字ずつ分解
    //     // 💡 【修正後】のコード（こちらに書き換えてください）
    //     const wrappedChars = Array.from(text).map(char => {
    //         if (char === '\n') {
    //             // <br> タグをそのまま返しますが、.char クラスを持たせないため、GSAPの対象から完全に外れます
    //             return '<br>'; 
    //         }
    //         // 💡 空白（半角スペース）だった場合も、アニメーションの「間」にならないように除外する
    //         if (char === ' ') {
    //             return ' '; 
    //         }
    //         return `<span class="char">${char}</span>`;
    //     }).join('');
        
    //     pageTtlEn.innerHTML = wrappedChars;

    //     // 3. GSAP タイムラインを作成（画面表示と同時に順番にリレー再生）
    //     const tl = gsap.timeline();

    //     // 【第1走者】404ERROR が左から右へ1文字ずつパラパラ出現
    //     tl.fromTo('.u-page__ttl-en .char', 
    //         {
    //             opacity: 0,
    //             x: 30 // 右に30pxずらした状態からスタート
    //         },
    //         {
    //             opacity: 1,
    //             x: 0,
    //             duration: 0.5,
    //             ease: 'power2.out',
    //             stagger: 0.04, // 💡 テンポよく文字が出るように少し間隔を狭めています
    //             onStart: () => {
    //                 gsap.set('.u-page__ttl-en', { opacity: 1 });
    //             }
    //         }
    //     )
    //     // 【第2走者】日本語の「404エラー」が左から右へスライドしながらフェードイン
    //     .fromTo(pageTtlJa, 
    //         {
    //             opacity: 0,
    //             x: 40 // 💡 左に40pxずらした状態（ここから右に向かってスライドイン）
    //         },
    //         {
    //             opacity: 1,
    //             x: 0,
    //             duration: 0.6,
    //             ease: 'power2.out'
    //         },
    //         '-=0.5' // 💡 英語のタイトルの文字が出きる「0.2秒前」にフライングして開始（滑らかに繋がります）
    //     );
    // }

    // カードのアニメーション時間差設定
    // 1. 各カード要素を個別に取得する
    // const card1 = document.querySelector('.str-worries__card--01');
    // const card2 = document.querySelector('.str-worries__card--02');
    // const card3 = document.querySelector('.str-worries__card--03');
    // const card4 = document.querySelector('.str-worries__card--04');
    // const card5 = document.querySelector('.str-worries__card--05'); // HTMLの05に合わせる

    // // 2. 動かしたい順番通り（3, 1, 5, 2, 4）の配列を作る
    // const orderedCards = [card3, card1, card5, card2, card4];

    // // 配列内の要素がすべて存在しているかチェック（念のためエラー防止）
    // if (orderedCards.every(card => card !== null)) {
        
    //     // 3. 配列ごとGSAPに渡してアニメーションを実行
    //     gsap.fromTo(orderedCards, 
    //         {
    //             opacity: 0,
    //             y: 50 // 下に50pxずらした状態からスタート
    //         },
    //         {
    //             opacity: 1,
    //             y: 0,
    //             duration: 0.5,
    //             ease: 'power2.out',
                
    //             // 💡 ここがポイント：配列の「左から順」に0.15秒ずつズラして発火
    //             stagger: 0.15, 
                
    //             scrollTrigger: {
    //                 trigger: '.str-worries__main-area', // 親エリアのトップを基準にする
    //                 start: 'top 75%',                  // 画面の上から80%の位置に来たら発火
    //                 toggleActions: 'play none none none',
    //             }
    //         }
    //     );
    // }

// });

// スクロールヒント基本設定
// window.addEventListener('DOMContentLoaded', () => {
//     // スクロールヒントの初期化
//     new ScrollHint('.js-scroll-hint', {
//         suggestiveShadow: true, // 💡 スクロールできる側にうっすらと影を出す（親切！）
//         i18n: {
//             scrollable: '横スクロールできます' // 表示するテキスト
//         }
//     });
// });

// 背景動画対策　iphoneが省電力時に背景動画が再生されない場合、画像に切り替える
// jQuery(function(){
//     let is_playing = false;
//     const video = document.querySelector('.bg-movie-content');
//     video
//         .play()
//         .then(() => {
//         // 省電力モードではないときの処理
//         //alert("省電力モードではありません");
//         })
//     .catch((error) => {
//     // 省電力モードのときの処理
//         jQuery('.bg-movie-content').css('display', 'none');
//         jQuery('.bg-movie-image').css('display', 'block');
//     });
// });
