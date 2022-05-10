<div>
    Welcome <?php echo $ses_data['name']; echo " "; echo $ses_data['surname'];?>
</div>
<button type="submit" class="dugme" id="prati">LOGOUT
</button>
<script>

    $(function () {

        $('#prati').on('click', function (e) {
            e.preventDefault();
            console.log("click")
            $.ajax({
                type: 'post',
                url: '/user_auth/logout',
                dataType: "html",
                success: function (response) {
                    alert(response);
                    window.location = "/login"
                },
                error: function (result) {
                    $('body').html("err");
                },
            });

        });

    });
</script>