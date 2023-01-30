<style>
    /* .main1 {
        position: absolute;

    /* }  */

    .banner {
        height: auto !important;
        object-fit: cover !important;
    }
</style>

<div class="container p-0 ">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0 ">
            <div id="carouselExampleSlidesOnly main1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner banner">
                    <?php if (!empty($banner)) { ?>
                        <?php foreach ($banner as  $key => $row) : ?>
                            <div type="button" onclick="getBannerDetail(<?= $row['id'] ?>)" class="carousel-item item <?= ($key == 0) ? "active" : "" ?>">
                                <img class="d-block w-100" style="object-fit: cover;" src="<?= renderImg($row['image']) ?>" alt="<?= $row['name'] ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="carousel-item item active">
                            <img class="d-block w-100" style="object-fit: cover; height: 450px;" src="<?= base_url('issets/img/banner/main2.jpg') ?> " alt="MUGH">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-sm-12 m-0  p-0">
            <div class="row m-0 p-0 main ">
                <div class="col-6  m-0 p-0">
                    <a href="about/ourMembers" target="blank" class="m-1 py-4 text-start text-sm-center px-2 card text-decoration-none">
                        <h2 class="m-0 p-0">MEMBERS</h2>
                        <small class="col-12 text-truncate text-muted"><i class="fas fa-circle-info"></i> Mahidol University Global Health</small>
                    </a>
                </div>
                <div class="col-6  m-0 p-0">
                    <a href="https://hurs.mahidol.ac.th/#/" target="blank" class="bg-danger text-start text-sm-center text-decoration-none text-white m-1 py-4 px-2 card">
                        <h2 class="m-0 p-0">HURS</h2>
                        <small class="col-12 text-truncate "><i class="fa-solid fa-building-columns"></i> HEALTHY UNIVERSITY RATING SYSTEM</small>
                    </a>
                </div>
            </div>
        </div> -->
    </div>

    <!-- <div class="row mt-1 m-0 p-0">
        <div class="col-12 col-sm-12 m-0 my-3 p-0">
            <div class="row m-0 p-0">
                <h3>Core Responsibility</h3>
                <div class="col-6  m-0 p-0">
                    <div class="m-1 py-2 p-2 card">
                        เอกสารการประชุม : <span>Lorem, ipsum dolor.</span>
                    </div>
                </div>
                <div class="col-6  m-0 p-0">
                    <div class="m-1 py-2 p-2 card">
                        เอกสารการประชุม : <span>Lorem, ipsum dolor.</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class=" m-0 p-0 my-3 ">
        <div class="row  m-0 p-0">
            <div class="col-12 col-sm-8 m-0 my-3 p-0">
                <div class="row m-0 p-0 ">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('news') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto text-muted "><i class="fa-solid fa-newspaper text-main "></i> ข่าวสาร & บทความ</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>
                    <?php if (!empty($news)) { ?>
                        <?php foreach ($news as $row) : ?>
                            <div class="col-sm-4 col-12  m-0 p-0 mb-2">
                                <div class="m-1  p-2 bg-white shadow-sm rounded-2 ">
                                    <img class="card-img-top" src="<?= renderImg($row->image) ?>" style="width:100%;height: 190px; object-fit:cover;" alt="Card image cap">
                                    <div class=" m-0 p-0 mt-2">
                                        <a href="<?= base_url('posts/' . $row->id . '/' . $row->title) ?>" class="text-decoration-none text-reset text-decoration-none">
                                            <p class="card-title text-truncate text-main"><?= $row->title ?></p>
                                        </a>
                                        <div class="mb-4"></div>
                                        <div class="d-flex justify-content-between text-muted">
                                            <small><?= DateThai($row->date) ?></small>
                                            <small><i class="fa-solid fa-eye"></i> <?= number_format($row->view) ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;  ?>
                    <?php } else { ?>
                        <p class="text-muted">ไม่มีข้อมูล</p>
                    <?php } ?>
                </div>
                <div class="row m-0 mb-1 p-2 ">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('download') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto text-muted "><i class="fas fa-bullhorn text-main "></i> ประกาศ</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>
                    <?php if (!empty($download)) { ?>
                        <div class="col-12 mb-sm-4 mb-1 ">
                            <table class="teble w-100">
                                <tbody>
                                    <?php foreach ($download as $row) : ?>
                                        <tr class="row my-2 bg-white shadow-sm rounded-2 p-2">
                                            <td class="col-sm-9 col-12 mb-1" class="py-2">
                                                <h5 class="m-0 p-0"><i class="fa-regular fa-file-lines"></i> <?= $row['name'] ?></h5>
                                                <small class="text-main"><a class="text-reset text-decoration-none" href="<?= renderImg($row['file']) ?>"><i class="fas fa-circle-down"></i> ดาวน์โหลด</a></small>
                                            </td>
                                            <td class="col-sm-3 col-12 mb-1" class="py-2"><?= $row['date'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- <div class="mt-3">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">ก่อนหน้า</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">ถัดไป</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    <?php } else { ?>
                        <p class="text-muted">ไม่มีข้อมูล</p>
                    <?php } ?>
                </div>

                <div class="row m-0 mb-1 p-2 ">



                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('academic') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto text-muted text-muted"><i class="fas fa-bullhorn text-main "></i> หลักสูตร</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>


                    <?php if (!empty($education)) { ?>
                        <div class="col-12 mb-sm-4 mb-1 ">
                            <table class="teble w-100">
                                <tbody>
                                    <?php foreach ($education as $data) : ?>
                                        <tr class="row my-2 bg-white shadow-sm rounded-2 p-2">
                                            <td class="col-sm-9 col-12 mb-1" class="py-2">
                                                <h5 class="m-0 p-0"><i class="fa-regular fa-file-lines"></i> <?= $data->title ?></h5>
                                                <small class="text-main"><a class="text-reset text-decoration-none" href="<?= renderImg($data->file) ?>"><i class="fas fa-circle-down"></i> ดาวน์โหลด</a></small>
                                            </td>
                                            <td class="col-sm-3 col-12 mb-1" class="py-2"><?= DateThai($data->updated) ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- <div class="mt-3">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">ก่อนหน้า</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">ถัดไป</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    <?php } else { ?>
                        <p class="text-muted">ไม่มีข้อมูล</p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-4 m-0 my-3 p-0">
                <div class="row m-0 p-0 ">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('events') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto text-muted "><i class="fa-sharp fa-solid fa-calendar text-main "></i> กิจกรรม</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>
                    <div class="col-sm-12 col-12    m-0 p-0 ">
                        <div class="m-1  p-0">
                            <div class="row m-0 p-0 ">
                                <?php if (!empty($event)) { ?>
                                    <?php foreach ($event as $row) : ?>
                                        <div class="col-sm-12 col-12  m-0 p-0 mb-2">
                                            <div class="m-1  p-3 bg-white shadow-sm rounded-2 h-100 ">
                                                <div class="d-flex justify-content-between m-0 p-0">
                                                    <div class="mb-1 col-12">
                                                        <!-- <small class="text-muted">เรื่อง</small><br> -->
                                                        <p class="m-0 p-0 text-truncate  text-main"><?= $row['title'] ?></p>
                                                        <small class="text-muted"><i class="fas fa-location-dot text-main"></i> <span><?= $row['address'] ?></span></small><br>
                                                        <small class="text-muted"><i class="fas fa-calendar text-muted"></i> <?= $row['date'] ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <p class="text-muted">ไม่มีข้อมูล</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="bannerDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดแบนเนอร์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bannerData">

            </div>
        </div>
    </div>
</div>




<script>
    var BASE_URL = "<?= base_url(); ?>"

    function getBannerDetail(bid) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: BASE_URL + 'banner/getbannerbyid',
            data: {
                id: bid,
            },
            success: function(data) {

                let img = data.img
                let link = data.link
                let html = ''
                html += `<img class="w-100" src="<?= renderImg('${img}') ?>" alt="">
                    <hr>
                    <p class="m-0 p-0 text-muted">หัวข้อ : <span class="text-dark">${data.title}</span></p>
                    <p class="m-0 p-0 text-muted my-3">รายละเอียด <br>
                        <span class="text-dark">${data.detail}</span>
                    </p>
                    <p class="m-0 p-0 text-muted">ลิงค์ : <span class="text-dark">${link?'<a href="'+link+'" target="blank">ไปที่ลิงค์</a>':'ไม่พบข้อมูล'}</span></p>
                `
                $('#bannerData').html(html)
                $('#bannerDetail').modal('show')
            },
            error: function(err) {
                console.log("fail", err);
            }
        })
    }
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v15.0&appId=419942886747714&autoLogAppEvents=1" nonce="JxS1A5kt"></script>