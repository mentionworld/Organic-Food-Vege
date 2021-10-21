/*-------------------------Toggle----------------*/
var Menuitems = document.getElementById("Menuitems");
var img = document.getElementById("img");
Menuitems.style.maxHeight = "0px";

function menutoggle() {
    if (Menuitems.style.maxHeight == "0px") {
        Menuitems.style.maxHeight = "200px";
    } else {
        Menuitems.style.maxHeight = "0px";
    }
    if (img.src.match("menu.png")) {
        img.src = "temp/x.png";
    } else {
        img.src = "temp/menu.png";
    }
}
/*------------------- Scrolling header----------------*/
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

/*-----------------OWl Carousel--------------*/
$(document).ready(function() {
    $('.post-contaner').owlCarousel({
        loop: true,

        pagination: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            1000: {
                items: 3
            },
            1200: {
                items: 4
            }
        }

    })
});


// -------------------------Login ----------------
var loginform = document.getElementById("loginform");
var regisform = document.getElementById("regiform");
var indicator = document.getElementById("indicator");

function register() {
    regisform.style.transform = "translateX(0px)";
    loginform.style.transform = "translateX(0px)";
    indicator.style.transform = "translateX(100px)";
}

function login() {
    regisform.style.transform = "translateX(300px)";
    loginform.style.transform = "translateX(300px)";
    indicator.style.transform = "translateX(0px)";
}

// --------------------------carrt-----------

function manage_cart(pid, type) {
    if (type == 'update') {
        var qty = jQuery("#" + pid + "qty").val();
    } else {
        var qty = jQuery('#qty').val();
    }
    jQuery.ajax({
        url: 'manage.cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }
    });
}
//---------- 

var coll = document.getElementsByClassName("collapsible");
var i;
// var span = document.getElementById("span");
for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            // span.innerText="-";
            content.span.innerText = "+";
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            // .innerText="+";
            content.span.innerText = "-";
        }
    });
}