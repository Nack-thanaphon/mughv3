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



<div class="row m-0 p-0">
    <div class="col-12 py-5 bg-primary text-center">
        <h1 class="p-0 m-0 text-white text-center ">News
        </h1>
    </div>
    <div class="col-12 p-sm-5 p-2">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 my-1 d-flex justify-content-between">
                <a href="<?= site_url('education/ourProgram') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                <a class="btn btn-secondary" onclick="searchproduct('all')">ข่าวทั้งหมด</a>
            </div>
            <div class="col-12 col-sm-3">
                <div class="accordion" id="accordionExample">
                </div>
            </div>

            <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                <div class="row m-0 p-0" id="news_list">

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var BASE_URL = "<?= base_url(); ?>"
    $(document).ready(function() {
        var news_list = ''
        $.ajax({
            type: "post",
            url: BASE_URL + "news/get_news",
            dataType: "json",
            success: function(resp) {
                for (let i = 0; i < resp.length; i++) {
                    news_list += `
                    <div class="col-12 col-sm-4 m-0 p-0 mb-1 shadow-sm news_card ${resp[i].create_at}">
                        <div class="card h-100">
                            <img src="https://info-mugh.com/bos/${resp[i].n_image}" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h5 class="special">${resp[i].n_name}</h5>
                                <p class="text-muted">${resp[i].create_at}</p>
                                <a href="<?= site_url('news/singlenews') ?>/${resp[i].n_id}">Readmore..</a>
                            </div>
                        </div>
                    </div>`
                }
                $('#news_list').append(news_list)
            }
        })
        $.ajax({
            type: "post",
            url: BASE_URL + "news/get_news_bymonth",
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
                    var news_manu = ''

                    let datelist = resp[i].month
                    for (mi = 0; mi < datelist.length; mi++) {
                        news_manu += `<li class="list-item">        
                                <a onclick="searchproduct('${datelist[mi].datelist}')">
                                ${datelist[mi].datelist}
                            </a>
                                </li>`
                    }
                    $("#t" + id).html(news_manu)
                }
            }
        })
    })

    function searchproduct(param) {
        console.log(param)
        $(".news_card").attr("style", "display: none !important");
        if (param == 'all') {
            $(".news_card").attr("style", "display: block !important");
        } else {
            $("." + param).attr("style", "display: block !important");
        }
    }
</script>