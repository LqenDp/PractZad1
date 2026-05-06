<h2>Регистрация</h2>

<?php if (!empty($message)): ?>
    <p style="color: <?= strpos($message, 'успешно') !== false ? 'green' : 'red' ?>;">
        <?= $message ?>
    </p>
<?php endif; ?>

<form method="post">
    <p>
        <label>Имя:</label><br>
        <input type="text" name="full_name" required>
    </p>
    <p>
        <label>Login:</label><br>
        <input type="text" name="login" required>
    </p>
    <p>
        <label>Пароль:</label><br>
        <input type="password" name="password" required>
    </p>
    <button type="submit">Зарегистрироваться</button>
</form>

<p>
    Уже есть аккаунт? <a href="<?= app()->route->getUrl('/login') ?>">Войти</a>
</p>