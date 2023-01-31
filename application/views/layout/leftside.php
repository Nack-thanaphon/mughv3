<div class="d-block d-sm-none  text-start my-4">
    <div type="button" class="text-main" id="showsear"><span><i class="fa-solid fa-magnifying-glass"></i></span> Click For Open Search Menu</div>
</div>
<div class="py-3  m-0  " id="search">
    <small class="text-muted "><i class="fa-solid fa-filter"></i> Search</small>
    <hr class="m-0 mb-2 p-0">
    <div class="mb-2">
        <small class="text-muted ">Search <?= $title ?></small>
        <input type="text" id="titleData" class="form-control" placeholder="Search <?= $title ?>">
    </div>
    <?php if ($type != '') { ?>
        <small class="text-muted ">Type <?= $title ?></small>
        <select id="typeData" class="form-control mb-2">
            <option selected="selected" value="" disabled>ChooseType<?= $title ?></option>
            <?php foreach ($type as $key => $row) { ?>
                <option class="form-control" value="<?= $row['typeId'] ?>"><i class="fas fa-square-rss"></i> <?= $row['type'] ?></option>
            <?php } ?>
        </select>
    <?php } ?>
    <?php if ($date != '') { ?>
        <small class="text-muted "><?= $title ?> ByMonth</small>
        <select id="dateData" class="form-control mb-2">
            <option selected="selected" value=""><i class="fas fa-calendar-days"></i>ChooseByMonth</option>
            <?php foreach ($date as $key => $data) { ?>
                <option class="form-control" value="<?= $data['month'] ?>"><i class="fas fa-square-rss"></i> <?= $data['month'] ?></option>
            <?php } ?>
        </select>
    <?php } ?>
    <div class="btn-group w-100 mt-3" role="group" aria-label="Basic example">
        <button type="button" id="submit" class="btn btn bg-main ">Search</button>
        <button type="button" id="reset" class="btn btn-tranparent">Reset</button>
    </div>
</div>

<script>
    $("#submit").click(function() {
        titleData = $("#titleData").val()
        typeData = $("#typeData").val()
        dateData = $("#dateData").val()
        getData()
    })

    $("#reset").click(function() {
        titleData = ''
        typeData = ''
        dateData = ''
        $("#titleData").val('')
        $("#typeData").val('')
        $("#dateData").val('')
        getData()
    })

    $('#showsear').click(function() {
        $('#search').toggleClass("d-none");
        $('#calendar').toggleClass("d-none");
    })
</script>