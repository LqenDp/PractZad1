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

<p style="margin-top: 20px;">
    <a href="#" style="color: #3498db;">Забыли пароль?</a>
</p>

<p>
    Ещё нет аккаунта? <a href="<?= app()->route->getUrl('/register') ?>">Зарегистрироваться</a>
</p>