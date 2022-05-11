<?php foreach ($barbershops as $barbershop) : ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['name']; ?></p>
            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['address']; ?></p>
            </div>
        </div>
    </div>
    <hr>

<?php endforeach; ?>