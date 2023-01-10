<style>
    .slick-track {
        margin-left: 0;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</link>
<div class="header-cover">
    <div class="centered">
        <h1 class="m-0 p-0">Gallery</h1>
    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>

<div class="container p-0 ">


    <div class="row my-3 m-0 p-0">
        <div class="col-12 p-sm-5 p-2">
            <div class="row m-0 p-0">
                <div class="col-12 col-sm-3 m-0 mb-2 ">
                    <?php $this->load->view('layout/leftside', $title); ?>
                </div>
                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="row m-0 p-0">
                        <div class="col-12 col-sm-12 m-0 p-0 text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item text-truncate active"><?= $title ?> ทั้งหมด</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-8 mb-3 d-none" id="imghover">
                            <div class="slider slider-for w-100" id="cover">
                            </div>
                            <div class="slider slider-nav my-2 m-0  w-100">
                                <div class="m-1" id="imgAll">

                                </div>
                            </div>
                        </div>
                        <div class=" col-4 mb-3 d-none alert alert-info" id="showView">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดอัลบั้ม</h5>
                                <a type="button" id="closeshowView">x</a>
                            </div>
                            <div class="row m-0 py-3" id="fileData">

                            </div>
                        </div>

                    </div>
                    <div class="row m-0 p-0" id="downloadData">
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var BASE_URL = "<?= base_url(); ?>"
    var titleData = '';
    var typeData = '';
    var dateData = '';
    var DataAll = []

    getData()

    function getData() {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url(); ?>gallery/getImageData",
            method: "POST",
            data: {
                title: titleData,
                type: typeData,
                month: dateData
            },
            dataType: "JSON",
            success: function(response) {
                $.LoadingOverlay("hide");
                renderData(response)

            }
        })
    };



    function renderData(data) {
        renderObj = ''
        if (data != '') {
            for (let i = 0; i < data.length; i++) {
                DataAll[i] = data[i]

                renderObj +=
                    `<div class=" col-sm-4 col-12 mb-2 p-0 m-0">
                        <div class="card p-2 m-1 h-100">
                            <p class="m-0 p-0 col-12 text-truncate">${data[i].title}</p>
                            <div class="mt-1">
                                <p class="text-muted col-12 text-truncate ">${data[i].detail ?data[i].detail:'ไม่มีข้อมูล'}</p>
                                <small class="text-muted">${data[i].date}</small>
                            </div>
                            <div class="d-flex mt-2">
                                <div type="button" onclick="showView('${i}')" class="card-link text-reset text-decoration-none">รายละเอียด</div>
                            </div>
                        </div>
                </div>`
            }
        } else {
            renderObj = '<p>ไม่พบข้อมูล</p>'
        }

        $("#downloadData").html(renderObj)

    }


    $("#closeshowView").click(function() {
        $("#showView").addClass('d-none')
        $("#imghover").addClass('d-none')
    })



    function showView(i) {
        alert(i)

        html = ''
        html += `<div class="col-12  mb-3 seedoc">
            <p class="m-0 p-0 text-muted">ชื่ออัลบั้ม : </p>
            <h5 class="text-primary">${DataAll[i].title}</h5>
            <p class="m-0 p-0 text-muted">รายละเอียด : </p>
            <h6>${DataAll[i].detail}</h6>
            <small class="m-0 p-0 text-muted">วันที่อัพโหลด : </small>
            <small>${DataAll[i].date}</small>
            `
        $("#showView").removeClass("d-none")
        showImage(i)
        $("#imghover").removeClass('d-none')
        $('#fileData').html(html)

    }


    function showImage(i) {
        alert(i)
        let cover = ""
        let image = ""
        cover = `

                <a data-fslightbox href="<?= renderImg('${DataAll[i].cover}') ?>">
                    <img src="<?= renderImg('${DataAll[i].cover}') ?>" class="rounded " style="width:100%;height:300px;object-fit:cover ;">
                </a>`


        let img = DataAll[i].image

        // for (let x = 0; x < img.length; x++) {
        //     image += `

        //             <img src="<?= renderImg('${img[x]}') ?>" style="width:50px;height:50px;object-fit:cover ;" alt="Product Image">

        //         `
        // }



        $("#cover").html(cover)
        // $("#imgAll").html(image)

    }


    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        autoplay: true,
        slidesToShow: 7,
        slidesToScroll: 1,
    });
</script>