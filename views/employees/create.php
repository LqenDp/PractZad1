<?php
/** @var \Illuminate\Database\Eloquent\Collection $positions */
?>
<h2>Добавление сотрудника</h2>

<?php if (!empty($_SESSION['errors'])): ?>
    <p style="color: red;">
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
    </p>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<form method="post">
    <p>
        <label>Табельный номер:</label><br>
        <input type="text" name="tab_number" value="<?= $_SESSION['old']['tab_number'] ?? '' ?>" required>
    </p>
    <p>
        <label>Фамилия:</label><br>
        <input type="text" name="surname" value="<?= $_SESSION['old']['surname'] ?? '' ?>" required>
    </p>
    <p>
        <label>Имя:</label><br>
        <input type="text" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>" required>
    </p>
    <p>
        <label>ИНН:</label><br>
        <input type="text" name="inn" value="<?= $_SESSION['old']['inn'] ?? '' ?>">
    </p>
    <p>
        <label>СНИЛС:</label><br>
        <input type="text" name="snils" value="<?= $_SESSION['old']['snils'] ?? '' ?>">
    </p>
    <p>
        <label>Банковский счет:</label><br>
        <input type="text" name="banc_account" value="<?= $_SESSION['old']['banc_account'] ?? '' ?>">
    </p>
    <p>
        <label>Подразделение:</label><br>
        <input type="text" name="departament" value="<?= $_SESSION['old']['departament'] ?? '' ?>" required>
    </p>
    <p>
        <label>Должность:</label><br>
        <select name="position_id" required>
            <option value="">-- Выберите должность --</option>
            <?php foreach ($positions as $position): ?>
                <option value="<?= $position->UniqueID ?>" <?= ($_SESSION['old']['position_id'] ?? '') == $position->UniqueID ? 'selected' : '' ?>>
                    <?= htmlspecialchars($position->title) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <button type="submit">Сохранить</button>
    <a href="<?= app()->route->getUrl('/employees') ?>">Отмена</a>
</form>

<?php unset($_SESSION['old']); ?>