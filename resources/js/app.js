require('./bootstrap');

require('alpinejs');

// Register $ global var for jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;
// Import jQuery Plugins


document.addEventListener("DOMContentLoaded", (event) => {
    // get_var_products_mini_card_ajax();
    // loginFunc();
});

function loginFunc (params) {
    var button_register = document.querySelectorAll('.register, .signin-image-link');
    var button_login = document.querySelectorAll('.login, .signup-image-link');
    var signup_form = document.querySelector('.signup');
    var signin_form = document.querySelector('.sign-in');

    button_register.forEach(element => {
        element.addEventListener('click', function (e) {
            console.log(e.target);
            if (signin_form.classList.contains('fadeInDown')) {
                elHide(signin_form);
                signin_form.classList.remove('fadeInDown');
            }

            signup_form.classList.remove('fadeInDown');
            elShow(signup_form);
            signup_form.classList.add('fadeInDown');
        })
    });

    button_login.forEach(element => {
        element.addEventListener('click', function () {
            if (signup_form.classList.contains('fadeInDown')) {
                elHide(signup_form);
                signup_form.classList.remove('fadeInDown');
            }

            signin_form.classList.remove('fadeInDown');
            elShow(signin_form);
            signin_form.classList.add('fadeInDown');
        })
    });

    document.addEventListener('mouseup', function (e) {
        if (e.target.closest('.signup-content') == null) {
            elHide(signup_form);
        }
        if (e.target.closest('.signin-content') == null) {
            elHide(signin_form);
        }
    });

    function elHide(x) {
        x.style.display = "none";
    }

    function elShow(x) {
        x.style.display = "block";
    }
}

function get_var_products_mini_card_ajax() {

    var var_products = document.querySelectorAll('.card .img-thumbnail');

    var_products.forEach(element => {

        element.addEventListener('mouseover', function (e) {
            e.preventDefault();

            var product_id = e.target.closest('div').id;
            getProductCardData(product_id);
        })
    })
    document.querySelector('.thumbs').addEventListener('mouseleave', function (e) {

        var product_id = document.querySelector('.product_thumb').id;
        getProductCardData(product_id);
    })
}

function getProductCardData(product_id) {
    var title_product = document.querySelector('.title_product'),
        img_custom = document.querySelector('.img-custom'),
        price = document.querySelector('.main-price'),
        disc_price = document.querySelector('.discount-price');

    fetch('product_var_data.php', {
        method: "POST",
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({ product_id: product_id })
    })
        .then((res) => res.json())
        .then((data) => {
            title_product.innerHTML = data.title;
            img_custom.src = data.src;
            price.src = data.price;
            disc_price.src = data.discount_price;
        })
        .catch((error) => console.log(error))
}

