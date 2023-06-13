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

<div class="slider">
  {foreach $products as $product}
    <div class="slider-item">
        <img src="images/p/{$product.id_product }.jpg" alt="Profuct {$product.id_product }">
        <div>{$product.name }</div>
        <div><p>{displayPrice price=$product.price}</p>
        {if isset($product.specific_price)}
            <p>{displayPrice price=$product.specific_price.priceWithoutReduction}</p>
        {/if}
        </div>
    </div>
  {/foreach}
</div>
        


    </div>
    <script src="/js/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/tiny-slider.js"></script>
    <script src="/js/theme.js"></script>

    <script>
        var slider = tns({
            container: '.slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            autoplayButtonOutput: false,
            controls: true,
            nav: false
        });
    </script>
</body>

</html>