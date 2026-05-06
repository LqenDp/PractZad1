<h2>Вход</h2>

<?php if (!empty($message)): ?>
    <p style="color: red;"><?= $message ?></p>
<?php endif; ?>

<form method="post">
    <p>
        <label>Login:</label><br>
        <input type="text" name="login" required>
    </p>
    <p>
        <label>Пароль:</label><br>
        <input type="password" name="password" required>
    </p>
    <p>
        <label>
            <input type="checkbox" name="remember"> Запомнить меня
        </label>
    </p>
    <button type="submit">Войти</button>
</form>

<p>
    Нет аккаунта? <a href="<?= app()->route->getUrl('/register') ?>">Зарегистрироваться</a>
</p>