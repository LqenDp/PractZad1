<h2>Управление пользователями</h2>

<?php if (!empty($_SESSION['message'])): ?>
    <p style="color: green;"><?= $_SESSION['message'] ?></p>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<h3>Добавить пользователя</h3>

<form method="post" action="<?= app()->route->getUrl('/admin/users/store') ?>">
    <p>
        <label>ФИО:</label><br>
        <input type="text" name="full_name" required>
    </p>
    <p>
        <label>Логин:</label><br>
        <input type="text" name="login" required>
    </p>
    <p>
        <label>Пароль:</label><br>
        <input type="password" name="password" required>
    </p>
    <p>
        <label>Роль:</label><br>
        <select name="role">
            <option value="accountant">Бухгалтер</option>
            <option value="admin">Администратор</option>
        </select>
    </p>
    <button type="submit">Добавить</button>
</form>

<hr>

<h3>Список пользователей</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Логин</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= htmlspecialchars($user->full_name) ?> <?= $user->id == app()->auth::user()->id ? '(вы)' : '' ?></td>
            <td><?= htmlspecialchars($user->login) ?></td>
            <td><?= $user->role === 'admin' ? 'Администратор' : 'Бухгалтер' ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/admin/users/' . $user->id . '/edit') ?>">Ред.</a>
                <?php if ($user->id != app()->auth::user()->id): ?>
                    <a href="<?= app()->route->getUrl('/admin/users/' . $user->id . '/delete') ?>" onclick="return confirm('Удалить пользователя?')">Уд.</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>