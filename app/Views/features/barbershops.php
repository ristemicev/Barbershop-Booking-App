<div class="container text-center">
    <h1 class="headling_title my-5">Barbershops</h1>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card card-sm">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fa fa-magnifying-glass" style="font-size: 25px;"></i>
                </div>
                <div class="col">
                    <input class="form-control form-control-borderless" id="textarea" type="search" placeholder="Search topics or keywords">
                </div>
                <div class="col-auto">
                    <button class="form__submit_button px-4 py-2" id="searchbutton" type="submit">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($barbershops['result1'] as $barbershop) : ?>
    <div class="container text-center d-flex flex-column justify-content-center align-items-center">
        <a class="d-flex flex-row justify-content-center align-items-center" href="specific/<?php echo $barbershop['id'] ?>">
            <div class="">
                <?php foreach ($barbershops['result2'] as $image) : ?>
                    <?php if ($barbershop['id'] == $image['b_id']) : ?>
                        <img src="/uploads/<?php echo $image['name'] ?>" class="img-fluid" height="160" width="240">
                    <?php else : ?>
                        <img src="/uploads/no_image.png" class="img-fluid" height="160" width="240">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="mx-5">
                <div class="barbershops__brand_name">
                    <p><?php echo $barbershop['name']; ?></p>
                </div>
                <div class="barbershops__address">
                    <p><?php echo $barbershop['address']; ?></p>
                </div>
            </div>
        </a>
        <div class="barbershops__devidier"></div>
    </div>

    <br>

<?php endforeach; ?>


<script>
    $(document).ready(function() {

        $('#searchbutton').click(function(event, value, caption) {
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
                    success: function(response) {
                        $('body').html(response);
                    },
                    error: function(result) {
                        $('body').html("err");
                    },
                    beforeSend: function(d) {
                        $('body').html("Searching...");
                    }
                });
            }
        })
    });
</script>