<?php 

$host = "localhost";
$user = "root";
$password = "12345678";
$dbname = "ruru";

$iconn = @mysqli_connect($host,$user,$password,$dbname);
if (mysqli_connect_errno($iconn))
  die ("系統維護中，請稍候");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fun Taiwan在地嚮導</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--    外部樣式表檔begin-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <!--    外部樣式表檔end-->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Noto Sans TC', sans-serif;
        }

        /*    導覽列樣式begin*/
        .navbar {
            background-color: #FCF562;
            padding: 0 16px;
        }

        .navbar-brand,
        .nav-link {
            color: #3A423D;
            padding: 16px 0;
        }

        .nav-link:hover {
            background-color: #3A423D;
            color: white;
        }

        .dropdown-item {
            background-color: #3A423D;
            color: white;
        }


        .dropdown-item:hover {
            background-color: #fcf78f;
            color: #7a8980;
        }

        .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        .dropdown-toggle::after {
            transition: all .5s;
        }

        .navbar-toggler {
            background: url(images/square.png) no-repeat center center;
            background-size: contain;

        }

        /*    導覽列樣式end*/
        /*        回最上層樣式begin*/
        .goTopFather {
            position: relative;
            z-index: 10000;
            list-style: none;
            color: #3A423D;
        }

        .goTopFather:hover {
            color: #FCF562;

        }

        .goTop {
            position: fixed;
            bottom: 0;
            right: 0;
        }

        /*        回最上層樣式end*/

        /*        關於我們樣式begin*/
        .titlePoint {
            width: 20px;
            height: 30px;
            background-color: #3A423D;
        }

        .imgbox {
            height: 280px;
            background: url(images/about1.png) no-repeat center center;
            background-size: contain;
        }

        .img2 {
            background: url(images/about2.png) no-repeat center center;
            background-size: contain;
        }

        .img3 {
            background: url(images/about3.png) no-repeat center center;
            background-size: contain;
        }

        .timeline {
            position: relative;
        }

        .timeline::after {
            content: "";
            position: absolute;
            width: 12px;
            background-color: #FCF562;
            top: 0;
            left: calc(50% - 6px);
            height: 100%;
            box-shadow: 2px 2px 4px #3A423D;
        }

        .timepointer {
            position: relative;
        }

        .timepointer::after {
            content: "";
            position: absolute;
            width: 26px;
            height: 26px;
            background-color: #FCF562;
            top: 0;
            left: calc(50% - 13px);
            border: 3px solid #3A423D;
            border-radius: 50%;
            z-index: 9;
            box-shadow: 2px 2px 4px #3A423D;
        }

        /*        關於我們樣式end*/

        .cardbtn {
            background-color: #FCF562;
        }

        @media screen and (max-width:576px) {

            .timepointer::after,
            .timeline::after {
                display: none;
            }
        }

        .card {
            border: solid 3px #FCF562;
        }

        /*        modal區塊樣式begin*/
        .modalHeader {
            background-color: #fff984;
            color: #3A423D;
        }

        .modalFooter {
            background-color: #afbeb4;
        }

        /*        modal區塊樣式end*/

        /*        旅人評價begin*/
        .commentBtn {
            background-color: #FCF562;
        }

        /*        旅人評價end*/

        /*        行程客製begin*/
        .commentPic {
            background-color: #afbeb4;
        }

        .commentBtn {
            background-color: #FCF562;
        }

        /*        行程客製end*/

        /*        常見問題begin*/
        .card-header {
            background-color: #9f9f9f;
        }

        .questionBtn {
            color: aliceblue;
        }

        .questionBtn:hover {
            color: #FCF562;
        }

        /*        常見問題end*/

        /*        連絡我們begin*/
        .contactDetail {
            position: relative;
        }

        .btn-group {
            position: absolute;
            left: 12.5%;
        }

        .lineBtn {
            background-color: rgba(27, 142, 27, 0.82);
            transition: all .5s;
            color: white;
        }

        .fbBtn {
            background-color: #3b5fc1;
            transition: all .5s;
            color: white;

        }

        .igBtn {
            background-color: #e26178;
            transition: all .5s;
            color: white;
        }

        .lineBtn:hover,
        .fbBtn:hover,
        .igBtn:hover {
            transform: translateY(-5px);
            color: white;
            box-shadow: 1px 2px 3px gray;
        }


        /*        連絡我們end*/

        footer {
            margin-top: 5%;
            background-color: #afbeb4;
            padding: 1% 0;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <!--       首頁輪播begin-->
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>宜蘭抹茶山</h5>
                        <p>與抹茶在山裡邂逅</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>花蓮七星潭</h5>
                        <p>聽海哭的聲音</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>新北九份</h5>
                        <p>千尋就在新北九份處</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/4.jpg" alt="Fourth slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>台中武陵農場</h5>
                        <p>絕美賞櫻祕境</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--       首頁輪播end-->
        <!--        導覽列begin-->
        <nav class="navbar navbar-expand-md sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fas fa-map-pin mr-2"></i>Fun Taiwan在地嚮導</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation navbar-light">
                    <span class="navbar-toggler-icon navbar-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link navLink aboutClick" href="#aboutUs">關於我們<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#trip" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                最新行程
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">北部行程</a>
                                <a class="dropdown-item" href="#">東部行程</a>
                                <a class="dropdown-item" href="#">中部行程</a>
                                <a class="dropdown-item" href="#">南部行程</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#comment">旅人評價</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#customize">行程客製</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#question">常見問題</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">聯絡我們</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--        導覽列end-->
        <!--        回最上層begin-->
        <a class="goTopFather" href="#">
            <i class="fas fa-arrow-alt-circle-up fa-5x goTop mx-4"></i></a>
        <!--        回最上層end-->
        <!--關於我們begin-->
        <section id="aboutUs">
            <div class="title d-flex mt-4 mx-4">
                <div class="titlePoint"></div>
                <h3>關於我們</h3>
            </div>
            <!--
            <div class="titlePoint mt-3 d-inline-block ml-4"></div>
            <h2 class="d-inline">關於我們</h2>
            -->
            <section id="about" class="my-3">
                <div class="timeline">
                    <div class="row timepointer align-items-center">
                        <div class="col-sm-6 text-center text-sm-right px-5 wow fadeInRight">
                            <h3 class="mb-3">什麼是Fun Taiwan在地嚮導</h3>
                            <p class="text-justify">手寫菜單蠻可愛，但超級意外他們品項非常多耶，根本可以從中餐吃到下午茶再來個晚餐。 老闆娘妹妹笑說從一開始賣咖啡、甜點，後來客人詢問有沒有鹹食，乾脆就自己設計餐點加入菜單中，不知不覺中就累積出這麼多品項了。而且她很自豪的說，餐食設計的出發點是想做給家人吃，所以食材選料上都不手軟，把客人的餐點也當作要做給自家人吃一樣。</p>
                        </div>
                        <div class="col-sm-6 wow fadeInLeft">
                            <div class="imgbox"></div>
                        </div>
                    </div>
                    <div class="row timepointer flex-row-reverse align-items-center">
                        <div class="col-sm-6 text-center text-sm-left px-5 wow fadeInLeft" data-wow-delay="1s">
                            <h3 class="mb-3">100種以上在地人規畫行程</h3>
                            <p class="text-justify">Netflix韓國神劇《魷魚遊戲》紅遍全球，成為近期最夯話題，不僅僅劇情在各大社群論壇掀起討論，劇中出現的元素如符號、面具、椪糖和紅色工作服也跟著爆紅。而劇中的參賽者必須穿著的綠色全套運動服飾，也讓原本宅氣十足的復古運動套裝再次翻紅！不小心追劇追到被跑跳舒適的運動套裝給升火嗎？本篇介紹不同材質的運動套裝穿法，讓你穿起屬於你的運動風，跟上這波「魷魚熱」跟風之餘還能帥一波！</p>
                        </div>
                        <div class="col-sm-6 wow fadeInRight wow fadeInLeft" data-wow-delay="1s">
                            <div class="imgbox img2"></div>
                        </div>
                    </div>
                    <div class="row timepointer align-items-center">
                        <div class="col-sm-6 text-center text-sm-right px-5 wow fadeInRight" data-wow-delay="1s">
                            <h3 class="mb-3">最低新台幣1000元即可旅遊</h3>
                            <p class="text-justify">原本是設計給運動員訓練時所穿著的練習服，舒適度不用多說，沒想到因為舒服到讓人一穿再穿，竟然一度成為「阿宅最愛」的穿搭款式；近年來因為東西方演藝圈大咖巨星著用，才讓運動套裝擺脫「臭名」，人氣直線上升，成為運動時尚的指標穿搭之一，即使不是運動員，穿上去之後也讓你帥氣爆表。</p>
                        </div>
                        <div class="col-sm-6 wow fadeInLeft" data-wow-delay="1s">
                            <div class="imgbox img3"></div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!--關於我們end-->
        <!--        行程介紹begin-->
        <section id="trip" class="mx-4">
            <div class="title d-flex mt-4">
                <div class="titlePoint"></div>
                <h3>最新行程</h3>
            </div>
            <div class="card-columns mt-3">

            </div>
        </section>
        <!--        行程介紹end-->
        <!--modal區塊begin-->
        <!--modal區塊end-->
        <!--        旅人評價begin-->

        <section id="comment">
            <div class="title commentTitle d-flex mt-4 ml-4">
                <div class="titlePoint"></div>
                <h3>旅人評價</h3>
            </div>
            <div class="commentWord mt-3"></div>
            <a class="btn commentBtn ml-4" href="#">看更多評價</a>
        </section>
        <!--        旅人評價end-->
        <!--      行程客製begin-->

        <section id="customize" class="mt-5 mx-4">
            <div class="title d-flex">
                <div class="titlePoint"></div>
                <h3>行程客製</h3>
            </div>
            <div class="row align-items-center mt-3">
                <div class="formContainer col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">姓名</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="mname" placeholder="請輸入真實姓名">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">性別</label>
                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" name="msex" value="先生">
                                    <label class="form-check-label" for="male">男生</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" name="msex" value="小姐">
                                    <label class="form-check-label" for="female">女生</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">連絡電話</label>
                            <input type="tel" maxlength="10" class="form-control" id="exampleInputEmail1" name="mtel" placeholder="請輸入連絡電話">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">旅遊日期</label>
                            <div>
                                <input type="date" class="form-control form-inline" id="exampleInputEmail1" name="mday"><input type="date" class="form-control form-inline" id="exampleInputEmail1" name="mday">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">旅遊人數</label>
                            <input type="number" min="1" max="30" class="form-control" id="exampleInputEmail1" name="mnum" placeholder="請輸入旅遊人數">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">旅遊需求</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mcontent" placeholder="旅行地點、旅行主題(逛街、歷史古蹟...)"></textarea>
                        </div>
                        <input type="submit" class="btn commentBtn" value="送出" name="sendOk">
                    </form>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <img class="commentPic img-fluid" src="images/comment.png" alt="">
                </div>
            </div>
        </section>
        <!--      行程客製end-->
        <?php
        if (isset($_POST['sendOk']))
        {
        
        $mname = $_POST['mname'];
        $msex = $_POST['msex'];
        $mtel = $_POST['mtel'];
        $mday = $_POST['mday'];
        $mnum = $_POST['mnum'];
        $mcontent = $_POST['mcontent'];
        
        
        $isqi = "INSERT INTO `message` (`mname`, `msex`, `mtel`, `mday`, `mnum`, `mcontent`) VALUES ('{$mname}', '{$msex}', '{$mtel}', '{$mday}', '{$mnum}', '{$mcontent}')";
        
        $iresult=mysqli_query($iconn, $isqi);
        }
        ?>
        <!--        modal區塊begin-->
        <div id="customizeModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">**您的需求我們已收到**</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <?php echo "<p>{$mname}{$msex}您好，謝謝您的聯絡，您的需求我們已收到。<br>將於3個工作日內與您連絡，祝順心，謝謝。</p>";?>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button></div>
                </div>
            </div>
        </div>
        <!--        modal區塊end-->
        <!--        常見問題begin-->
        <section id="question" class="mx-4">
            <div class="title d-flex mt-4 ">
                <div class="titlePoint"></div>
                <h3>常見問題</h3>
            </div>
            <div class="accordion w-75 mx-auto mt-4" id="accordionExample">
                <div class="card">
                    <div class="card-header text-muted" id="headingOne">
                        <h2 class="mb-0 text-reset">
                            <button class="btn questionBtn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Q：如何付款?
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            A：Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequatur ipsum earum laborum quas labore cupiditate, dignissimos a recusandae ullam.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn questionBtn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Q：因故取消是否可以退費?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            A：Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequatur ipsum earum laborum quas labore cupiditate, dignissimos a recusandae ullam.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn questionBtn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Q：語言可以溝通嗎?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            A：Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequatur ipsum earum laborum quas labore cupiditate, dignissimos a recusandae ullam.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--        常見問題end-->
        <!--連絡我們begin-->
        <section id="contact" class="mx-4 mt-4">
            <div class="title d-flex">
                <div class="titlePoint"></div>
                <h3>連絡我們</h3>
            </div>
            <div class="contactDetail">
                <ul class="list-group list-group-flush w-75 mx-auto">
                    <li class="list-group-item"><i class="fas fa-phone-alt mr-2"></i>客服專線：02-1234-5678</li>
                    <li class="list-group-item"><i class="far fa-envelope mr-2"></i>客服信箱：funtaiwan@gmail.com</li>
                    <li class="list-group-item"><i class="far fa-clock mr-2"></i>服務時間：(一)~(五) 9:00~17:00 不包含國定假日</li>
                </ul>
                <div class="btn-group w-75" role="group">
                    <a href="https://tw.yahoo.com/" target="blank" class="btn lineBtn">Line</a>
                    <a href="https://tw.yahoo.com/" target="blank" class="btn fbBtn">Facebook</a>
                    <a href="https://tw.yahoo.com/" target="blank" class="btn igBtn">Instagram</a>
                </div>
            </div>
        </section>
        <!--連絡我們end-->

        <footer class="">
            <h5 class="text-center"><i class="fas fa-map-pin mr-2"></i>Fun Taiwan在地嚮導&copy;</h5>
        </footer>

    </div>
    <!--外部特效檔begin    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/be60f897cf.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <!--外部特效檔end    -->
    <!--自訂特效begin-->
    <?php
    
    if ($iresult)
    {
    echo "<script>$('#customizeModal').modal('show')</script>";
    }
    ?>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 3000
            })


            $(".nav-link").on("click", function() {
                var linkTarget = $(this).attr("href");
                $("html,body").animate({
                    scrollTop: $(linkTarget).offset().top - 60
                }, 800);
            })

            //                 $(".nav-link").on("click", function() {
            //                var linkTarget = $(this).attr("href");
            //                $("html,body").animate({
            //                       scrollTop : $(linkTarget).offset().top - 40
            //                    
            ////                    $("#" + linkTarget).offset().top - 60
            //                    },
            //                    1000, "easeOutBounce");
            //            })

            //        wow特效
            new WOW().init();

            //載入行程介紹xml檔
            $.ajax({
                url: "tripdata.xml",
                type: "get",
                datatype: "xml",
                success: function(data) {
                    var modalNo = 0;
                    var animate = ["swing","wobble","jello","heartBeat","shakeX","bounce","fadeIn"];
                    
                    
                    $(data).find("record").each(function() {
                        modalNo += 1;
                        var animateRandom = animate[Math.floor(Math.random()*7)];
                        let picname = $(this).children("imgname").text();
                        let pictitle = $(this).children("title").text();
                        let picdescription = $(this).children("description").text();
                        let picdetail = $(this).children("tripDetail").text();
                        let tripHtml = "<div class='card wow "+animateRandom+"'><img class='card-img-top' src='images/" + picname + ".jpg' alt='Card image cap'><div class='card-body'><h4 class='card-title'>" + pictitle + "</h4><p class='card-text'>" + picdescription + "</p><a class='btn cardbtn' href='' data-toggle='modal' data-target='#tripModal" + modalNo + "'>詳細行程</a></div></div>";

                        $(".card-columns").append(tripHtml);

                        let modalHtml = "<div class='modal fade' id='tripModal" + modalNo + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable' role='document'><div class='modal-content'><div class='modal-header modalHeader'><h5 class='modal-title d-block' id='exampleModalLabel'>" + pictitle + "</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body d-flex flex-row align-items-center'><div>" + picdetail + "</div><img class='modalPic w-50 ' src='images/" + picname + ".jpg' alt=''></div><div class='modal-footer modalFooter'><button type='button' class='btn btn-secondary' data-dismiss='modal'>關閉</button></div></div></div></div>";

                        $("#trip").after(modalHtml);

                    })
                },
                error: function() {
                    alert("資料讀取失敗");
                }
            })

            //載入旅人評價xml檔
            $.ajax({
                url: "comment.xml",
                type: "get",
                datatype: "xml",
                success: function(data) {
                    var allComment = new Array(10);
                    var randomData = new Array(3);
                    var count = 0;
                    $(data).find("record").each(function() {
                        let iconName = $(this).children("imgname").text();
                        let commentStar = $(this).children("star").text();
                        let comment = $(this).children("comment").text();

                        allComment[count] = "<div class='row align-items-center px-5 justify-content-start'><img class='tripCommentIcon pr-5' src='images/" + iconName + ".png' alt=''><div class='tripComment col'><h4>" + commentStar + "</h4><p>" + comment + "</p></div></div><hr>";
                        count++;

                    })

                    for (var m = 0; m < 3; m++) {
                        randomData[m] = Math.floor(Math.random() * allComment.length);

                        for (var p = 0; p < m; p++) {
                            if (randomData[p] == randomData[m]) {
                                m--;
                                break;
                            }
                        }

                    }

                    for (var m = 0; m < 3; m++) {
                        $(".commentWord").append(allComment[randomData[m]]);
                    }

                    $(".commentBtn").on("click", function() {
                        $(".commentWord").html("");
                        for (var m = 0; m < 10; m++) {
                            $(".commentWord").append(allComment[m]);
                        }
                    })

                },

                error: function() {
                    alert("檔案讀取失敗，請稍候再試");
                }







            })


            let customizeModalHtml = "<div id='customizeModal' class='modal' tabindex='-1'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5 class='modal-title'>**您的需求我們已收到**</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><p>您好，謝謝您的聯絡，您的需求我們已收到。<br>將於3個工作日內與您連絡，祝順心，謝謝。</p></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>關閉</button></div></div></div></div>";

            $(".testBtn").on("click", function() {
                $("#customize").after(customizeModalHtml);
            })

        })

    </script>
    <!--自訂特效end-->
</body>

</html>
