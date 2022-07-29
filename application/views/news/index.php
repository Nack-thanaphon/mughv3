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
        var nav_list = ''

        $.ajax({
            type: "post",
            url: BASE_URL + "news/get_news",
            dataType: "json",
            success: function(resp) {

                for (let i = 0; i < resp.length; i++) {
                    news_list += `
                    <div class="col-12 col-sm-4 m-0 p-0 mb-1 shadow-sm news_card ${resp[i].n_date}">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1658070781334-6aeb1f0a6440?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h5 class="special">${resp[i].n_name}</h5>
                                <p class="text-muted">${resp[i].n_date}</p>
                                <a href="<?= site_url('news/singlenews') ?>">Readmore..</a>
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
                    nav_list += `
                    <div class="accordion-item" >
                        <h2 class="accordion-header" id="${resp[i].n_id}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i${resp[i].n_id}" aria-expanded="false" onclick="open_mounthlist('${resp[i].create_at}','${resp[i].n_id}')" >
                            ${resp[i].create_at}
                            </button>
                        </h2>
                        <div id="i${resp[i].n_id}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul id="t${resp[i].n_id}">

                                </ul>
                            </div>
                        </div>
                    </div> `
                }
                $('#accordionExample').append(nav_list)
            }
        })
    })

    function open_mounthlist(param, id) {
        $.ajax({
            type: "post",
            url: BASE_URL + "news/get_news_bymonthlist/",
            dataType: "json",
            data: {
                m_list: param
            },
            success: function(resp) {

                var news_manu = ''
                console.log('clear html')
                for (let i = 0; i < resp.length; i++) {
                    news_manu
                        += `<li class="list-item">        
                            <a onclick="searchproduct('${resp[i].n_date}')">
                       ${resp[i].n_date}
                       </a>
                    </li>`
                }
                $("#t" + id).html(news_manu)
            }
        })
    }

    function searchproduct(param) {

        $(".news_card").attr("style", "display: none !important");
        if (param == 'all') {
            $(".news_card").attr("style", "display: block !important");
        } else {
            $("." + param).attr("style", "display: block !important");
        }
    }
</script>