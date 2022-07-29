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
        <h1 class="p-0 m-0 text-white text-center ">Academic Team
        </h1>
    </div>
    <div class="col-12  p-1 p-sm-5">
        <div class="row m-0 p-0 ">
            <div class="col-12 col-sm-12 my-1">
                <a href="<?= site_url('accadamic') ?>" class="btn btn-secondary">Back to All</a>
            </div>
            <nav class="col-sm-4 col-12  ">
                <div class="nav nav-tabs d-flex justify-content-around p-2 border" id="nav-tab" role="tablist">
                    <button class=" col-12 nav-link text-start tab-bar   " id="MUGH-tab" data-bs-toggle="tab" data-bs-target="#MUGH" type="button" role="tab" aria-controls="MUGH" aria-selected="true">
                        <i class="fas fa-angle-right "></i> Faculty of Veterinary Science
                    </button>
                    <button class=" col-12 nav-link text-start tab-bar " id="Climate-tab" data-bs-toggle="tab" data-bs-target="#Climate" type="button" role="tab" aria-controls="Climate" aria-selected="false">
                        <i class="fas fa-angle-right "></i> Faculty of Environment and Resource

                    </button>
                    <button class=" col-12 nav-link text-start tab-bar " id="Global-tab" data-bs-toggle="tab" data-bs-target="#Global" type="button" role="tab" aria-controls="Global" aria-selected="false">
                        <i class="fas fa-angle-right "></i> Faculty of Information and Communication Technology
                    </button>
                    <button class=" col-12 nav-link text-start tab-bar " id="AIHD-tab" data-bs-toggle="tab" data-bs-target="#AIHD" type="button" role="tab" aria-controls="AIHD" aria-selected="false">
                        <i class="fas fa-angle-right "></i> ASEAN Institute for Health Development
                    </button>
                    <button class=" col-12 nav-link text-start tab-bar " id="Science-tab" data-bs-toggle="tab" data-bs-target="#SocialScience1" type="button" role="tab" aria-controls="AIHD" aria-selected="false">
                        <i class="fas fa-angle-right "></i> Faculty of Social Science and Humanities
                    </button>
                    <button class=" col-12 nav-link text-start tab-bar " id="social-tab" data-bs-toggle="tab" data-bs-target="#SocialResearch1" type="button" role="tab" aria-controls="AIHD" aria-selected="false">
                        <i class="fas fa-angle-right "></i> Institute for Population and Social Research
                    </button>

                </div>
            </nav>
            <div class="col-12 col-sm-8">
                <div class="tab-content  " id="nav-tabContent">
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
                    <div class="tab-pane fade" id="SocialScience1" role="tabpanel" aria-labelledby="AIHD-tab">
                        <div class="row m-0 p-0">
                            <div class="col-12 m-0 p-0 mb-1 " id="SocialScience">

                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="SocialResearch1" role="tabpanel" aria-labelledby="AIHD-tab">
                        <div class="row m-0 p-0">
                            <div class="col-12 m-0 p-0 mb-1 " id="SocialResearch">SocialScience

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('.tab-bar').click(function() {
        $(this).children('.fa-angle-right').addClass('arrow');
    })

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
                let SocialScience = ''
                let SocialResearch = ''

                resp.filter((resp) => {

                    var s = resp.position;
                    var gs = resp.group_s;

                    if (s.match(/Faculty of Veterinary Science.*/)) {
                        Mugh += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                            <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                     </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
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
                        // Faculty of Environment and Resource
                    } else if (s.match(/Environmental Resource .*/)) {
                        Climate += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
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
                    } else if (s.match(/Information and Communication.*/)) {
                        Global += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
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
                    } else if (s.match(/Health Development.*/)) {
                        Supportive += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
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

                    } else if (s.match(/Social Science.*/)) {
                        SocialScience += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#SocialScience").html(SocialScience);
                    } else if (s.match(/Social Research.*/)) {
                        SocialResearch += `
                    <div class="row m-0 card-body border mb-2 rounded-3">
                             <div class="col-4 col-sm-4 my-auto p-2 d-flex justify-content-center">
                            <img src="${BASE_URL + resp.img}" class="img_circle ">
                            </div>
                            <div class="col-8 col-sm-8 p-0 m-0 my-auto">
                                <h2 class="card-title m-0 p-0 name fw-bold">${resp.name}</h2>
                                <ul class="card-text m-0 p-0">
                                    <li class="position">${resp.position}</li>
                                </ul>
                                <ul class="email m-0 p-0">
                                    <li>
                                        <a href="#">${resp.email}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                        $("#SocialResearch").html(SocialResearch);
                    }


                })


            }
        })
    })
</script>