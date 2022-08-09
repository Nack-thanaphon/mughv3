<style>
    li {
        list-style: none;
    }

    .img_circle {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .name {
        font-size: 1.5rem;
        font-weight: 500;
    }

    .position {
        font-size: 1rem;
    }

    .email {
        font-size: 0.9rem;
    }

    @media (max-width:650px) {
        .img_circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .name {
            font-size: 0.9rem;
        }

        .position {
            font-size: 0.8rem;
        }

        .email {
            font-size: 0.8rem;
        }
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
        <h1 class="p-0 m-0 text-white text-center ">Our People</h1>
    </div>
    <div class="col-12 p-1 p-sm-5">
        <nav>
            <div class="nav nav-tabs d-flex justify-content-around " id="nav-tab" role="tablist">
                <button class="col-sm-2 col-12 nav-link  active text-start text-sm-center" id="MUGH-tab" data-bs-toggle="tab" data-bs-target="#MUGH" type="button" role="tab" aria-controls="MUGH" aria-selected="true"><i class="fas fa-angle-down"></i> MUGH Working Group
                </button>
                <button class="col-sm-2 col-12 nav-link text-start text-sm-center" id="Climate-tab" data-bs-toggle="tab" data-bs-target="#Climate" type="button" role="tab" aria-controls="Climate" aria-selected="false"><i class="fas fa-angle-down"></i> Climate Change and Global Public Health
                </button>
                <button class="col-sm-2 col-12 nav-link text-start text-sm-center" id="Global-tab" data-bs-toggle="tab" data-bs-target="#Global" type="button" role="tab" aria-controls="Global" aria-selected="false"><i class="fas fa-angle-down"></i> Global Health and Social Policy for Sustainability
                </button>
                <button class="col-sm-2 col-12 nav-link text-start text-sm-center" id="AIHD-tab" data-bs-toggle="tab" data-bs-target="#AIHD" type="button" role="tab" aria-controls="AIHD" aria-selected="false"><i class="fas fa-angle-down"></i> Secretariat Team
                </button>
                <div class="col-sm-3 col-12 ">
                    <div class="row m-0 p-0">
                        <a href="<?= base_url('accadamic') ?>" class="col-sm-12 col-6 p-2 p-sm-0 ">
                            <div class="btn btn-primary m-1 w-100 text-start text-sm-center"><i class="fas fa-angle-right"></i> All</div>
                        </a>
                        <a href="<?= base_url('accadamic/factury') ?>" class="col-sm-12 col-6 p-2 p-sm-0 ">
                            <div class="btn btn-primary m-1 w-100 text-start text-sm-center"><i class="fas fa-angle-right"></i> FACULTY </div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="tab-content  my-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="MUGH" role="tabpanel" aria-labelledby="MUGH-tab">
                <div class="row m-0 p-0">
                    <div class="col-12 m-0 p-0 mb-1  " id="profile_card">
                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="Climate" role="tabpanel" aria-labelledby="Climate-tab">
                <div class="row m-0 p-0">
                    <div class="col-12 m-0 p-0 mb-1  " id="climate">

                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="Global" role="tabpanel" aria-labelledby="Global-tab">
                <div class="row m-0 p-0">
                    <div class="col-12 m-0 p-0 mb-1 " id="Global">

                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="AIHD" role="tabpanel" aria-labelledby="AIHD-tab">
                <div class="row m-0 p-0">
                    <div class="col-12 m-0 p-0 mb-1 " id="Supportive">

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        var BASE_URL = "<?php echo base_url(); ?>";
        $.ajax({
            type: "get",
            dataType: "JSON",
            url: "<?= base_url('issets/jsondata/officerprofile.json') ?>",
            data: {},
            success: function(data) {
                let resp = data
                let Mugh = ''
                let Global = ''
                let Climate = ''
                let Supportive = ''
                resp.filter((resp) => {

                    var s = resp.group;

                    if (s.match(/MUGH.*/)) {
                        Mugh += `
                        <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.group}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#profile_card").html(Mugh);
                    } else if (s.match(/Climate.*/)) {
                        Climate += `
                        <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.group}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#climate").html(Climate);
                    } else if (s.match(/Global.*/)) {
                        Global += `
                        <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.group}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#Global").html(Global);
                    } else if (s.match(/Secretariat.*/)) {
                        Supportive += `
                        <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.group}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#Supportive").html(Supportive);
                    }

                })


            }
        })
    })
</script>