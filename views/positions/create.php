<h2>Добавление должности</h2>

<form method="post">
    <p>
        <label>Название должности:</label><br>
        <input type="text" name="title" required>
    </p>
    <p>
        <label>Базовый оклад (руб.):</label><br>
        <input type="number" name="salary_base" step="0.01" required>
    </p>
    <p>
        <label>Надбавка за стаж (%):</label><br>
        <input type="number" name="bonus_seniority" step="0.01" value="0">
    </p>
    <p>
        <label>Надбавка за вредность (%):</label><br>
        <input type="number" name="bonus_hazard" step="0.01" value="0">
    </p>
    <button type="submit">Сохранить</button>
    <a href="<?= app()->route->getUrl('/positions') ?>">Отмена</a>
</form>