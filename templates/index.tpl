<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 01 - Webmaster</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/theme.css">
</head>

<body>

    <div id="app">


        {debug}

<div class="header">
    <h1>Best Selers</h1>
</div>


<div class="slider-container">

    <button class="slider_button" id="prevButton"><img src="images/prev.svg" alt="prev" /></button>
    <button class="slider_button" id="nextButton"><img src="images/next.svg" alt="prev" /></button>
    <div class="my-slider">
        {foreach $products as $product}
            <div class="my-slider">
                <div class="slider-item">
                    <div class="card">                
                        <img src="images/p/{$product.id_product }.jpg" alt="Profuct {$product.id_product }">
                        <p class="card_description">{$product.name }</p>
                        <div>
                            {if isset($product.specific_price) && $product.specific_price != false}
                                <a class="price current-price-discount">{displayPrice price=$product.specific_price.priceWithoutReduction}</a> 
                                <a class="price regular-price" >{displayPrice price=$product.price}</a>
                                {else}
                                <p class="price" >{displayPrice price=$product.price}</p>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>    
        {/foreach} 
    </div>    
</div>



        


    </div>
    <script src="/js/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/tiny-slider.js"></script>
    <script src="/js/theme.js"></script>

    <script>


    var slider = tns({
    container: '.my-slider',
    loop: true,
    items: 4,
    slideBy: 'page',
    nav: false,    
    autoplayButtonOutput: false,
    mouseDrag: true,
    controls: false,


  });

  // Pobierz przyciski z DOM
    var prevButton = document.getElementById('prevButton');
    var nextButton = document.getElementById('nextButton');

    // Dodaj obsługę kliknięcia do przycisków
    prevButton.addEventListener('click', function() {
    slider.goTo('prev');
    });

    nextButton.addEventListener('click', function() {
    slider.goTo('next');
    });
    </script>
</body>

</html>