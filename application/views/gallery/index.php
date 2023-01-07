<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap');

    .special {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    p,
    h5,
    h6,
    a {
        font-family: 'Noto Sans Thai', sans-serif !important;
    }

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }

    .news_img {
        height: 170px !important;
        object-fit: cover;
    }
</style>

<div class="header-cover">
    <div class="centered">
        <h1 class="m-0 p-0">Gallery</h1>
    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>



<div class="container p-0 ">
    <div class="row m-0 p-0">
        <div class="col-12 p-sm-5 p-2">
            <div class="row m-0 p-0 my-2">
                <div class="col-12 col-sm-3">
                    <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
                    <hr class="m-0 mb-2 p-0">
                    <div class="py-1">
                        <h6><i class="fas fa-square-rss"></i> ข่าวประกาศ (10)</h6>
                        <h6 class="text-muted"><i class="fas fa-square-rss"></i> ข่าวกิจกรรม (3)</h6>
                        <h6 class="text-muted"><i class="fas fa-square-rss"></i> ข่าวทั่วไป (17)</h6>
                    </div>
                    <hr class="m-0 mb-2 p-0">
                    <div class="accordion d-sm-block d-none" id="accordionExample">
                    </div>
                </div>

                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="row m-0 p-0" id="event_list">
                        <div class="col-12 text-sm-end text-start m-0 p-0 mb-3">
                            <a type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                            |
                            <a type="button" onclick="searchproduct('all')"> Reset</a>
                            |
                            <small class="text-muted ">gallery (<span class="text-primary">10</span>)</small>
                        </div>
                    </div>
                    <div class="row m-0 p-0" id="gallery_list">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        var BASE_URL = "<?= base_url(); ?>"
        $(document).ready(function() {
            var gallery_list = ''
            $.ajax({
                type: "post",
                url: BASE_URL + "Gallery/get_gallery",
                dataType: "json",
                success: function(resp) {

                    for (let i = 0; i < resp.length; i++) {

                        gallery_list += `

                    <div class="col-12 col-sm-4 m-0 p-0 mb-1 shadow-sm gallery_card ${resp[i].g_date}">
                    <a href="<?= site_url('Gallery/singlegallery') ?>/${resp[i].g_id}" class="text-decoration-none">
                        <div class="card m-1 p-1 ">
                            <img src="https://info-AUN-HPN.com/bos/uploads/${resp[i].g_image}" class="news_img" alt="...">
                            <div class="card-body ">
                                <h6 class="special">${resp[i].g_name}</h6>
                                <p class="text-muted">${resp[i].g_date}</p>
                            </div>
                        </div>
                        </a>
                    </div>`
                    }
                    $('#gallery_list').append(gallery_list)
                }
            })
            $.ajax({
                type: "post",
                url: BASE_URL + "gallery/get_gallery_bymonth",
                dataType: "json",
                success: function(resp) {
                    for (let i = 0; i < resp.length; i++) {
                        var nav_list = ''
                        var id = resp[i].n_id
                        nav_list = `
                    <div class="accordion-item" >
                        <h2 class="accordion-header" id="${resp[i].n_id}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i${resp[i].n_id}" aria-expanded="false"  >
                            ${resp[i].create_at}
                            </button>
                        </h2>
                        <div id="i${resp[i].n_id}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul id="t${id}">

                                </ul>
                            </div>
                        </div>
                    </div> `

                        $('#accordionExample').append(nav_list)
                        var gallery_manu = ''

                        let datelist = resp[i].month
                        for (mi = 0; mi < datelist.length; mi++) {
                            gallery_manu += `<li class="list-item">        
                                <a onclick="searchproduct('${datelist[mi].datelist}')">
                                ${datelist[mi].datelist}
                            </a>
                                </li>`
                        }
                        $("#t" + id).html(gallery_manu)
                    }
                }
            })
        })

        function searchproduct(param) {
            console.log(param)
            $(".gallery_card").attr("style", "display: none !important");
            if (param == 'all') {
                $(".gallery_card").attr("style", "display: block !important");
            } else {
                $("." + param).attr("style", "display: block !important");
            }
        }
    </script>