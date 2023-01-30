<style>
    .fc-toolbar,
    .fc-header-toolbar {
        margin: 0px !important;
        padding: 0px !important;
        text-transform: center !important;
    }

    .fc-day-number {
        color: #000000 !important;
    }

    .fc-event,
    .fc-event-dot {
        background-color: #007bff !important;
        border: none !important;
    }

    .fc-center h2 {
        margin: 20px 0px !important;
        font-size: 1.5rem !important;
    }
</style>

<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('<?= base_url('issets/img/headerimg.jpg') ?>');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="text-main text-uppercase">Event</h3>
                    <p class="text-uppercase">กิจกรรมภายใน</p>
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
                    <div class="card p-1 w-100 nowarp m-1" id='calendar'></div>
                </div>
                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="row m-0 p-0">
                        <div class="col-12 col-sm-12 m-0 p-0 text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item text-truncate active">กิจกรรมทั้งหมด</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card col-12 mb-3 d-none alert alert-info" id="showView">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดกิจกรรม</h5>
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

<!-- Modal -->
<div class="modal fade" id="viewsData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="m-0 p-0 text-primary">ข้อมูลกิจกรรม</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="PreviewsData">
                <!-- <div class="col-12" id="PreviewsData">
                </div> -->
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
            url: BASE_URL + "events/geteventsApi",
            method: "post",
            dataType: "json",
            contentType: "application/json",
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'month,list'
                    },
                    events: response,
                    nowIndicator: true,
                    scrollTime: '08:00:00',
                    navLinks: true,
                    selectable: true,
                    dateClick: false,
                    eventClick: function(event) {
                        viewsEvents(event.id)
                    },
                });
            }
        });
        $.ajax({
            url: BASE_URL + "events/getData",
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
                let file = data[i].docfile
                let link = data[i].link
                let date = getDateFormats(data[i].created)

                data2[i] = data[i]


                // ${BASE_URL+"file/"+ data[i].id + "/" +data[i].title}
                renderObj +=
                    `<div class=" col-sm-4 col-12 mb-2 p-0 m-0">
                        <div class="card p-2 m-1 h-100">
                            <p class="m-0 p-0 col-12 text-truncate">${data[i].title}</p>
                            <div class="mt-1">
                                <p class="text-muted col-12 text-truncate ">${data[i].detail ?data[i].detail:'ไม่มีข้อมูล'}</p>
                                <small class="text-muted">${date}</small>
                            </div>
                            <div class="d-flex mt-2">
                                <a href="<?= renderImg('${file}') ?>" target="blank" type="button"  class="text-primary">ดาวน์โหลด</a>
                                <span>|</span>
                                <div type="button" onclick="viewsEvents('${data[i].id}')" class="card-link text-reset text-decoration-none">รายละเอียด</div>
                            </div>
                        </div>
                </div>`
            }
        } else {
            renderObj = '<p>ไม่พบข้อมูล</p>'
        }

        $("#downloadData").html(renderObj)

    }




    function viewsEvents(idd) {
        // $.LoadingOverlay("show");
        $.ajax({
            url: BASE_URL + "events/geteventbyId",
            type: "post",
            dataType: 'json',
            data: {
                id: idd
            },
            success: function(data) {
                let date = getDateFormats(data['created'])
                let file = data.file
                html = ''
                html += `
                 <div class="row mb-3 p-3">
                        <div class="col-12 mb-3 m-0 p-0">
                             <img class="w-100" src="<?= renderImg('${data.img}') ?>" alt="">
                        </div>
                        <div class="col-12 my-2 m-0 p-0">
                             <p class="m-0 p-0 text-primary">ชนิดกิจกรรม :</p>
                             <small class="text-dark text-wrap m-0 p-0">${data['type']}</small>
                            <p class="m-0 p-0 text-primary">หัวข้อกิจกรรม  ${data.ContDateleft > 0 ? '<span class="text-muted">(กำลังมาถึงอีก '+data.ContDateleft+' วัน)</span>':'<span class="text-danger">(หมดอายุ)</span>'}  :</p>
                            <h5 class="text-dark text-wrap m-0 pt-2">${data['title']}</h5>
                        </div>
                        <div class="col-12 m-0 p-0">
                            <p class="m-0 p-0 text-primary">รายละเอียด :</p>
                            <p class="text-dark">${data['detail']?data['detail']:'ไม่มีข้อมูล'}</p>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <p class="m-0 p-0 text-primary">วันเริ่มต้น :</p>
                            <p class="text-dark">${data['start']?data['start']:'ไม่มีข้อมูล'}</p>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <p class="m-0 p-0 text-primary">วันสิ้นสุด :</p>
                            <p class="text-dark">${data['end']?data['end']:'ไม่มีข้อมูล'}</p>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <p class="m-0 p-0 text-primary">เวลาเริ่มต้น :</p>
                            <p class="text-dark">${data['time_start']?'<i class="fa-solid fa-clock"></i> '+data['time_start']+'':'ไม่มีข้อมูล'}</p>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <p class="m-0 p-0 text-primary">เวลาสิ้นสุด :</p>
                            <p class="text-dark">${data['time_end']?'<i class="fa-solid fa-clock"></i> '+data['time_end']+'':'ไม่มีข้อมูล'}</p>
                        </div>
                   
                    <div class="col-12 m-0 p-0">
                        <hr>
                            <p class="m-0  text-muted">ลิงค์เพิ่มเติม : <a href="${data['link']}" target="blank" >เยี่ยมชมเว็บไซต์</a></p>
                            <p class="m-0  text-muted">ลิงค์เอกสาร : <a href="<?= renderImg('${file}') ?>" target="blank">ดาวน์โหลด</a></p>
                        <hr>
                        <div class="mt-2 m-0 p-0">
                            <p class="m-0 p-0 text-primary">วันที่ลงข้อมูล :</p>
                            <p class="text-dark ">${date}</p>
                        </div>
                    </div> 
                   </div>
                   `
                $.LoadingOverlay("hide");
                $('#PreviewsData').html(html)
                $('#viewsData').modal('show')
            }
        })
    }
</script>