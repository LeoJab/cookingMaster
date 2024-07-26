/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './bootstrap.js';
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

document.addEventListener('DOMContentLoaded', () => {
    console.log('PAGE CHARGE');
    const btnPlus = document.querySelector('.btnPlus');
    const btnMoins = document.querySelector('.btnMoins');
    const btnUser = document.querySelector('.btnUser');
    const btnTrait = document.querySelector('.btnTrait');
    const btnCateHeader = document.querySelector('.btnCateHeader');
    const btnPartage = document.querySelector('#partage');

    console.log(btnPlus, btnMoins, btnUser, btnTrait, btnCateHeader, btnPartage);

    if (btnPlus) {
        btnPlus.addEventListener('click', () => {
            const nbrPers = document.querySelector('.nbrPers');
            const persValue = parseInt(nbrPers.innerHTML);
            nbrPers.innerHTML = persValue + 1;

            const elements = document.querySelectorAll('.qteIng');
            elements.forEach((item) => {
                const ingValeur = item.getAttribute('data-unite');
                item.innerHTML = parseFloat(ingValeur) * parseInt(nbrPers.innerHTML);
                //console.log(ingValeur, persValue);
            });
        });
    }


    if (btnMoins) {
        btnMoins.addEventListener('click', () => {
            const nbrPers = document.querySelector('.nbrPers');
            const persValue = nbrPers.innerHTML;
            persValue <= 0 ? nbrPers.innerHTML = 1 : nbrPers.innerHTML = persValue - 1;

            const elements = document.querySelectorAll('.qteIng');
            elements.forEach((item) => {
                const ingValeur = item.getAttribute('data-unite');
                item.innerHTML = parseFloat(ingValeur) * parseInt(nbrPers.innerHTML);
                //console.log(ingValeur, persValue);
            });
        });
    }

    if (btnUser) {
        btnUser.addEventListener('click', () => {
            const menu = document.querySelector('#menu_user');
            //console.log(menu, 'click');

            if (menu.classList == 'none') {
                menu.classList.toggle('none');
                //console.log('if');
            } else {
                menu.classList.toggle('none');
                //console.log('else');
            };
        });
    }

    if (btnTrait) {
        btnTrait.addEventListener('click', () => {
            const menu = document.querySelector('#menu_trait');
            //console.log(menu, 'click');

            if (menu.classList == 'none') {
                menu.classList.toggle('none');
                //console.log('if');
            } else {
                menu.classList.toggle('none');
                //console.log('else');
            };
        });
    }

    if (btnCateHeader) {
        btnCateHeader.addEventListener('click', () => {
            const menu = document.querySelector('#menu_categorie');
            //console.log(menu, 'click');

            if (menu.classList == 'none') {
                menu.classList.toggle('none');
                //console.log('if');
            } else {
                menu.classList.toggle('none');
                //console.log('else');
            };
        });
    }

    if (btnPartage) {
        btnPartage.addEventListener('click', () => {
            let copyText = document.querySelector('.copyText').value;
            navigator.clipboard.writeText(copyText);
            //console.log('partage', copyText)
        })
    }
})