<a href="<?= base_url() ?>">
    <img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
</a>

<div class="container">
    <div class="card w-50 border-0 mx-auto text-white rounded-0 width-mobile-forgot-password" style="background-color: #1a2027">
        <div class="card-body">
            <h3 class="text-white text-center">Reset Password</h3>
            <p class="text-secondary text-center px-5">Reset your password by entering your email below. We'll send you an email for reseting your password</p>
            <form action="" method="POST" class="px-5 pb-5 pt-2 form-forgot-password-mobile form-forgot">
                <div class="justify-content-center">
                    <div class="muncul-pesan"></div>
                </div>
                <div class="form-group">
                    <label for="Name">Your Email</label>
                    <input autocomplete="off" type="email" class="form-control bg-dark border-0 text-white forgot forgot-email" id="Name" placeholder="Email here..">
                </div>
                <button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Reset my password</button>
            </form>
        </div>
    </div>
</div>