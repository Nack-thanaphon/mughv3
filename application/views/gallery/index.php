<style>
    .slick-track {
        margin-left: 0;
    }
</style>

</link>
<div class="header-cover">
    <div class="centered">
        <h2 class="m-0 p-0">Gallery</h2>
        <small class="text-white">Mahidol University Global Health</small>
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

                        <div class="col-12 col-sm-12 mb-3 d-none alert alert-info" id="showView">
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัลบั้มรูปภาพ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0" id="imagedatause">

                </div>
            </div>
        </div>
    </div>
</div>


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
        // $.LoadingOverlay("show");

        let RespData = ""
        RespData += `<div class="col-12  mb-3 seedoc">
            <p class="m-0 p-0 text-muted">ชื่ออัลบั้ม : </p>
            <h5 class="text-primary">${DataAll[i].title}</h5>
            <p class="m-0 p-0 text-muted">รายละเอียด : </p>
            <h6>${DataAll[i].detail}</h6>
            <small class="m-0 p-0 text-muted">วันที่อัพโหลด : </small>
            <small>${DataAll[i].date}</small>
            <br><br>
            <a type="button" onclick="showImgAll('${DataAll[i].id}')">ดูภาพทั้งหมด</a>
                `
        $('#fileData').html(RespData)
        $("#showView").removeClass("d-none")
    }

    function showImgAll(i) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url(); ?>gallery/getImageDataById",
            method: "POST",
            data: {
                id: i,
            },
            dataType: "JSON",
            success: function(data) {
                $.LoadingOverlay("hide");
                imgData = ''
                let resp = data.image;
                console.log(resp)
                for (let x = 0; x < resp.length; x++) {
                    imgData +=
                    `
                   <div class="col-6 col-sm-4 mb-2">
                        <a class="fancybox" data-fancybox="gallery" href="<?= renderImg('${resp[x]}') ?>">
                        <img src="<?= renderImg('${resp[x]}') ?>" class="d-block w-100" alt="...">
                        </a>

                    </div>

                    `

                }
                $("#imagedatause").html(imgData)
                $("#exampleModal").modal('show')
            }
        })
    }
</script>