<a href="<?= base_url() ?>">
    <img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
</a>

<div class="container-sm">
    <div class="card w-50 border-0 pb-3 mx-auto text-white rounded-0 width-mobile-forgot-password" style="background-color: #1a2027">
        <div class="card-body px-5">
            <div class="mx-auto text-center border-bottom border-dark pb-3 pt-3 text-wrap">
                <h5>Mengubah password untuk
                    <div class="text-primary"><?= $email; ?></div>
                </h5>
            </div>
            <form action="" method="POST" class="px-5 pb-5 pt-4 form-forgot-password-mobile form-change">
                <div class="justify-content-center">
                    <div class="muncul-pesan"></div>
                </div>
                <div class="form-group">
                    <label for="1">Password</label>
                    <input autocomplete="off" type="password" class="form-control bg-dark text-white newpassword" id="1" placeholder="New Password here.." onkeyup="check_password()">
                </div>
                <div class="form-group">
                    <label for="2">Confirm Password</label>
                    <input autocomplete="off" type="password" class="form-control bg-dark text-white newpassword2" id="2" placeholder="Retype your new password" onkeyup="check_password()">
                    <span class="d-block text-right ml-auto mt-0">
                        <small id="pesan"></small>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Create my password</button>
            </form>
        </div>
    </div>
</div>

<script>
    function check_password() {
        var password1 = document.getElementById('1')
        var password2 = document.getElementById('2')
        var valPassword1 = document.getElementById('1').value
        var valPassword2 = document.getElementById('2').value

        if (valPassword1 == "" && valPassword2 == "") {
            password2.classList.remove("border");
            password2.classList.remove("border-danger");
            document.getElementById("pesan").className = "d-none";
        } else {
            // pencocokan inputan password
            if (valPassword1 == valPassword2) {
                password2.classList.remove("border-danger");
                password2.classList.add("border");
                password2.classList.add("border-success");
                document.getElementById("pesan").innerHTML = "Match";
                document.getElementById("pesan").className = "text-success";
            } else if (valPassword1 != valPassword2) {
                password2.classList.remove("border-success");
                password2.classList.add("border");
                password2.classList.add("border-danger");
                document.getElementById("pesan").innerHTML = "Not Match";
                document.getElementById("pesan").className = "text-danger";
            }
        }


    }
</script>