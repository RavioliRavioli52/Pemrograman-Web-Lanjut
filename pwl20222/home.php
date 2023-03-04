<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Nasional</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background-size: cover;
    }

    .slider{
        width: 100%;
        height: 600px;
        border-radius: 10px;
        overflow: hidden;
        margin-left: 0;
    }

    .slides{
        width: 500%;
        height: 600px;
        display: flex;
    }

    .slides input{
        display: none;
    }

    .slide{
        width: 20%;
        transition: 2s;
    }

    .slide img{
        width: 100%;
        height: 600px;
    }

    .navigation-manual {
        position: absolute;
        width: 800px;
        margin-top: -100px;
        display: flex;
        justify-content: center;
        cursor: pointer;
        margin-left: 10%;
    }

    .manual-btn{
        border: 2px solid white;
        padding: 5px;
        border-radius: 10px;
        transition: 1s;
        cursor: pointer;
    }

    .manual-btn:not(:last-child){
        margin-right: 40px;
    }

    .manual-btn:hover {
        background: white;
    }

    #radio1:checked ~ .first{
        margin-left: 0px;
    }

    #radio2:checked ~ .second{
        margin-left: -20%;
    }

    #radio3:checked ~ .first{
        margin-left: -40%;
    }
</style>
<body>
<header>
    <h1 class="text-center">Perpustakaan Nasional</h1>
</header>
<main>
    <section>
        <br>
        <br>
        <h2 class="text-center">Selamat Datang di Perpustakaan Nasional</h2>
        <p class="text-center">Perpustakaan Nasional menyediakan layanan peminjaman buku secara online dengan mudah dan cepat. Dengan koleksi buku yang lengkap dan up-to-date, kami siap memenuhi kebutuhan literasi anda.</p>
        <p class="text-center">"Buku adalah jendela masa depan"</p>
    </section>
    <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <div class="slide first">
                <img src="img1.jpg">
            </div>
            <div class="slide second">
                <img src="img2.jpg">
            </div>
            <div class="slide">
                <img src="img3.jpg">
            </div>
        </div>
    </div>
    <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
    </div>
    </div>
    <script>
        let gerak = 1 ;
        setInterval(function(){
            document.getElementById('radio' + gerak).checked= true
            gerak++ ;
            if (gerak > 5){
                gerak =1
            }
        } , 4000);

    </script>
</main>
<footer>
    <br>
    <br>
    <p class="text-center"><marquee behavior="sliding" direction= "right">&copy; 2023 Perpustakaan Nasional</marquee></p>
</footer>
</body>
</html>
