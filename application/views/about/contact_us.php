<div class="header-cover">
    <div class="centered">
        <h2 class="m-0 p-0">CONTACT US</h2>
        <small class="text-white">ASEAN University Network - Health Promotion Network</small>
    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>
<div class="container p-0">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0 contact">
            <div class=" m-sm-5 m-0 p-sm-3 m-1 p-2 rounded">
                <div class="row p-0">
                    <div class="col-12 col-sm-8 pb-5 ">
                        <div class="card m-1 p-2">
                            <form action="<?= base_url('/about/sendmail') ?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YourName">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="YourEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputPassword1" placeholder="Your Topics">
                                </div>
                                <div class="mb-3">
                                    <textarea id="summernote" name="detail"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 ">
                        <div class="card m-1 p-2">
                            <a href="https://goo.gl/maps/x5Jct3CDSFNxBexr5" target="_blank" rel="noopener noreferrer">
                                <img src="<?= base_url("issets/img/footer/map.png") ?>" class="w-100" alt="">
                            </a>
                            <div class="pt-2">
                                <b>
                                    ASEAN University Network - Health Promotion Network Coordination Unit,
                                    ASEAN Institute for Health Development, </b>
                                <br>
                                <br>
                                <small class="text-muted">999 Salaya Phuttamonthon, Nakon Pathom, 73170 Thailand</small>

                                <p class="my-3">
                                    <i class="fas fa-envelope me-2"></i> AUN-HPN_th@mahidol.ac.th
                                </p>
                                <p><i class="fas fa-phone me-2"></i> +662-4419040-3 Ext.58</p>
                                <p><i class="fas fa-print me-2"></i> 02-441-9044</p>
                            </div>
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
</div>