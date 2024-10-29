document.addEventListener('DOMContentLoaded', function() {
    // Navigation
    let bar = document.getElementById('bar');
    let close = document.getElementById('close');
    let nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        });
    }

    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active');
        });
    }

    // Product Image Change
    let bigImage = document.getElementById('BigImage');
    let smallImages = document.getElementsByClassName('smallImage');

    if (smallImages.length) {
        for (let i = 0; i < smallImages.length; i++) {
            smallImages[i].onclick = function () {
                bigImage.src = smallImages[i].src;
            }
        }
    }

    function changeProductImage(bigImageSrc) {
        if (bigImage) {
            bigImage.src = bigImageSrc;
        }
    }

    function changeProductColor(bigImageSrc, smallImagesSrc) {
        if (bigImage) {
            bigImage.src = bigImageSrc;
        }
        if (smallImages.length) {
            for (let i = 0; i < smallImages.length; i++) {
                smallImages[i].src = smallImagesSrc[i];
            }
        }
    }
});

 
