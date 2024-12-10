<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellType</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(#c5c6c7, #2d3e50);
    overflow: hidden;
}

.wrapper {
    position: relative;
    width: 400px;
    height: 500px;
}

.form-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
}

.wrapper.animate-signUp .form-wrapper.sign-in {
    transform: rotate(7deg);
    animation: animateRotate .7s ease-in-out forwards;
    animation-delay: .3s;
}

.wrapper.animate-signIn .form-wrapper.sign-in {
    animation: animateSignIn 1.5s ease-in-out forwards;
}

@keyframes animateSignIn {
    0% {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-500px);
    }

    100% {
        transform: translateX(0) rotate(7deg);
    }
}

.wrapper .form-wrapper.sign-up {
    transform: rotate(7deg);
}

.wrapper.animate-signIn .form-wrapper.sign-up {
    animation: animateRotate .7s ease-in-out forwards;
    animation-delay: .3s;
}

@keyframes animateRotate {
    0% {
        transform: rotate(7deg);
    }

    100% {
        transform: rotate(0);
        z-index: 1;
    }
}

.wrapper.animate-signUp .form-wrapper.sign-up {
    animation: animateSignUp 1.5s ease-in-out forwards;
}

@keyframes animateSignUp {
    0% {
        transform: translateX(0);
        z-index: 1;
    }

    50% {
        transform: translateX(500px);
    }

    100% {
        transform: translateX(0) rotate(7deg);
    }
}

h2 {
    font-size: 30px;
    color: #555;
    text-align: center;
}

.input-group {
    position: relative;
    width: 320px;
    margin: 30px 0;
}

.input-group label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #333;
    padding: 0 5px;
    pointer-events: none;
    transition: .5s;
}

.input-group input {
    width: 100%;
    height: 40px;
    font-size: 16px;
    color: #333;
    padding: 0 10px;
    background: transparent;
    border: 1px solid #333;
    outline: none;
    border-radius: 5px;
}

.input-group input:focus~label,
.input-group input:not(:placeholder-shown)~label {
    top: 0;
    font-size: 12px;
    background: #fff;
}

.forgot-pass {
    margin: -15px 0 15px;
}

.forgot-pass a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
}

.forgot-pass a:hover {
    text-decoration: underline;
}

.btn {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 40px;
    background: linear-gradient(to right, #c5c6c7, #2d3e50);
    box-shadow: 0 2px 10px rgba(0, 0, 0, .4);
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    outline: none;
}

.sign-link {
    font-size: 14px;
    text-align: center;
    margin: 25px 0;
}

.sign-link p {
    color: #333;
}

.sign-link p a {
    color: #2d3e50;
    text-decoration: none;
    font-weight: 600;
}

.sign-link p a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

    <div class="wrapper">
        <div class="form-wrapper sign-up">
            <form action="<?php echo base_url('Auth/signup'); ?>" method="post">
                <h2>SIGN UP</h2>
                <h2>WELL TYPE</h2>
                <div class="input-group">
                    <input type="text" placeholder="" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="" name="email" required>
                    <label for="">Email</label>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="" name="password" required>
                    <label for="">Password</label>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="#" class="signIn-link">Sign In</a></p>
                </div>
            </form>
        </div>

        <div class="form-wrapper sign-in">
            <form action="<?php echo base_url('Auth/signin'); ?>" method="post">
                <h2>SIGN IN</h2>
                <h2>WELL TYPE</h2>
                <div class="input-group">
                    <input type="text" placeholder="" name="username" required>
                    <label for="">Username</label>
                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="" name="password" required>
                    <label for="">Password</label>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="#" class="signUp-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
<script>
const wrapper = document.querySelector('.wrapper');
const signUpLink = document.querySelector('.signUp-link');
const signInLink = document.querySelector('.signIn-link');

signUpLink.addEventListener('click', () => {
    wrapper.classList.add('animate-signIn');
    wrapper.classList.remove('animate-signUp');
});

signInLink.addEventListener('click', () => {
    wrapper.classList.add('animate-signUp');
    wrapper.classList.remove('animate-signIn');
});
window.onload = () => {
    const flashSignup = "<?php echo $this->session->flashdata('signup_error') ? 'true' : 'false'; ?>";
    const flashSignin = "<?php echo $this->session->flashdata('signin_error') ? 'true' : 'false'; ?>";

    if (flashSignup === 'true') {
        // Jika ada flash data signup error, tampilkan form signup
        wrapper.classList.add('animate-signIn');
        wrapper.classList.remove('animate-signUp');
    } else if (flashSignin === 'true') {
        // Jika ada flash data signin error, tampilkan form signin
        wrapper.classList.add('animate-signUp');
        wrapper.classList.remove('animate-signIn');
    } else {
        // Default ke form signin
        wrapper.classList.add('animate-signUp');
        wrapper.classList.remove('animate-signIn');
    }
};

</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<?php if($this->session->flashdata("signup_error")): ?>
    <script>
        swal("gagal!", "<?php echo $this->session->flashdata("signup_error");?>", "error");
    </script>
<?php endif ?>

<?php if($this->session->flashdata("signup_succes")): ?>
    <script>
        swal("Sukses!", "<?php echo $this->session->flashdata("signup_succes");?>", "success");
    </script>
<?php endif ?> 

<?php if($this->session->flashdata("signin_error")): ?>
    <script>
        swal("gagal!", "<?php echo $this->session->flashdata("signin_error");?>", "error");
    </script>
<?php endif ?>

<?php if($this->session->flashdata("pesan_sukses")): ?>
    <script>
        swal("Sukses!", "<?php echo $this->session->flashdata("pesan_sukses");?>", "success");
    </script>
<?php endif ?>  

<?php if($this->session->flashdata("pesan_gagal")): ?>
    <script>
        swal("gagal!", "<?php echo $this->session->flashdata("pesan_gagal");?>", "error");
    </script>
<?php endif ?>
</body>

</html>