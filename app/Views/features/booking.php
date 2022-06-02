<div id="container">
    <?php
    // Taken periods
    echo var_dump($barbershop[0]) . "<br>";
    // Supported services
    echo var_dump($barbershop[1]) . "<br>";

    // echo $barbershop[0][0]["hour"] . "<br>";

    // echo date("d/m/y");

    echo $barbershop[0][0]["day"] . "<br>";

    $hour_arr = array();
    // Take input day then display 

    for ($i = 8; $i <= 20; $i++) {
        for ($j = 1; $j <= 2; $j++) {
            if ($j == 1) {
                $hour_arr[] = "$i:00";
            } else {
                $hour_arr[] = "$i:30";
            }
        }
    }

    $skip = FALSE;

    // Here we create table

    for ($i = 0; $i <= count($hour_arr); $i++) {
        for ($j = 0; $j < count($barbershop[0]); $j++) {
            if ($barbershop[0][$j]["hour"] == $hour_arr[$i]) $skip = TRUE;
        }
        if ($skip == TRUE) {
            $skip = FALSE;
            continue;
        }
        // Here we print individual rows
        echo "$hour_arr[$i] <br>";
    }

    ?>
    <form action="">
        <div class="form-group mb-3">
            <input type="text" name="date" id="date" placeholder="<?php echo date("d/m/Y", strtotime('tomorrow')); ?>" value="<?= set_value('date') ?>" class="form-control">
            <input type="hidden" name="id" value="<?php echo $barbershop[0][0]["b_id"]; ?>" />
        </div>
        <button type="submit" class="form__submit_button" id="prati">Submit</button>
    </form>


</div>
<script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/barbershop_getByDate',
                dataType: "html",
                data: $('form').serialize(),
                success: function(response) {
                    document.getElementById('container').innerHTML = response;
                },
                error: function(result) {
                    $('body').html("Error");
                },
            });

        });

    });
</script>