<div class="container mt-5" id="appointment__page">
    <div class="row">
        <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
            <div class="col-12">
                <h3 class="fw-normal text-secondary fs-4 mb-4">Book an appointment</h3>
            </div>
            <form action="" id="appointmentForm">
                <div class="row g-3">
                    <div class="col-md-12">
                        <input type="date" class="form-control" placeholder="Enter Date" id="date" name="date" required>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" aria-label="Pick a time" id="izbor" disabled required form="appointmentForm">
                            <option selected>Available hours</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <select class="form-select" id="servis" required form="appointmentForm">
                            <option value="">Please choose service</option>
                            <?php foreach ($barbershop['result3'] as $service) : ?>
                                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div id="info" hidden>
                        <div class="col-md-12">
                            Price of chosen service: <span id="price"></span>
                        </div>
                        <div class="col-md-12">
                            Duration of chosen service: <span id="duration"></span>
                        </div>
                    </div>
                    <input type="text" name="b_id" id="b_id" class="form-control" value="<?php echo $barbershop['result1'][0]['id'] ?>" hidden>
                    <input type="text" name="u_id" id="u_id" class="form-control" value="<?php echo session()->get('id') ?>" hidden>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn black_white_button  float-end">Book Appointment</button>
                        <button type="button" class="btn btn-outline-danger float-end me-2 back">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.back').on('click', function(e) {
            location.href = "javascript:history.back()";
        });
    });

    $(document).ready(function() {
        $('#date').on('change', function(e) {
            let date = new Date($(this).val());
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let day = date.getDate();
            const formatted = `${day}-${month}-${year}`;
            e.preventDefault();
            $.ajax({
                url: 'checkAvailable',
                method: 'POST',
                data: {
                    date: formatted,
                    id: <?php echo $barbershop['result1'][0]['id'] ?>
                },
                success: function(response) {
                    let options = '<option value="">Please choose time</option>';
                    if (response.length > 0) {
                        $('#izbor').removeAttr('disabled');
                        for (let i = 0; i < response.length; i++) {
                            options += `<option value="${response[i]}">${response[i]}</option>`;
                        }
                    } else {
                        options += `<option selected>No available hours</option>`;
                    }
                    $('#izbor').html(options);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#servis').on('change', function(e) {
            let service = $(this).val();
            document.getElementById('info').hidden = false;
            $.ajax({
                url: 'getInfo',
                method: 'POST',
                data: {
                    id: service
                },
                success: function(response) {
                    $('#price').text(response.price + ' eur');
                    $('#duration').text(response.duration + ' min');
                }
            });
        });
    });

    $(document).ready(function(e) {
        $('form').on('submit', function(e) {
            let date = new Date($('#date').val());
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let day = date.getDate();
            const formatted = `${day}-${month}-${year}`;
            const time = $('#izbor').val();
            const service = $('#servis').val();
            const u_id = $('#u_id').val();
            const b_id = $('#b_id').val();
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'book',
                dataType: "html",
                data: {
                    b_id: b_id,
                    u_id: u_id,
                    s_id: service,
                    date: formatted,
                    time: time,
                },
                success: function(response) {
                    if (response === "ok") {
                        alert("Appointment added Successfully!");
                        location.reload();
                    } else {
                        $('body').html("err");
                    }
                },
                error: function(result) {
                    $('body').html("err");
                },
            });
        });
    });
</script>