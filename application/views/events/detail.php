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
    h3,
    h4,
    h5,
    h6,
    small,
    span,
    a {
        font-family: 'Noto Sans Thai', sans-serif !important;
    }

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }

    .MsoNormal {
        margin: 0px !important;
    }
</style>


<div class="col-12 text-center my-auto" id="text-slide">
    <div class="d-flex justify-content-between align-items-center breaking-event">
        <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center   py-2 text-primary px-1 event"><span class="d-flex align-items-center">
                <h4 class="p-0 m-0 border-left">&nbsp;Announcement</h4>
            </span></div>
        <marquee class="event-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
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
                    <a href="<?= site_url('events/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-12 col-sm-12 border shadow-sm">

                    <?php foreach ($event as $row) { ?>
                        <div class="row p-0 m-0 pt-3 pb-2">
                            <small class="m-0 p-0"><?php echo  $row['type'] ?></small>
                            <h1 class="col-12 py-3 p-0 m-0 ">"<?php echo  $row['title'] ?>"</h1>
                            <div class="col-12 m-0  p-0 text-start">
                                <h5 class=""><i class="fas fa-calendar-alt"></i> : <?php echo  $row['date'] ?></h5>
                                <h5 class="col-12"><i class="fas fa-map-marker"></i> <?php echo  $row['address'] ?></h5>
                                <h5 class="text-muted"><i class="fas fa-clock"></i> start: <?php echo  $row['time_start'] ?>
                                    <span> <i class="fas fa-clock"></i> end: <?php echo  $row['time_end'] ?></span>
                                </h5>
                            </div>
                        </div>
                        <div id="share-bar" class="p-0 p-sm-3"></div>
                        <div class="my-4 text-justify mx-auto">
                            <h5>EventDetail :</h5>
                            <p class="m-0"><?php echo  $row['title'] ?></p>
                        </div>

                    <?php } ?>
                </div>

            </div>
        </div>

    </div>
</div>


<script>
    $('#share-bar').share({
        animate: false
    });
</script>