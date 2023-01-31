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
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
                                    <li class="breadcrumb-item text-truncate active">Academic</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card col-12 mb-3 d-none" id="showView">
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
                                <a href="<?= renderImg('${file}') ?>" target="blank" type="button"  class="text-primary">Download</a>
                                <span>|</span>
                                <a type="button" href="#showView" onclick="showView('${i}')" class="card-link text-reset text-decoration-none">Detail</a>
                            </div>
                        </div>
                </div>`
            }
        } else {
            renderObj = '<p>- NO DATA -</p>'
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
        <div class="row mb-3 m-0 p-0">
            <div class="col-12 mb-1">
                <h6 class="title m-0 p-0"> Course Code and Title</h6>
                <small class="s_title text-muted fw-0 m-0 p-0">รหัสและชื่อรายวิชา</small>
                <h5 class="text-primary text-wrap m-0 p-0">${data2[i].code?data2[i].code:'- NO DATA -'}</h5>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Curriculum</p>
                <small class="s_title text-muted fw-0 m-0 p-0">หลักสูตร</small>
                <h4 class="text-primary text-wrap m-0 p-0">${data2[i].title?data2[i].title:'- NO DATA -'}</h4>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Course Description</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">คำอธิบายรายวิชา</small>
                <p class="text-dark">${data2[i].detail?data2[i].detail:'- NO DATA -'}</p>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> College Degree Levels</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">ระดับการศึกษา</small>
                <p class="text-primary">${data2[i].level?data2[i].level:'- NO DATA -'}</p>
                <hr>
            </div>
            <div class="col-6 mb-1">

                <p class="title m-0 p-0"> Course Type</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">ประเภทของรายวิชา</small>
                <p class="text-primary">${data2[i].type}</p>
            </div>
            <div class="col-6 mb-1">
                <p class="title m-0 p-0"> Number of Credits</p>
                <small class="s_title text-muted fw-0 m-0 p-0">จำนวนหน่วยกิต</small>
                <p class="text-primary">${data2[i].score?data2[i].score:'- NO DATA -'}</p>

            </div>
            <hr>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Literacy Type</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">ทักษะการเรียนรู้ที่ได้รับ</small>
                <p class="text-primary">${data2[i].credit?data2[i].credit:'- NO DATA -'}</p>
            </div>
            <hr>
            <div class="col-12 mb-1">

                <p class="title m-0 p-0"> Course Goals</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">จุดมุ่งหมายของรายวิชา</small>
                <p class="text-primary">${data2[i].objective}</p>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0">Course Objectives</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">วัตถุประสงค์ของรายวิชา</small>
                <p class="text-primary">${data2[i].goal?data2[i].goal:'- NO DATA -'}</p>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Curriculum Website</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">เว็บไซต์หลักสูตร</small>
                <br>
                <a href="${data2[i].website?data2[i].website:'- NO DATA -'}">เยี่ยมชม</a></p>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Resource</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">ลิงค์เอกสาร</small>
                <br>
                <a href="<?= renderImg('${file}') ?>">Download</a>
                <hr>
            </div>
            <div class="col-12 mb-1">
                <p class="title m-0 p-0"> Latest Revision of the Course Specifications</p>
                <small class="s_title text-muted fw-0 m-0 p-0 ">วันที่จัดทำหรือปรับปรุงรายละเอียดของรายวิชาครั้งล่าสุด</small>
                <p class="text-primary ">${data2[i].updated}</p>
                <hr>
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