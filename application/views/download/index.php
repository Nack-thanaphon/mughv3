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
                <?php $this->load->view('layout/leftside'); ?>
                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="row m-0 p-0" id="event_list">
                        <div class="col-12 text-sm-end text-start m-0 p-0 mb-3">
                            <a type="button" onclick="searchproduct('all')">Reset</a>
                            |
                            <small class="text-muted ">Document(<span class="text-primary">10</span>)</small>
                        </div>
                        <div class="card col-12 mb-3 d-none" id="showView">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดเอกสาร</h5>
                                <a type="button" id="closeshowView">x</a>
                            </div>
                            <div class="p-2">
                                <p id="text"></p>
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" >
                            <div class="card p-2 m-1">
                                <small class="text-muted">Lorem ipsum dolor sit.</small>
                                <p class="m-0 p-0 col-12 text-truncate">Lorem, ipsum dolor.Lorem, ipsum dolor.</p>
                                <div class="mt-1">
                                    <small class="text-muted">Lorem ipsum dolor sit.</small><br>
                                    <small class="text-muted">10-dec-2022</small>
                                </div>
                                <div class="d-flex mt-2">
                                    <div type="button" class="card-link">ดาวน์โหลด</div>
                                    <div type="button" onclick="showView('test1')" class="card-link text-reset text-decoration-none">รายละเอียด</div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" >
                            <div class="card p-2 m-1">
                                <small class="text-muted">Lorem ipsum dolor sit.</small>
                                <p class="m-0 p-0 col-12 text-truncate">Lorem, ipsum dolor.Lorem, ipsum dolor.</p>
                                <div class="mt-1">
                                    <small class="text-muted">Lorem ipsum dolor sit.</small><br>
                                    <small class="text-muted">10-dec-2022</small>
                                </div>
                                <div class="d-flex mt-2">
                                    <div type="button" class="card-link">ดาวน์โหลด</div>
                                    <div type="button" onclick="showView('test1')" class="card-link text-reset text-decoration-none">รายละเอียด</div>
                                </div>
                            </div>
                        </div>
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

    $("#closeshowView").click(function() {
        $("#showView").addClass('d-none')
    })

    function showView(data) {
        $("#showView").removeClass("d-none")


    }

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

                console.log(response)
            }
        })
    };


    // function renderData(data) {
    //     renderObj = ''
    //     if (data != '') {
    //         for (let i = 0; i < data.length; i++) {
    //             let img = data[i].image
    //             renderObj +=
    //                 `
    //             <div class="col-6 col-sm-4 m-0 p-0 mb-1  ">
    //                     <a href="${BASE_URL+"posts/"+ data[i].id + "/" +data[i].title}" class=" text-reset text-decoration-none ">
    //                     <div class="shadow-sm m-1">
    //                     <img src="<?= renderImg('${img}') ?>" class="w-100" style="height: 150px;object-fit: cover;" alt="...">
    //                     <div class="m-0 p-2">
    //                     <small class="col-12 text-truncate fw-bold text-muted">${data[i].type}</small>
    //                     <h6 class="col-12 text-truncate fw-bold text-danger">${data[i].title}</h6>
    //                     <!-- <p class="text-muted mb-2"><i class="fas fa-calendar-week"></i> ${data[i].date}</p> -->
    //                     </div>
    //                     </div>
    //                     </a>
    //             </div>
    //                 `
    //         }
    //     } else {
    //         renderObj = '<p>ไม่พบข้อมูล</p>'
    //     }

    //     $("#newsData").html(renderObj)


    // } 
</script>