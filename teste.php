<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tetse Slide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="OwlCarousel2-2.3.4\dist\assets\owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4\dist\assets\owl.theme.default.min.css" type="text/css">          
</head>
<body>
    <div class="owl-carousel owl-theme">
        <div class="item"><img src='admin_area\imagens_produtos\cerveja-imperio-350ml.jpg'></div>
        <div class="item"><h4>TESTE</h4></div>
        <div class="item"><h4>3</h4></div>
        <div class="item"><h4>4</h4></div>
        <div class="item"><h4>5</h4></div>
        <div class="item"><h4>6</h4></div>
        <div class="item"><h4>7</h4></div>
        <div class="item"><h4>8</h4></div>
        <div class="item"><h4>9</h4></div>
        <div class="item"><h4>10</h4></div>
        <div class="item"><h4>11</h4></div>
        <div class="item"><h4>12</h4></div>
    </div>
    <script src="OwlCarousel2-2.3.4\docs_src\assets\vendors\jquery.min.js" type="text/javascript"></script>
    <script src="OwlCarousel2-2.3.4\dist\owl.carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
});
    
    </script>
</body>
</html>