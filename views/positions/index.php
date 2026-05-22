<?php
/** @var \Illuminate\Database\Eloquent\Collection $positions */
?>
<h2>Должности</h2>

<?php if (app()->auth::user()->role === 'admin'): ?>
    <p><a href="<?= app()->route->getUrl('/positions/create') ?>">+ Добавить должность</a></p>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Базовый оклад</th>
            <th>Надбавка за стаж</th>
            <th>Надбавка за вредность</th>
            <?php if (app()->auth::user()->role === 'admin'): ?>
                <th>Действия</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $position): ?>
        <tr>
            <td><?= $position->UniqueID ?></td>
            <td><?= htmlspecialchars($position->title) ?></td>
            <td><?= number_format($position->salary_base, 2) ?> руб.</td>
            <td><?= $position->bonus_seniority ?>%</?= ?>
            <td><?= $position->bonus_hazard ?>%</?= ?>
            <?php if (app()->auth::user()->role === 'admin'): ?>
                <td>
                    <a href="<?= app()->route->getUrl('/positions/' . $position->UniqueID . '/edit') ?>">Ред.</a>
                    <a href="<?= app()->route->getUrl('/positions/' . $position->UniqueID . '/delete') ?>" onclick="return confirm('Удалить должность?')">Уд.</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>