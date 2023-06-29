let swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    // Navigation arrows
    navigation: {
      nextEl: '.custom-button-next',
      prevEl: '.custom-button-prev',
    },
    slidesPerView: 4,
    spaceBetween: 20,
    watchSlidesProgress: true,
    breakpoints: {
        1800: {
            slidesPerView: 4
        },
        1400: {
            slidesPerView: 3
        },
        768: {
            slidesPerView: 2
        },
        320: {
            slidesPerView: 1
        }
    }
});
let swiper1 = new Swiper('.swiper-1', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    // Navigation arrows
    navigation: {
      nextEl: '.custom-button-next1',
      prevEl: '.custom-button-prev1',
    },
    spaceBetween: 30,
    slidesPerView: 1.75,
    speed: 800,
    rewind: true,
    observer: true,
    observeParents: true,
    observeSlideChildren: true,
    breakpoints: {
        1700: {
            slidesPerView: 1.5
        },
        1400: {
            slidesPerView: 1.25
        },
        1200: {
            slidesPerView: 1.1
        },
        320:{
            slidesPerView: 1
        }
    }
});
let swiper2 = new Swiper('.swiper-2', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    // Navigation arrows
    navigation: {
      nextEl: '.custom-button-next2',
      prevEl: '.custom-button-prev2',
    },
    spaceBetween: 30,
    slidesPerView: 1.75,
    speed: 800,
    rewind: true,
    observer: true,
    observeParents: true,
    observeSlideChildren: true,
    breakpoints: {
        1700: {
            slidesPerView: 1.5
        },
        1400: {
            slidesPerView: 1.25
        },
        1200: {
            slidesPerView: 1.1
        },
        320:{
            slidesPerView: 1
        }
    }
});


document.addEventListener("DOMContentLoaded", () => {
    let header = document.querySelector('.tab-btns'),
        tabs = header.querySelectorAll('.wp-block-button__link'),
        tabContent = document.querySelectorAll('.tabcontent');

    function hideTabContent(a) {
        for (let i = a; i < tabContent.length; i++) {
            tabContent[i].classList.remove('tabcontent_show');
            tabContent[i].classList.add('tabcontent_hide');

        }
    }

    hideTabContent(1);
    function toggleButtons(class1, class2, class3, class4){
        let btn1 = document.querySelector('.' + class1);
        let btn2 = document.querySelector('.' + class2);
        btn1.classList.remove(class1);
        btn2.classList.remove(class2);
        btn1.classList.add(class3);
        btn2.classList.add(class4);
    }
    function showTabContent(b) {
        if (tabContent[b].classList.contains('tabcontent_hide')) {
            tabContent[b].classList.remove('tabcontent_hide');
            tabContent[b].classList.add('tabcontent_show');
        }
        if(b === 0){
            toggleButtons('custom-button-next1_hide', 'custom-button-prev1_hide', 'custom-button-next1_show', 'custom-button-prev1_show');
            toggleButtons('custom-button-next2_show', 'custom-button-prev2_show', 'custom-button-next2_hide', 'custom-button-prev2_hide');
            swiper1.update();
            swiper2.update();
        }else{
            toggleButtons('custom-button-next1_show', 'custom-button-prev1_show', 'custom-button-next1_hide', 'custom-button-prev1_hide');
            toggleButtons('custom-button-next2_hide', 'custom-button-prev2_hide', 'custom-button-next2_show', 'custom-button-prev2_show');
            swiper1.update();
            swiper2.update();
        }
    }

    header.addEventListener('click', function(event) {
        let target = event.target;
        for(let i = 0; i < tabs.length; i++) {
            if (target == tabs[i]) {
                hideTabContent(0);
                showTabContent(i);
                break;
            }
        }
    });
    tabs[0].classList.add('tab_active');
    function disableTabActive(c){
        if(tabs[c].classList.contains('tab_active')){
            tabs[c].classList.remove('tab_active');
        }
    }
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            for(let i = 0; i < tabs.length; i++){
                disableTabActive(i);
            }
            tab.classList.add('tab_active');
        })
    })


    const btnsReviews = document.querySelectorAll('.button-reviews'),
          bear = document.querySelector('.background-bear'),
          rabbit = document.querySelector('.background-rabbit');
    let opacity = 1;
    function animationFiguresMinus(){
        opacity -= 0.05;
        bear.style.opacity = opacity;
        rabbit.style.opacity = opacity;
        console.log(rabbit.style.opacity)
        if(opacity <= -5){
            opacity = 0
            clearInterval(animation);
            animation = setInterval(animationFiguresPlus, 2);
        }
    }
    function animationFiguresPlus(){
        opacity += 0.01;
        bear.style.opacity = opacity;
        rabbit.style.opacity = opacity;
        console.log(rabbit.style.opacity)
        if(opacity >= 1){
            clearInterval(animation);
        }
    }
    btnsReviews.forEach(btn => {
        btn.addEventListener('click', () => {
            animation = setInterval(animationFiguresMinus, 1);
        })
    })


    const accordionBodies = document.querySelectorAll('.accordion__body'),
          accordionBtns = document.querySelectorAll('.accordion__btn')
    accordionBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            for(let i = 0; i < accordionBtns.length; i++){
                if(accordionBtns[i] === btn){
                    accordionBtns[i].classList.toggle('accordion__btn_active');
                    accordionBodies[i].classList.toggle('accordion__body_hide');
                    break;
                }
            }
        })
    })



    const menu = document.querySelector('.menu'),
          menuItem = document.querySelectorAll('.menu_item'),
          hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', () => {
        menu.classList.toggle('menu_active');
    });
})