<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Бухгалтерия - Учёт зарплаты</title>
</head>
<body>

<?php if (app()->auth::check()): ?>

    <div style="background: #333; color: white; padding: 10px; display: flex; justify-content: space-between;">
        <h2>Бухгалтерия - Учёт зарплаты</h2>
        <div>
            <span>Здравствуйте, <?= htmlspecialchars(app()->auth::user()->full_name) ?>!</span>
            <span> [<?= app()->auth::user()->role === 'admin' ? 'Администратор' : 'Бухгалтер' ?>] </span>
            <a href="<?= app()->route->getUrl('/logout') ?>" style="color: white;">Выход</a>
        </div>
    </div>

    <div style="display: flex; background: #f0f0f0; padding: 10px;">
        <a href="<?= app()->route->getUrl('/') ?>" style="margin-right: 15px;">Главная</a>
        <a href="<?= app()->route->getUrl('/employees') ?>" style="margin-right: 15px;">Сотрудники</a>
        <a href="<?= app()->route->getUrl('/accruals') ?>" style="margin-right: 15px;">Начисления</a>
        <a href="<?= app()->route->getUrl('/deductions') ?>" style="margin-right: 15px;">Вычеты</a>
        <a href="<?= app()->route->getUrl('/salaries') ?>" style="margin-right: 15px;">Зарплатная ведомость</a>
        <?php if (app()->auth::user()->role === 'admin'): ?>
            <a href="<?= app()->route->getUrl('/positions') ?>" style="margin-right: 15px;">Должности</a>
            <a href="<?= app()->route->getUrl('/admin/users') ?>">Пользователи</a>
        <?php endif; ?>
    </div>

    <div style="padding: 20px;">
        <?= $content ?? '' ?>
    </div>

    <div style="text-align: center; padding: 10px; border-top: 1px solid #ccc; margin-top: 20px;">
        Адрес электронной почты: @gmail.com
    </div>

<?php else: ?>

    <div style="padding: 20px;">
        <?= $content ?? '' ?>
    </div>

<?php endif; ?>

</body>
</html>