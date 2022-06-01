<?php $index = 0;
$index2 = 0; ?>
<div class="container-fluid text-center">
    <h1><?php echo $barbershop['result1'][0]['name'] ?></h1>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($barbershop['result5'] as $image): ?>
                        <?php if ($index == 0): ?>
                            <button type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide-to="<?php echo $index ?>" class="active" aria-current="true"></button>
                        <?php else: ?>
                            <button type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide-to="<?php echo $index ?>"></button>
                        <?php endif; ?>
                        <?php $index++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($barbershop['result5'] as $image): ?>
                        <?php if ($index2 == 0): ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/uploads/<?php echo $image['name'] ?>">
                            </div>
                        <?php else: ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/uploads/<?php echo $image['name'] ?>">
                            </div>
                        <?php endif; ?>
                        <?php $index2++ ?>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <h5>Current Services</h5>
            <?php foreach ($barbershop['result3'] as $service): ?>
                <div class="container-fluid service<?php echo $service['id'] ?>">
                    <h6><?php echo $service['name'] ?></h6>
                    Duration of Service: <?php echo $service['duration'] ?> min</br>
                    Price of Service: <?php echo $service['price'] ?> euros
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6">
            <h5>Description</h5>
            <?php if (isset($barbershop['result2'][0]['description'])) {
                echo $barbershop['result2'][0]['description'];
            }
            ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <h5>Supported Languages</h5>
            <?php foreach ($barbershop['result4'] as $language): ?>
                <div class="container-fluid service<?php echo $language['id'] ?>">
                    <h6><?php echo $language['name'] ?></h6>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6">
            <h5>Current Address</h5>
            <h6><?php echo $barbershop['result1'][0]['address'] ?></h6>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.125903960276!2d13.729093214953426!3d45.54779273588367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477b6894387da3ef%3A0x57e09b3124f1685b!2sTrg%20Brolo%2C%206000%20Koper!5e0!3m2!1sen!2ssi!4v1653481924385!5m2!1sen!2ssi"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<!-- Geoloc and additional test -->
<div class="container"></div>
<div class="googlemaps"></div>
<div class="additText"></div>
</div>


