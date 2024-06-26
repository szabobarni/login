<?php
Class Page{
    static function header(){
        echo '<!doctype html>
        <html lang="hu-hu">
        <head>
            <meta charset="utf-8">
            <title>Login</title>
        
            <!-- Scripts -->
            <script src="script.js"></script>
            <!-- Fonts -->
            <!-- Styles -->
            <link rel="stylesheet" href="style.css">
        </head>
        <body>';
    }
    static function loginBtn(){
        echo '
        <form class="lgn-button" action=""  method="post">
            <button role="button" name="btn-login">Login</button>
        </form>'
        ;
    }
    static function footer(){
        echo'
        </body>
        <footer>

        </footer>
        </html>';
    }
    static function installBtn(){
        echo"
            <form action='' method='post'>
                <button type='submit' name='btn-install'>Install</button>
            </form>
            ";
    }
    static function login(){
        echo '
            <style type="text/css">.lgn-button  { display: none; }</style>
            <form class="lgn-menu" action="" method="post">
                <label for="email">E-mail</label>
                <input type="email" id="input1" name="input1" value=""><br>
                <label for="jelszo">Jelszó</label>
                <input type="password" id="input2" name="input2" value=""><br>
                <button type="submit" name="btn-login-conf">Bejelentkezés</button>
                <button type="submit" name="btn-reg">Regisztráció</button>
                <a href="pass.php">Elfelejtett jelszó</a>
            </form>
        ';
    }
    static function reg(){
        echo '
        <style type="text/css">.lgn-button  { display: none; }</style>
        <form class="reg-menu" action="" method="post">
            <label for="name">Név</label>
            <input type="text" required id="reg-name" name="reg-name" value=""><br>
            <label for="email">E-mail</label>
            <input type="email" required id="reg-email" name="reg-email" value=""><br>
            <label for="jelszo">Jelszó</label>
            <input type="password" required id="reg-pass" name="reg-pass" value=""><br>
            <label for="jelszo">Jelszó újra</label>
            <input type="password" required id="reg-pass2" name="reg-pass2" value=""><br>
            <button type="submit" name="btn-reg-conf">Regisztráció</button>
        </form>
    ';
    }
    static function loginSuccess(){
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
        Sikeres bejelentkezés!
      </div>';
    }
    static function loginFail(){
        echo '<div class="alert2">
        <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
        Sikertelen bejelentkezés!
      </div>';
    }
}