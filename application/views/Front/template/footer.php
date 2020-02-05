<script src="<?= base_url() ?>assets/Front/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Front/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/Front/js/all.js"></script>
<script src="<?= base_url() ?>assets/Front/js/script.js"></script>

<!-- formjs -->
<script>
    $(document).ready(function() {
        // LOGIN ajax
        $(document).on('submit', 'form.form-login', function() {
            usernameEmail = $('input.usernameEmail').val()
            password = $('input.password').val()

            $.ajax({
                    url: "<?= base_url('api/user/login'); ?>",
                    method: 'POST',
                    data: {
                        usernameEmail: usernameEmail,
                        password: password
                    },
                })
                .done(function(req) {
                    pesan = req.message
                    if (req.error == true) {
                        notif("div.muncul-pesan", "warning", pesan)
                    } else {
                        $('div.muncul-pesan').html('')
                        user_id = req.data.id
                        role_id = req.data.role_id
                        username = req.data.username
                        window.location = "<?= base_url('auth/session/'); ?>" + role_id + "/" + username + "/" + user_id
                    }
                })
            return false
        })
        // REGISTRASI Ajax
        $(document).on('submit', 'form.form-daftar', function() {
            fullname = $('input.fullname').val()
            username = $('input.username').val()
            email = $('input.email').val()
            password = $('input.regpassword').val()
            verifypassword = $('input.verifypassword').val()
            country = $('select.country').val()

            $.ajax({
                    url: "<?= base_url('api/user/registrasi'); ?>",
                    method: 'POST',
                    data: {
                        username: username,
                        fullname: fullname,
                        password: password,
                        verifypassword: verifypassword,
                        email: email,
                        country: country
                    },
                })
                .done(function(req) {
                    pesan = req.message
                    if (req.error == true) {
                        notif('div.muncul-pesan-daftar', 'warning', pesan)
                    } else {
                        notif('div.muncul-pesan', 'success', pesan)
                        $('div.muncul-pesan-daftar').val('')
                        $('input.username').val('')
                        $('input.fullname').val('')
                        $('input.email').val('')
                        $('input.regpassword').val('')
                        $('input.verifypassword').val('')
                        changeTab('login')
                    }
                })
            return false
        })

        // notifikasi
        function notif(element, type, message) {
            $(element).html('\
				<div class="alert alert-' + type + ' mb-4 mt-0" role="alert">\
			        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>\
			        ' + message + '\
			    </div>\
			    ');
        }
    });
</script>
</body>

</html>