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

    <div class="col-12 my-2 ">
        <div class=" shadow-sm card p-sm-3 p-1 rounded">
            <div class="row m-0 p-0">

                <div class="col-12 col-sm-8 pb-5">
                    <h1 class="p-0 m-0 ">CONTACT US
                    </h1>
                    <form action="<?= base_url('about/sendmail') ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="title" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <textarea id="summernote" name="detail"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="https://goo.gl/maps/x5Jct3CDSFNxBexr5" target="_blank" rel="noopener noreferrer">
                        <img src="<?= base_url("issets/img/footer/map.png") ?>" class="w-100" alt="">
                    </a>
                    <div class="pt-2">
                        <h5>
                            Mahidol University Global Health Coordination Unit,
                            ASEAN Institute for Health Development, </h5>
                        <small>999 Salaya Phuttamonthon, Nakon Pathom, 73170 Thailand</small>

                        <p class="my-3">
                            mugh_th@mahidol.ac.th
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +662-4419040-3 Ext.58</p>
                        <p><i class="fas fa-print me-3"></i> 02-441-9044</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 180,
            callbacks: {
                onPaste(e) {
                    const bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
    });
</script>