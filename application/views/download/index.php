<div class="header-cover">
    <div class="centered">
        <h1 class="m-0 p-0">Download</h1>
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
                                    <li class="breadcrumb-item text-truncate active">เอกสารที่เผยแผ่ทั้งหมด</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card col-12 mb-3 d-none alert alert-info" id="showView">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดเอกสาร</h5>
                                <a type="button" id="closeshowView">x</a>
                            </div>
                            <div class="row m-0 py-3" id="fileData">

                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="row m-0 p-0" id="downloadData">
                    </div>

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

    getData()

    function getData() {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url(); ?>download/getdownload",
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
    let data2 = []

    function renderData(data) {

        renderObj = ''
        if (data != '') {
            for (let i = 0; i < data.length; i++) {
                let file = data[i].file
                let link = data[i].link
                data2[i] = data[i]

                // ${BASE_URL+"file/"+ data[i].id + "/" +data[i].title}
                renderObj +=
                    `<div class=" col-sm-4 col-12 mb-2 p-0 m-0">
                        <div class="card p-2 m-1 h-100">
                            <small class="text-muted">${data[i].g_name}</small>
                            <p class="m-0 p-0 col-12 text-truncate">${data[i].name}</p>
                            <div class="mt-1">
                                <p class="text-muted col-12 text-truncate ">${data[i].detail ?data[i].detail:'ไม่มีข้อมูล'}</p>
                                <small class="text-muted">${data[i].createdat}</small>
                            </div>
                            <div class="d-flex mt-2">
                                <a href="<?= renderImg('${file}') ?>" target="blank" type="button"  class="text-primary">ดาวน์โหลด</a>
                                <span>|</span>
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
    })



    function showView(i) {
        html = ''
        html += `<div class="col-12  mb-3 seedoc">
            <p class="m-0 p-0 text-muted">ชื่อเอกสาร : </p>
            <h5 class="text-primary">${data2[i].name}</h5>
            <p class="m-0 p-0 text-muted">รายละเอียด : </p>
            <h6>${data2[i].detail}</h6>
            <small class="m-0 p-0 text-muted">วันที่อัพโหลด : </small>
            <small>${data2[i].createdat}</small> <br>
            <small>ชนิดเอกสาร : ${data2[i].g_name}</small>
            <div class="d-flex">
            <a href="${data2[i].link}" target="blank" class="text-decoration-none">ลิงค์รายละเอียดเอกสาร</a>
            <span>|</span>
            <div type="button" onclick="seeFile()" class="text-decoration-none seeFile">ดูเอกสาร</div>
            </div>
            </div>
            <div class="col-12 col-sm-8 d-none" id="showFile">
            <object data="<?= renderImg('${data2[i].file}') ?>" class="w-100" style="height: 100vh!important;" type="application/pdf"></object>
            </div>
            `

        $("#showView").removeClass("d-none")
        $('#fileData').html(html)
    }


    function seeFile() {
        $('#showFile').toggleClass('d-none')
        $('.seedoc').toggleClass('col-sm-4')
        $('.seeFile').text() == 'ดูเอกสาร' ? $('.seeFile').text('ปิด') : $('.seeFile').text('ดูเอกสาร')
    }
</script>