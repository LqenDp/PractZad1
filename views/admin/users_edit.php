<?php
/** @var \Illuminate\Database\Eloquent\Collection $employees */
/** @var \Illuminate\Database\Eloquent\Collection $user */
?>
<h2>Редактирование пользователя</h2>

<form method="post">
    <p>
        <label>ФИО:</label><br>
        <input type="text" name="full_name" value="<?= htmlspecialchars($user->full_name) ?>" required>
    </p>
    <p>
        <label>Логин:</label><br>
        <input type="text" name="login" value="<?= htmlspecialchars($user->login) ?>" required>
    </p>
    <p>
        <label>Пароль (оставьте пустым, если не меняете):</label><br>
        <input type="password" name="password">
    </p>
    <p>
        <label>Роль:</label><br>
        <select name="role">
            <option value="accountant" <?= $user->role === 'accountant' ? 'selected' : '' ?>>Бухгалтер</option>
            <option value="admin" <?= $user->role === 'admin' ? 'selected' : '' ?>>Администратор</option>
        </select>
    </p>
    <p>
        <label>Связь с сотрудником:</label><br>
        <select name="employee_id">
            <option value="">-- Не связывать --</option>
            <?php foreach ($employees as $employee): ?>
                <option value="<?= $employee->UniqueID ?>" <?= $user->employee_id == $employee->UniqueID ? 'selected' : '' ?>>
                    <?= htmlspecialchars($employee->surname) ?> <?= htmlspecialchars($employee->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <button type="submit">Сохранить</button>
    <a href="<?= app()->route->getUrl('/admin/users') ?>">Отмена</a>
</form>