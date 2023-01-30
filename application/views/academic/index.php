<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('<?= base_url('issets/img/headerimg.jpg') ?>');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="text-main text-uppercase">Academic</h3>
                    <p class="text-uppercase">หลักสูตร</p>
                </div>
            </div>
        </div>
    </div>
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
                                    <li class="breadcrumb-item text-truncate active">หลักสูตรทั้งหมด</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card col-12 mb-3 d-none alert alert-info" id="showView">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดหลักสูตร</h5>
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
            url: BASE_URL + "academic/getacademics",
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
                let date = getDateFormats(data[i].updated)
                data2[i] = data[i]

                // ${BASE_URL+"file/"+ data[i].id + "/" +data[i].title}
                renderObj +=
                    `<div  class="col-sm-4 col-12 mb-2 p-0 m-0">
                        <div class="card p-2 m-1 h-100">
                            <small class="m-0 p-0 col-12 text-muted">${data[i].level}</small>
                            <h5 class="m-0 p-0 col-12 text-wrap text-two my-3">${data[i].title}</h5>
                            <div class="mt-1">
                                <small class="text-muted">${date}</small>
                            </div>
                            <div class="d-flex mt-2">
                                <a href="<?= renderImg('${file}') ?>" target="blank" type="button"  class="text-primary">ดาวน์โหลด</a>
                                <span>|</span>
                                <a type="button" href="#showView" onclick="showView('${i}')" class="card-link text-reset text-decoration-none">รายละเอียด</a>
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
        let file = data2[i].file
        let date = getDateFormats(data2[i].updated)
        
        html = ''
        html += `
        <div class="row mb-3">
                <div class="col-12 my-2">
                    <p class="m-0 p-0 text-primary">รหัสและชื่อรายวิชา</p>
                    <h4 class="text-dark text-wrap m-0 p-0">${data2[i].code}</h4>
                </div>
                <div class="col-12 my-2">
                    <p class="m-0 p-0 text-primary">หัวข้อหลักสูตร</p>
                    <h4 class="text-dark text-wrap m-0 p-0">${data2[i].title}</h4>
                </div>
                <div class="col-12 mb-2">
                    <p class="m-0 p-0 text-primary">รายละเอียด</p>
                    <p class="text-dark">${data2[i].detail}</p>
                </div>
                <div class="col-6 mb-2">
                    <p class="m-0 p-0 text-primary">ประเภทของรายวิชา :</p>
                    <p class="text-dark">${data2[i].type}</p>
                </div>
                <div class="col-3 mb-2">
                    <p class="m-0 p-0 text-primary">ระดับ :</p>
                    <p class="text-dark">${data2[i].level}</p>
                </div>
                <div class="col-3 mb-2">
                    <p class="m-0 p-0 text-primary">จำนวนหน่วยกิต :</p>
                    <p class="text-dark">${data2[i].score}</p>
                </div>
                <div class="col-sm-6 col-12 mb-2">
                    <p class="m-0 p-0 text-primary">ผู้จัดทำ :</p>
                    <p class="text-dark">${data2[i].credit}</p>
                </div>
                <div class="col-12 mb-2">
                    <p class="m-0 p-0 text-primary">จุดมุ่งหมาย :</p>
                    <p class="text-dark">${data2[i].objective}</p>
                </div>
                <div class="col-12 mb-2">
                    <p class="m-0 p-0 text-primary">วัตถุประสงค์ :</p>
                    <p class="text-dark">${data2[i].goal}</p>
                </div>
                <div class="col-12 mb-2 m-0">
                <hr>
                    <p class="m-0 p-0 text-primary">เว็บไซต์ : <a  class="text-muted" href="${data2[i].website ? data2[i].website:'ไม่มีข้อมูล'}"> เยี่ยมชม</a></p>
                    <p class="m-0 p-0 text-primary">ลิงค์เอกสาร : <a class="text-muted" href="<?= renderImg('${file}') ?>"> ดาวน์โหลด</a></p>
                <hr>
                </div>
                <div class="col-12 m-0 ">
                    <p class="m-0 p-0 text-primary">วันที่แก้ไขหลักสูตร : <span class="text-dark ">${date}</span></p>
                    
                </div>
            </div>
            `


        $("#showView").removeClass("d-none")
        $('#fileData').html(html)
    }


    function seeFile() {
        $('#showFile').toggleClass('d-none')
        $('.seedoc').toggleClass('col-sm-4')
        $('.seeFile').text() == 'ดูหลักสูตร' ? $('.seeFile').text('ปิด') : $('.seeFile').text('ดูหลักสูตร')
    }
</script>