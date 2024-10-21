<link href="<?php echo e(asset('css/otpLogin.css')); ?>" rel="stylesheet">

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <div class="col-md-12" style="background-color: #85929E; padding-bottom:5px; padding-top:5px">
                    <h1 align="center">
                        <img src="<?php echo e(asset('images/p-logo.svg')); ?>">
                    </h1>
                </div>
                <div class="clearfix" style="padding-top:20px;">

                </div>
                <div id="loader" class="loader">
                    <div class="loader-text">

                    </div>
                </div>

                <?php if(session('message')): ?>
                <div id="err-msg" class="alert alert-info justify-content-center text-center" role="alert">
                    <?php echo e(session('message')); ?>

                </div>
                <?php endif; ?>

                <span class="justify-content-center text-center center" style="display:flex;" id="otp-message"></span>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input id="email" name="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required autocomplete="email" autofocus placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email', null)); ?>" autocomplete="">

                        <?php if($errors->has('email')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('email')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <span id="error-message" style="color:red;"></span>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required placeholder="<?php echo e(trans('global.login_password')); ?>">
                        <div class="input-group-append">
                            <button type="button" id="show" class="btn btn-sm btn-secondary px-2" onclick="" value="" title="show/hide password"><i class="fas fa-eye-slash" id="eye"></i></button>
                        </div>

                        <?php if($errors->has('password')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('password')); ?>

                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                <?php echo e(trans('global.remember_me')); ?>

                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary px-4" onclick="lsRememberMe()">
                                <?php echo e(trans('global.login')); ?>

                            </button>&nbsp;
                            <button type="button" id="withOtp" class="btn btn-md btn-info px-2" onclick="changePlaceholder()" value="">Generate OTP</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style type="text/css">
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    var getMail = "<?php echo e(session('email')); ?>";
    $(document).ready(function() {
        $('#password').attr('placeholder', 'Password / OTP');
        if (getMail) {
            $('#email').val(getMail);
        }
    });

    function changePlaceholder(event) {
        var buttonVal = $('#withOtp').text();
        var inputVal = $('#email').val();
        // console.log(inputVal);
        if (inputVal == '') {
            $('#error-message').text('Email cannot be blank').show().fadeOut(3000);
            return false;
        } else {
            getOtp();
        }

    }

    function getOtp() {
        var email = $('#email').val();
        var loader = $('#loader');
        // console.log(email);

        $.ajax({
            url: '/getOtp',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ email: email }), 
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                loader.show();
            },
            success: function(result) {
                 console.log(result);
                if (result.message) {
                    $('#otp-message').html(result.message).addClass('alert alert-info').show().fadeOut(15000);
                }
                $('#withOtp').prop('disabled', false);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            },
            complete: function() {
                loader.hide();

            }
        });
    }

    setTimeout(function() {
        document.getElementById('error-message').style.display = 'none';
        var errorMessage = document.getElementById('err-msg');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);

    $(function() {

        $('#show').click(function() {

            if ($('#eye').hasClass('fa-eye-slash')) {

                $('#eye').removeClass('fa-eye-slash');

                $('#eye').addClass('fa-eye');

                $('#password').attr('type', 'text');

            } else {

                $('#eye').removeClass('fa-eye');

                $('#eye').addClass('fa-eye-slash');

                $('#password').attr('type', 'password');
            }
        });
    });

    const rmCheck = document.getElementById("remember");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const passInput = document.getElementsByName("password")[0];

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.checked = true;
        emailInput.value = localStorage.username;
        passwordInput.value = localStorage.password;
    } else {
        rmCheck.checked = false;
        emailInput.value = "";
        passwordInput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value !== "") {
            localStorage.username = emailInput.value;
            let pass = $('#password').val();

            if (!isNaN(passwordInput.value)) {
                localStorage.password = '';
            } else {
                localStorage.password = passwordInput.value;
            }
            localStorage.checkbox = rmCheck.checked;
        } else {
            localStorage.username = "";
            localStorage.password = "";
            localStorage.checkbox = "";
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Product Margin\pel_am\resources\views/auth/login.blade.php ENDPATH**/ ?>