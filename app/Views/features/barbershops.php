<?php var_dump($barbershops); ?>
<div class="container text-center">
    <h1>Barbershops</h1>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card card-sm">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fa fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" id="textarea" type="search"
                           placeholder="Search topics or keywords">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" id="searchbutton" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </div>
    </div>
    <!--end of col-->
</div>

<?php foreach ($barbershops as $barbershop) : ?>
    <a class="container text-center">
        <a class="row" href="specific/<?php echo $barbershop['id']?>">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['name']; ?></p>
            </div>
            <div class="col-sm">
                <p><?php echo $barbershop['address']; ?></p>
            </div>
        </a>
    </a>
    <hr>
<?php endforeach; ?>