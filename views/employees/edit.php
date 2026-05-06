<h2>Редактирование сотрудника</h2>

<form method="post">
    <p>
        <label>Табельный номер:</label><br>
        <input type="text" name="tab_number" value="<?= htmlspecialchars($employee->tab_number) ?>" required>
    </p>
    <p>
        <label>Фамилия:</label><br>
        <input type="text" name="surname" value="<?= htmlspecialchars($employee->surname) ?>" required>
    </p>
    <p>
        <label>Имя:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($employee->name) ?>" required>
    </p>
    <p>
        <label>ИНН:</label><br>
        <input type="text" name="inn" value="<?= htmlspecialchars($employee->inn) ?>">
    </p>
    <p>
        <label>СНИЛС:</label><br>
        <input type="text" name="snils" value="<?= htmlspecialchars($employee->snils) ?>">
    </p>
    <p>
        <label>Банковский счет:</label><br>
        <input type="text" name="banc_account" value="<?= htmlspecialchars($employee->banc_account) ?>">
    </p>
    <p>
        <label>Подразделение:</label><br>
        <input type="text" name="departament" value="<?= htmlspecialchars($employee->departament) ?>" required>
    </p>
    <p>
        <label>Должность:</label><br>
        <select name="position_id" required>
            <option value="">-- Выберите должность --</option>
            <?php foreach ($positions as $position): ?>
                <option value="<?= $position->UniqueID ?>" <?= $employee->position_id == $position->UniqueID ? 'selected' : '' ?>>
                    <?= htmlspecialchars($position->title) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <button type="submit">Сохранить</button>
    <a href="<?= app()->route->getUrl('/employees') ?>">Отмена</a>
</form>