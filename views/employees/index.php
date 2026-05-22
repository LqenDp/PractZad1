<?php
/** @var \Illuminate\Database\Eloquent\Collection $employees */
?>
<h2>Список сотрудников</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Таб. номер</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Должность</th>
            <th>Подразделение</th>
            <th>ИНН</th>
            <th>СНИЛС</th>
            <?php if (app()->auth::user()->role === 'admin' || app()->auth::user()->role === 'accountant'): ?>
                <th>Действия</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= htmlspecialchars($employee->tab_number) ?></td>
            <td><?= htmlspecialchars($employee->surname) ?></td>
            <td><?= htmlspecialchars($employee->name) ?></td>
            <td><?= htmlspecialchars($employee->position->title ?? '—') ?></td>
            <td><?= htmlspecialchars($employee->departament) ?></td>
            <td><?= htmlspecialchars($employee->inn) ?></td>
            <td><?= htmlspecialchars($employee->snils) ?></td>
            <?php if (app()->auth::user()->role === 'admin' || app()->auth::user()->role === 'accountant'): ?>
                <td>
                    <a href="<?= app()->route->getUrl('/employees/' . $employee->UniqueID . '/edit') ?>">Ред.</a>
                    <a href="<?= app()->route->getUrl('/employees/' . $employee->UniqueID . '/delete') ?>" onclick="return confirm('Удалить сотрудника?')">Уд.</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="<?= app()->route->getUrl('/employees/create') ?>">+ Добавить сотрудника</a></p>