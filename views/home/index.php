<h2>Главная страница</h2>

<h3>Сотрудники: <?= $employee_count ?? 0 ?></h3>
<h3>Начисления (мес.): <?= number_format($monthly_accruals ?? 0, 2) ?> руб.</h3>
<h3>Вычеты (мес.): <?= number_format($monthly_deductions ?? 0, 2) ?> руб.</h3>

<hr>

<h3>Список сотрудников</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Таб. номер</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Должность</th>
            <th>Подразделение</th>
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
        </tr>
        <?php endforeach; ?>
        <?php if ($employees->isEmpty()): ?>
        <tr><td colspan="5">Нет данных</td><\2f!arisetr>
        <?php endif; ?>
    </tbody>
</table>

<p>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</p>

<?php if (app()->auth::user()->role === 'admin' || app()->auth::user()->role === 'accountant'): ?>
    <p><a href="<?= app()->route->getUrl('/employees/create') ?>">+ Добавить сотрудника</a></p>
<?php endif; ?>

<hr>

<h3>График зарплат</h3>
<p>Янв | Фев | Мар | Апр | Май | Июн</p>
<p>(График зарплат по месяцам будет добавлен позже)</p>