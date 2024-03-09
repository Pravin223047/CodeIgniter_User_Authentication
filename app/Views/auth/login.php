<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>

    <title>User Authentication</title>
</head>
<style>
    /*********  TOAST NOTIFICATION ************/
    #toast1::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        background: red;
        animation: anim 3.8s linear forwards;
    }

    #toast2::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        background: green;
        animation: anim 3.8s linear forwards;
    }

    #toast3::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        background: orangered;
        animation: anim 3.8s linear forwards;
    }

    @keyframes anim {
        100% {
            width: 0;
        }
    }

    /*Responsive*/

    #toastBox {
        position: fixed;
        width: 100%;
        justify-self: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        overflow: hidden;
        z-index: 1000;
    }

    #toast1 {
        width: 400px;
        line-height: 1.5;
        height: 80px;
        padding: 10px;
        background: #ffcece;
        font-weight: 500;
        font-size: var(--h4-font-size);
        margin: 15px 0;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        display: flex;
        color: red;
        align-items: center;
        justify-content: center;
        border: 1px solid red;
        position: relative;
        transform: translateY(-100%);
        animation: moveleft 0.6s linear forwards;
        z-index: 1000;
    }

    #toast2 {
        width: 400px;
        height: 80px;
        padding: 10px;
        line-height: 1.5;
        background: #d0ffd1;
        font-weight: 500;
        font-size: var(--large-font-size);
        margin: 15px 0;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        display: flex;
        color: green;
        align-items: center;
        justify-content: center;
        border: 1px solid green;
        position: relative;
        transform: translateY(-100%);
        animation: moveleft 0.6s linear forwards;
        z-index: 1000;
    }

    #toast3 {
        width: 400px;
        height: 80px;
        padding: 10px;
        line-height: 1.5;
        background: rgb(255, 219, 201);
        font-weight: 500;
        font-size: var(--h4-font-size);
        margin: 15px 0;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        display: flex;
        color: orangered;
        align-items: center;
        justify-content: center;
        border: 1px solid orange;
        position: relative;
        transform: translateY(-100%);
        animation: moveleft 0.6s linear forwards;
        z-index: 1000;
    }

    .errormark {
        margin: 0 15px;
        font-size: 25px;
    }

    .correctmark {
        margin: 0 15px;
        font-size: 25px;
    }

    .invalidmark {
        margin: 0 15px;
        font-size: 25px;
    }

    @keyframes moveleft {
        100% {
            transform: translateY(0);
        }
    }

    .fields {
        margin-top: 0;
        display: flex;
        align-items: center;
        border: 2px solid rgb(255, 0, 0);
        box-shadow: none;
        background: transparent;
        background-color: rgb(255, 223, 223);
    }

    .remembervalidation {
        border: 2px solid orangered;
        background-color: rgb(255, 219, 201);
    }

    .input-field input {
        height: 2.5rem;
    }

    .btn5 {
        width: 50%;
    }

    .opt {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 20px;
    }

    .fg {
        border: 2px solid black;
        font-weight: 500;
        background: #f0f0f0;
        color: black;
        height: 3rem;
        width: 50%;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 2px 2px 5px gray;
    }

    .pass {
        /* border: 1px solid black; */
        padding: 5px;
        margin: 0 5px;
        border-radius: 5px;
    }

    #checkbox {
        padding: 5px;
        margin: 0 5px;
        border-radius: 5px;
    }

    input[type="checkbox"] {
        accent-color: darkblue;
    }

    .opt input {
        width: 20px;
        height: 20px;
    }

    .pass:hover {
        color: #000 !important;
        background: whitesmoke;
    }

    #username__error,
    #pass__error {
        display: none;
    }

    #username1__error,
    #email1__error,
    #pass1__error {
        display: none;
    }

    .fields i {
        color: rgb(255, 0, 0);
        border-radius: 50%;
        height: 30px;
        max-width: 30px;
        margin: 0 20px;
        padding: 3px;
        padding-top: 5px;
        transform: scale(1.5);
    }

    .fields p {
        color: red;
        font-size: medium;
        font-weight: 500;
    }

    .fields i {
        color: rgb(255, 0, 0);
        border-radius: 50%;
        height: 30px;
        max-width: 30px;
        margin: 0 20px;
        padding: 3px;
        padding-top: 5px;
        transform: scale(1.5);
    }

    .fields p {
        color: red;
        font-size: medium;
        font-weight: 500;
    }

    .remembervalidation p {
        color: orangered !important;
        font-size: var(--large-font-size) !important;
    }

    .remembervalidation i {
        color: orangered !important;
    }

    .eye {
        width: 1.6rem;
        height: 1.4rem;
        margin: 10px;
    }

    @media (max-width: 1700px) {
        .main .login-register {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    @media (max-width: 1600px) {
        .opt {
            display: block;
            align-items: center;
            width: 100%;
        }

        .fg {
            border: 1px solid black;
            height: 3rem;
            width: 100%;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 2px 2px 5px gray;
        }
    }

    @media (max-width: 1200px) {
        .fields p {
            font-size: small;
            font-weight: 500;
        }
    }

    @media (max-width: 992px) {
        .fields p {
            font-size: smaller;
            padding: 5px;
            font-weight: 500;
        }

        .fields {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fields i {
            display: none;
        }
    }

    @media (max-width: 414px) {

        #toast1,
        #toast2,
        #toast3 {
            width: 365px;
        }

        .fg {
            font-size: var(--h4-font-size);
        }
    }

    @media (max-width: 387px) {
        .fg {
            font-size: 1rem;
        }
    }

    @media (max-width: 367px) {
        .fields p {
            font-size: 12px;
            font-weight: 300;
        }

        #toast1,
        #toast2,
        #toast3 {
            width: 320px;
        }

        .fg {
            font-size: var(--small-font-size);
        }
    }

    @media (max-width: 355px) {
        .fields p {
            font-size: 11px;
        }
    }

    @media (max-width: 332px) {
        .fields p {
            font-size: 10px;
        }
    }

    @media (max-width: 286px) {

        #toast1,
        #toast2,
        #toast3 {
            width: 280px;
        }

        .fg {
            font-size: var(--small-font-size);
        }
    }
</style>


<body>
    <?php if (session()->has('success')): ?>
        <div id="toastBox">
            <div class="toast2" id="toast2">
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php elseif (session()->has('fail')): ?>
        <div id="toastBox">
            <div class="toast1" id="toast1">
                <?= session()->getFlashdata('fail'); ?>
            </div>
        </div>
    <?php elseif (session()->has('invalid')): ?>
        <div id="toastBox">
            <div class="toast3" id="toast3">
                <?= session()->getFlashdata('invalid'); ?>
            </div>
        </div>
    <?php endif ?>

    <script>
        <?php if (session()->has('fail')): ?>

            function showToast(message) {
                let toast1 = document.getElementById("toast1");
                toast1.innerHTML = message;

                setTimeout(() => {
                    toast1.innerHTML = "";
                }, 6000);
            }
        <?php elseif (session()->has('success')): ?>

            function showToast(message) {
                let toast2 = document.getElementById("toast2");
                toast2.innerHTML = message;

                setTimeout(() => {
                    toast2.innerHTML = "";
                }, 6000);
            }
        <?php elseif (session()->has('invalid')): ?>

            function showToast(message) {
                let toast3 = document.getElementById("toast3");
                toast3.innerHTML = message;

                setTimeout(() => {
                    toast3.innerHTML = "";
                }, 6000);
            }
        <?php endif; ?>

        let toastBox = document.getElementById("toastBox");

        let refresh = 0;

        document.addEventListener("DOMContentLoaded", function () {
            const toastElement = document.querySelector("#toast1");
            const toast1Element = document.querySelector("#toast2");
            const toast2Element = document.querySelector("#toast3");

            setTimeout(() => {
                if (toastElement) {
                    toastElement.remove();
                    refresh = 1;
                }
                if (toast1Element) {
                    toast1Element.remove();
                    refresh = 1;
                }
                if (toast2Element) {
                    toast2Element.remove();
                    refresh = 1;
                }
            }, 4000);
        });
    </script>


    <!--=============== HEADER ===============-->

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== LOGIN-REGISTER ===============-->
        <section class="login-register section--lg container">
            <div class="container1">
                <div class="signin-signup">
                    <form action="<?= base_url('auth/check'); ?>" method="post" class="sign-in-form form1" name="form"
                        onsubmit="return validation()">
                        <?= csrf_field(); ?>
                        <h2 class="title">Login</h2>
                        <div class="input-field" name="username" id="username">
                            <i class="fi fi-rs-user"></i>
                            <input type="text" placeholder="Email" name="email" value="<?= set_value('email'); ?>" />
                        </div>
                        <div class="input-field fields" id="username__error">
                            <i class="fi fi-rs-exclamation"></i>
                            <p>EMAIL FIELD CANNOT BE EMPTY!!!</p>
                        </div>
                        <div class="input-field" name="password" id="password">
                            <i class="fi fi-rs-lock"></i>
                            <input type="password" placeholder="Password" name="password"
                                value="<?= set_value('password'); ?>" />
                        </div>
                        <div class="input-field fields" id="pass__error">
                            <i class="fi fi-rs-exclamation"></i>
                            <p>PASSWORD FIELD CANNOT BE EMPTY!!!</p>
                        </div>
                        <input type="submit" value="Login" class="btn btn1" />
                        <p class="account-text">
                            Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a>
                        </p>
                    </form>

                    <form action="<?= base_url('auth/login'); ?>" method="post" name="form1" id="form1"
                        class="sign-up-form form1" onsubmit="return validation1()">
                        <?= csrf_field(); ?>
                        <h2 class="title">Register</h2>
                        <div class="input-field" name="username1" id="username1">
                            <i class="fi fi-rs-user"></i>
                            <input type="text" name="name" placeholder="Username" value="<?= set_value('name'); ?>" />
                        </div>
                        <div class="input-field fields" id="username1__error">
                            <i class="fi fi-rs-exclamation"></i>
                            <p>USERNAME FIELD CANNOT BE EMPTY!!!</p>
                        </div>
                        <div class="input-field" name="email1" id="email1">
                            <i class="fi fi-rs-envelope"></i>
                            <input type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                        </div>
                        <div class="input-field fields" id="email1__error">
                            <i class="fi fi-rs-exclamation"></i>
                            <p>EMAIL FIELD CANNOT BE EMPTY!!!</p>
                        </div>
                        <div class="input-field" name="password1" id="password1">
                            <i class="fi fi-rs-lock"></i>
                            <input type="password" name="password" placeholder="Password"
                                value="<?= set_value('password'); ?>" />
                        </div>
                        <div class="input-field fields" id="pass1__error">
                            <i class="fi fi-rs-exclamation"></i>
                            <p>PASSWORD FIELD CANNOT BE EMPTY!!!</p>
                        </div>
                        <input type="submit" value="Register" class="btn btn1" />
                        <p class="account-text">
                            Already have an account?
                            <a href="#" id="sign-in-btn2">Sign in</a>
                        </p>
                    </form>
                </div>
                <div class="panels-container">
                    <div class="panel left-panel">
                        <div class="content">
                            <h3>Already Registered?</h3>
                            <p>Click here to Login...</p>
                            <button class="btn btn1" id="sign-in-btn">Sign in</button>
                        </div>
                    </div>
                    <div class="panel right-panel">
                        <div class="content">
                            <h3>New to Website?</h3>
                            <p>Click here to Register...</p>
                            <button class="btn btn1" id="sign-up-btn">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== SWIPER JS ===============-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
        <script>
            const sign_in_btn = document.querySelector("#sign-in-btn");
            const sign_up_btn = document.querySelector("#sign-up-btn");
            const container = document.querySelector(".container1");
            const sign_in_btn2 = document.querySelector("#sign-in-btn2");
            const sign_up_btn2 = document.querySelector("#sign-up-btn2");

            sign_up_btn.addEventListener("click", () => {
                container.classList.add("sign-up-mode");
            });
            sign_in_btn.addEventListener("click", () => {
                container.classList.remove("sign-up-mode");
            });
            sign_up_btn2.addEventListener("click", () => {
                container.classList.add("sign-up-mode2");
            });
            sign_in_btn2.addEventListener("click", () => {
                container.classList.remove("sign-up-mode2");
            });

            function validation() {
                const usernameInput = document.querySelector("#username input");
                const username = document.querySelector("#username");
                const passwordInput = document.querySelector("#password input");
                const password = document.querySelector("#password");
                const usernameError = document.getElementById("username__error");
                const passwordError = document.getElementById("pass__error");

                let isValid = true;

                if (usernameInput.value.trim() === "") {
                    usernameError.style.display = "flex";
                    username.style.border = "2px solid red";
                    username.focus();
                    isValid = false;
                } else {
                    usernameError.style.display = "none";
                    username.style.border = "2px solid green";
                }

                if (passwordInput.value.trim() === "") {
                    passwordError.style.display = "flex";
                    password.style.border = "2px solid red";
                    password.focus();
                    isValid = false;
                } else {
                    passwordError.style.display = "none";
                    password.style.border = "2px solid green";
                }

                return isValid;
            }

            function validation1() {
                const usernameInput = document.querySelector("#username1 input");
                const username = document.querySelector("#username1");
                const passwordInput = document.querySelector("#password1 input");
                const password = document.querySelector("#password1");
                const emailInput = document.querySelector("#email1 input");
                const email = document.querySelector("#email1");

                const usernameError = document.getElementById("username1__error");
                const passwordError = document.getElementById("pass1__error");
                const emailError = document.getElementById("email1__error");

                let isValid = true;

                if (usernameInput.value.trim() === "") {
                    usernameError.style.display = "flex";
                    username.style.border = "2px solid red";
                    username.focus();
                    isValid = false;
                } else {
                    usernameError.style.display = "none";
                    username.style.border = "2px solid green";
                }

                if (passwordInput.value.trim() === "") {
                    passwordError.style.display = "flex";
                    password.style.border = "2px solid red";
                    password.focus();
                    isValid = false;
                } else {
                    passwordError.style.display = "none";
                    password.style.border = "2px solid green";
                }

                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (
                    emailInput.value.trim() === "" ||
                    !emailPattern.test(emailInput.value)
                ) {
                    emailError.style.display = "flex";
                    email.style.border = "2px solid red";
                    email.focus();
                    isValid = false;
                    if (!emailPattern.test(emailInput.value)) {
                        emailError.querySelector("p").textContent =
                            "EMAIL ADDRESS IS NOT CORRECT";
                    }
                } else {
                    emailError.style.display = "none";
                    email.style.border = "2px solid green";
                    emailError.querySelector("p").textContent = ""; // Clear previous error message
                }

                // if (username.style.border === "2px solid green") {
                //   showToast(registerMsg);
                // }

                return isValid;
            }
        </script>
</body>

</html>