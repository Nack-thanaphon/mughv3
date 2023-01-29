<style>
    .process-wrapper {
        margin: auto;
        max-width: 1080px;
    }

    #progress-bar-container {
        position: relative;
        width: 90%;
        margin: auto;
        height: 100px;
        margin-top: 65px;
    }

    .timeline__content {
        border: none !important;
    }

    #progress-bar-container ul {
        display: flex;
        justify-content: space-between;
        padding: 0;
        margin: 0;
        padding-top: 15px;
        z-index: 150;
        position: absolute;
        width: 100%;
        margin-top: -40px
    }

    #progress-bar-container li:before {
        content: " ";
        display: block;
        margin: auto;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: solid 2px #aaa;
        transition: all ease 0.3s;

    }

    #progress-bar-container li.active:before,
    #progress-bar-container li:hover:before {
        border: solid 2px #fff;
        background: #0c56d0;
    }

    #progress-bar-container li {
        list-style: none;
        float: left;
        width: 20%;
        text-align: center;
        color: #aaa;
        text-transform: uppercase;
        font-size: 11px;
        cursor: pointer;
        font-weight: 700;
        transition: all ease 0.2s;
        vertical-align: bottom;
        height: 60px;
        position: relative;
    }

    #progress-bar-container li .step-inner {
        position: absolute;
        width: 100%;
        bottom: 0;
        font-size: 14px;
    }

    #progress-bar-container li.active,
    #progress-bar-container li:hover {
        color: #444;
    }

    #progress-bar-container li:after {
        content: " ";
        display: block;
        width: 6px;
        height: 6px;
        background: #777;
        margin: auto;
        border: solid 7px #fff;
        border-radius: 50%;
        margin-top: 40px;
        box-shadow: 0 2px 13px -1px rgba(0, 0, 0, 0.3);
        transition: all ease 0.2s;

    }

    #progress-bar-container li:hover:after {
        background: #555;
    }

    #progress-bar-container li.active:after {
        background: #0c56d0;
    }

    #progress-bar-container #line {
        width: 80%;
        margin: auto;
        background: #eee;
        height: 6px;
        position: absolute;
        left: 10%;
        top: 48px;
        z-index: 1;
        border-radius: 50px;
        transition: all ease 0.9s;
    }

    #progress-bar-container #line-progress {
        content: " ";
        width: 3%;
        height: 100%;
        background: #0c56d0;
        /* background: linear-gradient(to right, #207893 0%, #2ea3b7 100%);  */
        position: absolute;
        z-index: 2;
        border-radius: 50px;
        transition: all ease 0.9s;
    }

    #progress-content-section {
        width: 90%;
        margin: auto;
        background: #f3f3f3;
        border-radius: 4px;
    }

    #progress-content-section .section-content {
        padding: 30px 40px;
        text-align: center;
    }

    #progress-content-section .section-content h2 {
        font-size: 17px;
        text-transform: uppercase;
        color: #333;
        letter-spacing: 1px;
    }

    #progress-content-section .section-content p {
        font-size: 16px;
        line-height: 1.8em;
        color: #777;
    }

    #progress-content-section .section-content {
        display: none;
        animation: FadeInUp 700ms ease 1;
        animation-fill-mode: forwards;
        transform: translateY(15px);
        opacity: 0;
    }

    #progress-content-section .section-content.active {
        display: block;
    }

    @keyframes FadeInUp {
        0% {
            transform: translateY(15px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }
</style>
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('<?= base_url('issets/img/headerimg.jpg') ?>');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="text-main text-uppercase">About us</h2>
                    <p class="text-uppercase">เกี่ยวกับเรา</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row m-0 p-0">
        <div class="col-12 my-5 h-50 d-sm-none d-block">
            <div class="timeline ">
                <div class="timeline__wrap ">
                    <div class="timeline__items">
                        <div class="timeline__item">
                            <div class="timeline__content">
                                <div class="text-center">
                                    <h1 class="text-primary">2012</h1>
                                    <h6 class="fw-bold">Institute for Population and Social Research</h6>
                                </div>
                                <div class="row m-0 p-0 my-4">

                                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                                        <img src="<?= base_url('issets/img/founder/Picture1.jpg') ?>" class="w-100" alt="">
                                    </div>

                                    <div class="col-12 col-sm-8 m-0 p-0">
                                        <p class="text-center text-primary text-uppercase fw-bold">Prof. Dr. Chuenruetai Kanchanachitra</p>
                                        <br>
                                        <ul>
                                            <li class="list-item">From 2012 to 2016</li>
                                            <li class="list-item">Director of MUGH Group Foundation</li>
                                            <li class="list-item">Institute for Population and Social Research</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline__item ">
                            <div class="timeline__content">
                                <div class="text-center">
                                    <h1 class="text-primary">2016</h1>
                                    <h6 class="fw-bold">Office of The President </h6>
                                </div>
                                <div class="row m-0 p-0 my-4">
                                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                                        <img src="<?= base_url('issets/img/founder/Wiwat.jpg') ?>" class="w-100" alt="">
                                    </div>
                                    <div class="col-12 col-sm-8 m-0 p-0">
                                        <p class="text-center text-primary text-uppercase fw-bold">Dr. Wiwat Rojanapittayakorn, M.D.</p>
                                        <br>
                                        <ul>
                                            <li class="list-items fs-6"> From 2016 to 2020</li>
                                            <li class="list-items fs-6"> Office of The President</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline__item ">
                            <div class="timeline__content">
                                <div class="text-center">
                                    <h1 class="text-primary">2020</h1>
                                    <h6 class="fw-bold">ASEAN Institute for Health Development </h6>
                                </div>
                                <div class="row m-0 p-0 my-4">
                                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                                        <img src="<?= base_url('issets/img/founder/aj.phudit.jpg') ?>" class="w-100" alt="">
                                    </div>
                                    <div class="col-12 col-sm-8 m-0 p-0">
                                        <p class="text-center text-primary text-uppercase fw-bold">Assoc. Prof. Dr. Phudit Tejativaddhana, M.D.</p>
                                        <br>
                                        <ul>
                                            <li class="list-item">Director of the AIHD, Mahidol University is the director of MUGH Group instead </li>
                                            <li class="list-item">From 1 April 2020 until the present</li>
                                            <li class="list-item">ASEAN Institute for Health Development Mahidol University</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="process-wrapper py-5 d-sm-block d-none">
        <div id="progress-bar-container">
            <ul>
                <li class="step step01 active">
                    <div class="step-inner">2012</div>
                </li>

                <li class="step step02">
                    <div class="step-inner">2016</div>
                </li>

                <li class="step step03">
                    <div class="step-inner">2020-Present</div>
                </li>
            </ul>

            <div id="line">
                <div id="line-progress"></div>
            </div>
        </div>

        <div id="progress-content-section">
            <div class="section-content dean1 active">
                <h1>2012</h1>
                <h class="fw-bold text-primary">Institute for Population and Social Research</h>
                <div class="row m-0 p-0 my-4">
                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                        <img src="<?= base_url('issets/img/founder/Picture1.jpg') ?>" class="w-100" alt="">
                    </div>
                    <div class="col-12 col-sm-6 m-0 p-0">
                        <ul class="text-start">
                            <li class="list-item">Director of MUGH Group Foundation </li>
                            <li class="list-item">Prof. Dr. Chuenruetai Kanchanachitra</li>
                            <li class="list-item">From 2012 to 2016</li>
                            <li class="list-item">Institute for Population and Social Research</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="section-content dean2">
                <h1>2016</h1>
                <h4 class="fw-bold text-primary">Office of The President </h4>
                <div class="row m-0 p-0 my-4">
                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                        <img src="<?= base_url('issets/img/founder/Wiwat.jpg') ?>" class="w-100" alt="">
                    </div>
                    <div class="col-12 col-sm-6 m-0 p-0">
                        <ul class="text-start">
                            <li class="list-items fs-6"> Dr. Wiwat Rojanapittayakorn, M.D.,</li>
                            <li class="list-items fs-6"> From 2016 to 2020</li>
                            <li class="list-items fs-6"> Office of The President</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="section-content dean3">
                <h1>2020-Present</h1>
                <h4 class="fw-bold text-primary">ASEAN Institute for Health Development </h4>
                <div class="row m-0 p-0 my-4">
                    <div class="col-4  col-sm-4 m-0 p-0 mx-auto mb-3">
                        <img src="<?= base_url('issets/img/founder/aj.phudit.jpg') ?>" class="w-100" alt="">

                    </div>
                    <div class="col-12 col-sm-6 m-0 p-0">
                        <ul class="text-start">
                            <li class="list-item">Assoc. Prof. Dr. Phudit Tejativaddhana, M.D.
                                Director of the AIHD, Mahidol University is the director of MUGH Group instead </li>
                            <li class="list-item">From 1 April 2020 until the present</li>
                            <li class="list-item">ASEAN Institute for Health Development Mahidol University</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(".step01").click(function() {
        $("#line-progress").css("width", "0%");
        $(".dean1").addClass("active").siblings().removeClass("active");
    });

    $(".step02").click(function() {
        $("#line-progress").css("width", "50%");
        $(".dean2").addClass("active").siblings().removeClass("active");
    });

    $(".step03").click(function() {
        $("#line-progress").css("width", "100%");
        $(".dean3").addClass("active").siblings().removeClass("active");
    });

    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 800,
        mode: 'horizontal',
        visibleItems: 3
    });
</script>