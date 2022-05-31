    <div class="container text-center">
    <h1>Edit your Barbershop</h1>
</div>
<div class="container-fluid text-center">
    <div class="row">
        <div class="col">
            <h5>Current Services</h5>
            <?php foreach ($barbershop['result3'] as $service): ?>
                <div class="container-fluid service<?php echo $service['id'] ?>">
                    <h6><?php echo $service['name'] ?></h6>
                    Duration of Service: <?php echo $service['duration'] ?> min</br>
                    Price of Service: <?php echo $service['price'] ?> euros
                </div>
                <hr>
            <?php endforeach; ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_serv"
                    id="change_serv">Update Services
            </button>
        </div>
        <div class="col-5">
            <h5>Description</h5>
            <?php if (isset($barbershop['result2'][0]['description'])) {
                echo $barbershop['result2'][0]['description'];
            }
            ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_desc"
                    id="change_desc">Update Description
            </button>
        </div>
        <div class="col">
            <h5>Supported Languages</h5>
            <?php foreach ($barbershop['result4'] as $language): ?>
                <div class="container-fluid service<?php echo $language['id'] ?>">
                    <h6><?php echo $language['language'] ?></h6>
                </div>
                <hr>
            <?php endforeach; ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_lang"
                    id="change_lang">Update Languages
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Current Images</h5>
            <?php foreach ($barbershop['result5'] as $pic): ?>
                <div class="container-fluid img_<?php echo $pic['id'] ?>">
                    <img src="/uploads/<?php echo $pic['name'] ?>" width="300" height="300">
                </div>
                <hr>
            <?php endforeach; ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_img"
                    id="change_img">Update Images
            </button>
        </div>
        <div class="col text-center">
            <h5>Current Address</h5>
            <h6><?php echo $barbershop['result1'][0]['address'] ?></h6>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.125903960276!2d13.729093214953426!3d45.54779273588367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477b6894387da3ef%3A0x57e09b3124f1685b!2sTrg%20Brolo%2C%206000%20Koper!5e0!3m2!1sen!2ssi!4v1653481924385!5m2!1sen!2ssi"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_lang"
                    id="change_lang">Update Address
            </button>
            -
        </div>
    </div>
</div>

<div class="modal fade modal-dialog-scrollable" id="update_serv" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($barbershop["result3"] as $service): ?>
                    <div class="container-fluid service service<?php echo $service["id"] ?>"
                         id="service_<?php echo $service["id"] ?>">
                        <h6><?php echo $service["name"] ?></h6>
                        Duration of Service: <?php echo $service["duration"] ?>min</br>
                        Price of Service: <?php echo $service['price'] ?> euros
                    </div>
                    <div class="forma" id="edit_serv_<?php echo $service["id"] ?>" hidden>
                        <form action="" method="post" id="edit_service_<?php echo $service["id"] ?>">
                            <div class="form-group mb-3">
                                <input type="text" name="name" placeholder="<?php echo $service["name"] ?>"
                                       value="<?= set_value('name') ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" name="duration" placeholder="<?php echo $service["duration"] ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" name="price" placeholder="<?php echo $service['price'] ?>"
                                       class="form-control">
                            </div>
                            <button type="button" class="btn btn-primary" id="edit_service<?php echo $service["id"] ?>">
                                Edit
                            </button>
                        </form>
                    </div>
                    <div class="dropdown options" id="dropdown_options_serv_<?php echo $service["id"] ?>">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">Options
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <button class="dropdown-item edit" id="service_<?php echo $service['id'] ?>">Edit
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item delete"
                                        id="service_<?php echo $service['id'] ?>">Delete
                                </button>
                            </li>
                        </ul>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-secondary addNew" id="addButton_serv">Add New</button>
            </div>
            <div class="alert alert-danger" id="greski_serv" hidden>
            </div>
            <div class="forma text-center" id="updateForm_serv" hidden>
                <form action="" method="post" id="serv">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>"
                               class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="duration" placeholder="Duration" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="price" placeholder="Price" class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary prati" id="prati_serv">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-dialog-scrollable" id="update_desc" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (isset($barbershop['result2'][0]['description'])) {
                    echo $barbershop['result2'][0]['description'];
                }
                ?>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-secondary addNew" id="addButton_desc">Add New</button>
            </div>
            <div class="alert alert-danger" id="greski_desc" hidden>
            </div>
            <div class="forma text-center" id="updateForm_desc" hidden>
                <form action="" method="post" id="desc">
                    <div class="form-group mb-3">
                        <input type="text" name="description" placeholder="Description"
                               value="<?= set_value('description') ?>"
                               class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary prati" id="prati_desc">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-dialog-scrollable" id="update_lang" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Languages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($barbershop["result4"] as $language): ?>
                    <div class="container-fluid language<?php echo $language["id"] ?>"
                         id="language_<?php echo $language["id"] ?>">
                        <h6 class="ime" id="ime_<?php echo $language["id"] ?>"><?php echo $language["language"] ?></h6>
                        <div class="forma" id="edit_lang_<?php echo $language["id"] ?>" hidden>
                            <form action="" method="post" id="edit_language_<?php echo $language["id"] ?>">
                                <div class="form-group mb-3">
                                    <input type="text" name="language" placeholder="<?php echo $language["language"] ?>"
                                           value="<?= set_value('language') ?>"
                                           class="form-control">
                                </div>
                                <button type="button" class="btn btn-primary"
                                        id="edit_language<?php echo $language["id"] ?>">Edit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown options" id="dropdown_options_lang_<?php echo $language["id"] ?>">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">Options
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <button class="dropdown-item edit" id="language_<?php echo $language['id'] ?>">Edit
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item delete"
                                        id="language_<?php echo $language['id'] ?>">Delete
                                </button>
                            </li>
                        </ul>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-secondary addNew" id="addButton_lang">Add New</button>
            </div>
            <div class="alert alert-danger" id="greski_lang" hidden>
            </div>
            <div class="forma" id="updateForm_lang" hidden>
                <form action="" method="post" id="lang">
                    <div class="form-group mb-3">
                        <input type="text" name="language" placeholder="Language" value="<?= set_value('language') ?>"
                               class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary prati" id="prati_lang">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-dialog-scrollable" id="update_img" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($barbershop["result5"] as $pic): ?>
                    <div class="container-fluid img_<?php echo $pic['id'] ?>">
                        <img src="/uploads/<?php echo $pic['name'] ?>" width="300" height="300">
                    </div>
                    <button type="button" class="btn btn-danger delete"
                            id="image_<?php echo $pic['id'] ?>">Delete
                    </button>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-secondary addNew" id="addButton_img">Add New</button>
            </div>
            <div class="alert alert-danger" id="greski_img" hidden>
            </div>
            <div class="forma" id="updateForm_img" hidden>
                <form method="post" id="upload_form" enctype="multipart/form-data">
                    <div class="col-md-7">
                        <div id="divMsg" class="alert alert-success" style="display: none">
                            <span id="msg"></span>
                        </div>
                        <img id="blah" alt="your image"/></br></br>
                        <input type="file" name="file" multiple="true" accept="image/*" id="finput"
                               onchange="readURL(this);"></br></br>
                        <button class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-md-5"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input, id) {
        id = id || '#blah';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $('#upload_form').on('submit', function (e) {
            $('.btn-success').html('sending');
            $('.btn-success').prop('disabled');
            e.preventDefault();
            if ($('#file').val() == '') {
                alert("Please Select the File");
                $('.btn-success').html('submit');
                $('.btn-success').prop('enabled');
                document.getElementById("upload_form").reset();
            } else {
                $.ajax({
                    url: "features/store",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        console.log(res.success);
                        if (res.success == true) {
                            $('#blah').attr('src', '//www.tutsmake.com/ajax-image-upload-with-preview-in-codeigniter/');
                            $('#msg').html(res.msg);
                            $('#divMsg').show();
                            location.reload()
                        } else if (res.success == false) {
                            $('#msg').html(res.msg);
                            $('#divMsg').show();
                        }
                        setTimeout(function () {
                            $('#msg').html('');
                            $('#divMsg').hide();
                        }, 3000);
                        $('.btn-success').html('submit');
                        $('.btn-success').prop('enabled');
                        document.getElementById("upload_form").reset();
                    }
                });
            }
        });
    });
</script>

<script>

    $(".modal").on("hidden.bs.modal", function () {
        const id = this.id;
        const splitid = id.split('_');
        const type = splitid[1];
        $('#greski_' + type).html("");
        document.getElementById('greski_' + type).hidden = true;
        document.getElementById('addButton_' + type).hidden = false;
        document.getElementById('updateForm_' + type).hidden = true;

        for (var i = 0; i < document.getElementsByClassName('forma').length; i++) {
            document.getElementsByClassName('forma')[i].hidden = true;
        }
        for (var i = 0; i < document.getElementsByClassName('dropdown options').length; i++) {
            document.getElementsByClassName('dropdown options')[i].hidden = false;
        }
        for (var i = 0; i < document.getElementsByClassName('ime').length; i++) {
            document.getElementsByClassName('ime')[i].hidden = false;
        }
        for (var i = 0; i < document.getElementsByClassName('service').length; i++) {
            document.getElementsByClassName('service')[i].hidden = false;
        }
    });

    $(document).ready(function () {
        $(function () {
            $('.addNew').on('click', function (e) {
                const id = this.id;
                const splitid = id.split('_');
                const type = splitid[1];
                document.getElementById('addButton_' + type).hidden = true;
                document.getElementById('updateForm_' + type).hidden = false;
            })
        })
    });

    $(document).ready(function () {
        $(function () {
            $('.prati').on('click', function (e) {
                const id = this.id;
                const splitid = id.split('_');
                const type = splitid[1];
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'profile/insert',
                    dataType: "html",
                    data: $('form').serialize() + "&type=" + type,
                    success: function (response) {
                        if (response === "ok") {
                            alert("Added Successfully!");
                            location.reload();
                        } else {
                            document.getElementById("greski_" + type).hidden = false;
                            $('#greski_' + type).html(response);
                        }
                    },
                    error: function (result) {
                        $('body').html("err");
                    },
                });
            });
        })
    });

    $(document).ready(function () {
        $('.delete').on('click', function (e) {
            if (confirm("Are you sure you want to delete?")) {
                const iD = this.id;
                const splitid = iD.split('_');
                const type = splitid[0];
                const id = splitid[1];
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'profile/delete',
                    dataType: "html",
                    data: {
                        type: type,
                        id: id,
                    },
                    success: function (response) {
                        if (response === "ok") {
                            alert("Successfully deleted!");
                            location.reload();
                        } else {
                            alert(response);
                        }
                    },
                    error: function (result) {
                        $('body').html("err");
                    },
                });
            }
        })
    });

    $(document).ready(function () {
        $('.edit').on('click', function () {
            // get data from button edit
            const iD = this.id;
            const splitid = iD.split('_');
            const type = splitid[0];
            const id = splitid[1];

            if (type === "language") {
                document.getElementById('edit_lang_' + id).hidden = false;
                document.getElementById('dropdown_options_lang_' + id).hidden = true;
                document.getElementById('ime_' + id).hidden = true;
            } else if (type === "service") {
                document.getElementById('edit_serv_' + id).hidden = false;
                document.getElementById('dropdown_options_serv_' + id).hidden = true;
                document.getElementById('service_' + id).hidden = true;
            }

            $(document).ready(function () {
                $('#edit_' + type + id).on('click', function () {
                    $.ajax({
                        type: 'post',
                        url: 'profile/edit',
                        dataType: "html",
                        data: $('#edit_' + type + '_' + id).serialize() + "&type=" + type + "&id=" + id,
                        success: function (response) {
                            if (response === "ok") {
                                alert("Successfully edited!");
                                location.reload();
                            } else {
                                alert(response);
                            }
                        },
                        error: function (result) {
                            $('body').html("err");
                        },
                    });
                });
            });

        });
    });

</script>

