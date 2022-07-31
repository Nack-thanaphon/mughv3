<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap');

    .special {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    p,
    h1,
    h2,
    h5,
    h6,
    a {
        font-family: 'Noto Sans Thai', sans-serif !important;
    }

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }
</style>


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



<div class="container">
    <div class="row m-0 p-0">

        <div class="col-12 p-sm-5 p-0">
            <!-- <div class="row m-0 p-0 d-flex justify-content-between"> -->
            <div class="row m-0 p-0">
                <div class="col-12 col-sm-12 my-1 m-0 p-0">
                    <a href="<?= site_url('news/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-12 col-sm-12 border">

                    <?php foreach ($news as $row) { ?>
                        <div class="row p-0 m-0 pt-3 pb-2">
                            <small class="m-0 p-0"><?php echo  $row->n_type ?></small>
                            <h1 class="col-12 py-3 p-0 m-0 "><?php echo  $row->n_name ?></h1>

                            <div class="col-8 m-0  p-0 text-start">
                                <small class="text-muted">Date: 15 December 2020</small>
                            </div>
                            <div class="col-4 m-0  p-0 text-end">
                                <small class="text-muted">View : 1500 </small>
                            </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1658178131374-1ab8acba1a48?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" class="w-100" alt="">
                        <div class="my-3 text-justify">
                            <?php echo  $row->n_detail ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- <div class="col-12 col-sm-3 mt-3 mt-sm-0 border">
            <h3 class="pt-2">Lastest News</h3>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
        </div> -->
            </div>
        </div>

    </div>
</div>