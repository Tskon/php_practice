<form target="_self" method="post" action="/index.php">
    <h3>Авторизация</h3>
	<input type="text" name="login" placeholder="login" required>
	<input type="password" name="pass" placeholder="password" required>
	<button>Войти</button>
	<div href="registration.php" target="_blank" class="toggle_button">Регистрация</div>
</form>
<form target="_self" method="post" action="/index.php" class="hidden">
    <h3>Регистрация</h3>
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="login" placeholder="login" required>
    <input type="password" name="pass" placeholder="password" required>
    <input type="password" name="pass2" placeholder="confirm password" required>
    <label for="root-checkbox">Администратор?</label>
    <input type="checkbox" name="root" id="root-checkbox" value="1">
    <button id="reg-button">Зарегистрироваться</button>
    <div href="registration.php" target="_blank" class="toggle_button">Авторизация</div>
</form>