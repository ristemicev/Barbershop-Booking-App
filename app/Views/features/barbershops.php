<div class="container text-center">
    <h1>Barbershops</h1>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card card-sm">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fa fa-magnifying-glass fa-xl"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" id="textarea" type="search"
                           placeholder="Search topics or keywords">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-primary" id="searchbutton" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </div>
    </div>
    <!--end of col-->
</div>

<?php foreach ($barbershops['result1'] as $barbershop) : ?>
    <div class="container text-center">
        <a class="row" href="specific/<?php echo $barbershop['id'] ?>">
            <div class="col-sm ">
                <?php foreach ($barbershops['result2'] as $image) : ?>

                    <?php if ($barbershop['id'] == $image['b_id']) : ?>
                        <img src="/uploads/<?php echo $image['name'] ?>" class="img-fluid" height="200" width="200">
                    <?php else: ?>
                        <img src="/uploads/no_image.png" class="img-fluid" height="200" width="200">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['name']; ?></p>
            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['address']; ?></p>
            </div>
        </a>
    </div>
    <hr>
<?php endforeach; ?>


<script>
    $(document).ready(function () {

        $('#searchbutton').click(function (event, value, caption) {
            var text = $("#textarea").val();
            if (text == '') {
                alert("Please review your search parameters");
            } else {
                $.ajax({
                    url: 'search',
                    type: 'post',
                    dataType: "html",
                    data: {
                        text: text,
                    },
                    success: function (response) {
                        $('body').html(response);
                    },
                    error: function (result) {
                        $('body').html("err");
                    },
                    beforeSend: function (d) {
                        $('body').html("Searching...");
                    }
                });
            }
        })
    });
</script>
