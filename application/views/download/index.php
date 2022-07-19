<div class="col-12 text-center my-auto" id="text-slide">
    <div class="d-flex justify-content-between align-items-center breaking-news">
        <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center   py-2 text-primary px-1 news"><span class="d-flex align-items-center">
                <h4 class="p-0 m-0 border-left">&nbsp;Announcement</h4>
            </span></div>
        <marquee class="news-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <a href="https://hurs.mahidol.ac.th" class="nav-link" target="blank">
                <h3 class="m-0 p-0 text-dark">Welcome to MUGH | Mahidol University Global Health</h3>
            </a>
        </marquee>

    </div>
</div>



<div class="row m-0 p-0">
    <div class="col-12 py-5 bg-primary text-center">
        <h1 class="p-0 m-0 text-white text-center ">Resource
        </h1>
    </div>
    <div class="col-12 p-sm-5 p-2">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 my-1">
                <a href="<?= site_url('education/ourProgram') ?>" class="btn btn-secondary"><i class="fas fa-bookmark"></i> Global Health Program</a>
            </div>
            <div class="col-12 col-sm-3">
                <div class="position-sticky  mb-1">
                    <div class="text-black rounded">
                        <div class="bg-white  py-3 text-white ">
                            <div class="nav flex-column nav-pills me-3 text-dark" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link text-uppercase active" type="button" id="faculty1-tab" data-bs-toggle="pill" data-bs-target="#faculty1" type="button" role="tab" aria-controls="faculty1" aria-selected="true">
                                    HURS Manual (2021)
                                </a>
                                <a class="nav-link text-uppercase" type="button" id="faculty2-tab" data-bs-toggle="pill" data-bs-target="#faculty2" role="tab" aria-controls="faculty2" aria-selected="false">
                                    Journal of Public Health and Development Vol. 20 AIHD
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-9 tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active py-3" id="faculty1" role="tabpanel" aria-labelledby="faculty1-tab">
                    <a href="<?= base_url('issets/pdf/1.pdf') ?>" class="btn btn-success d-block d-sm-none" target="_blank" rel="noopener noreferrer">Download (HURS Manual (2021))</a>
                    <object data="<?= base_url('issets/pdf/1.pdf') ?>" class=" d-none d-sm-block" type="application/pdf" style="min-height:100vh;width:100%">
                    </object>
                </div>
                <div class="tab-pane fade  py-3" id="faculty2" role="tabpanel" aria-labelledby="faculty2-tab">
                    <a href="<?= base_url('issets/pdf/1.pdf') ?>" class="btn btn-success d-block d-sm-none" target="_blank" rel="noopener noreferrer">Download (Aihd Vol.20)</a>
                    <object data="<?= base_url('issets/pdf/1.pdf') ?>" class=" d-none d-sm-block" type="application/pdf" style="min-height:100vh;width:100%">
                    </object>
                </div>

            </div>
        </div>
    </div>

</div>