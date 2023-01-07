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
                <!-- <div class="col-12 col-sm-12 my-1 d-flex justify-content-between">
                    <a href="<?= site_url('/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div> -->
                <div class="col-12 col-sm-3">
                    <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
                    <hr>
                    <div class="py-1">
                        <h6><i class="fas fa-file"></i> News(10)</h6>
                        <h6 class="text-muted"><i class="fas fa-file"></i> Document(3)</h6>
                        <h6 class="text-muted"><i class="fas fa-file"></i> Announce(17)</h6>
                    </div>
                    <hr>
                    <div class="accordion d-sm-block d-none" id="accordionExample">
                    </div>
                </div>

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
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test1')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test2')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test3')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test4')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test5')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
                            </div>
                        </div>
                        <div class=" col-sm-4 col-6 p-0 m-0" onclick="showView('test6')">
                            <div class="card p-2 m-1">
                                Lorem ipsum dolor sit.
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


    $("#closeshowView").click(function() {
        $("#showView").addClass('d-none')
    })

    function showView(text) {
        $("#showView").removeClass("d-none")

        $('#text').text(text);
 
    }
</script>