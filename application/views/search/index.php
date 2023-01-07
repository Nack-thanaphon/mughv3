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




<div class="container">
    <div class="row m-0 p-0">

        <div class="col-12 p-sm-5 p-0">
            <!-- <div class="row m-0 p-0 d-flex justify-content-between"> -->
            <div class="row m-0 p-0">
                <div class="col-12 col-sm-12 my-1 m-0 p-0">
                    <a href="<?= site_url('/') ?>" class="btn btn-secondary"><i class="fas fa-resultow-left"></i> Back</a>
                </div>
                <div class="col-12 col-sm-12 border shadow-sm">

                    <div class=" p-2  my-1">
                        <h4 class="pb-3">ผลการค้นหาทั้งหมด : <span class="text-primary"><?= $countresult ?></span> รายการ</h4>
                        <div class="row m-0 p-0">
                            <?php
                            $html = '';
                            for ($i = 0; $i < count($result); $i++) {
                                $html .= '<a href="' . $result[$i]['table'] . '" target="blank" class="col-12 card my-2 py-2" >
                             <small class="text-secondary">' . $result[$i]['type'] . '</small>
                             <h4 class="py-3">' . $result[$i]['name'] . '</h4>
                            </a>';
                            }
                            echo $html;
                            ?>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>