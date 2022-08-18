<div class="col-12 text-center my-auto" id="text-slide">
	<div class="d-flex justify-content-between align-items-center breaking-news">
		<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center   py-2 text-primary px-1 news"><span class="d-flex align-items-center">
				<h4 class="p-0 m-0 border-left">&nbsp;Announcement</h4>
			</span></div>
		<marquee class="news-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
			<a href="https://hurs.mahidol.ac.th/" class="nav-link" target="blank">
				<h3 class="m-0 p-0 text-dark">Welcome to MUGH | Mahidol University Global Health</h3>
			</a>
		</marquee>

	</div>
</div>
<div class="row m-0 p-0 ">
	<div class="col-12 m-0 p-0">
		<div class="row my-0  m-0 p-0  ">
			<div class="col-12 col-sm-12  main_card  d-none d-sm-block ">
				<div class="row m-0 p-0 d-flex justify-content-end">
					<div class="col-12 col-sm-6 p-4 p-sm-5 text-white my-auto ">
						<div class="my-4 text-justify  bg-transparent shadow-sm card p-3 d-sm-none">
							<ul>
								<li>
									In recognition of contribution in healthcare industry as well as its dedication to improving life and bringing better health to the society,
								</li>
								<li>
									Mahidol University Global Health (Mugh) was initiated in October 2012 with the aim to bridge the gap between interdisciplinary faculties and network with other universities and organizations at the national, regional and global levels in the context of global health
								</li>
							</ul>
						</div>
						<br>
						<a href="<?php echo base_url('About/') ?>" class="btn btn-primary text-white d-none d-sm-block col-12" style="margin-top:150px">
							<h3 class="text-uppercase font-weight-bold p-0 m-0">Learn More</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12  d-sm-none d-block m-0 p-0  main_card_mo  ">
				<div class="row m-0 p-0 d-flex justify-content-end ">
					<div class="col-12 col-sm-6 p-1  text-white my-auto  ">
						<div class="my-2 text-justify   p-1 d-sm-none">
							<div class="col-12 text-center text-white">
								<h1 class="text-uppercase fw-bold">mugh</h1>
								<p>Mahidol University Global Health</p>
							</div>
							<ul>
								<li>
									<small>In recognition of contribution in healthcare industry as well as its dedication to improving life and bringing better health to the society,</small>
								</li>
								<li>
									<small>Mahidol University Global Health (Mugh) was initiated in October 2012 with the aim to bridge the gap between interdisciplinary faculties and network with other universities and organizations at the national, regional and global levels in the context of global health</small>
								</li>
							</ul>
						</div>
						<br>
						<a href="<?php echo base_url('About/') ?>" class="btn btn-primary text-white d-sm-none  d-block col-12 col-sm-3">
							<p class="text-uppercase font-weight-bold p-0 m-0">Learn More</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row m-0 py-4">
	<div class="col-12  my-0 p-sm-1 p-0 ">
		<div class="row m-0 p-0">
			<div class="col-12 col-sm-8 m-0 p-sm-1 p-0">
				<div class="row m-0 p-0">
					<div class="col-12 border-left my-3">
						<h2 class="text-uppercase m-0 p-0"> OverView</h2>
					</div>
					<div class="col-12 m-0 p-0 ">

						<video width="100%" loop="true" autoplay="autoplay" controls muted>
							<source src="<?= site_url('issets/video/MUGH.mp4') ?>" type="video/mp4" />
						</video>
					</div>
					<div class="col-12 border-left my-3">
						<h2 class="text-uppercase m-0 p-0"> newsupdate</h2>
					</div>
					<?php foreach ($news as $data) { ?>
						<div class="col-12 col-sm-6  p-2">
							<div class=" w-100 h-100 card m-0 p-0">
								<img src="https://info-mugh.com/bos/<?= $data->n_image ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<span class="badge rounded-pill bg-primary"><?= $data->n_type ?></span>

									<h5 class=" mt-2"><?= $data->n_name ?></h5>
									<a href="<?= site_url('news/singlenews/') ?><?= $data->n_id ?>">Readmore..</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-12 col-sm-4 m-0 p-sm-1 p-0">
				<div class="row m-0 p-0 ">
					<div class="col-12 border-left my-3">
						<h2 class="text-uppercase m-0 p-0"> EVENTS</h2>
					</div>
					<?php foreach ($event as $data) { ?>
						<div class="col-12 p-2 ">
							<div class=" w-100 card shadow-sm ">
								<div class="card-body ">
									<span class="badge rounded-pill bg-warning">Events</span>
									<h6 class="card-title mt-2">"<?= $data['title'] ?>"</h5>
										<small class="p-0 m-0"><i class="fas fa-map-marker text-danger"></i> | <?= $data['address'] ?></small><br>
										<small class="p-0 m-0"><i class="fas fa-calendar-alt"></i> | <?= $data['date'] ?></small>
										<br>
										<a href="<?= site_url('events/singleEvent/') ?><?= $data['id'] ?>">Readmore..</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>