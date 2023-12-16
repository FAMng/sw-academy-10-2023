<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПОЛЬЗОВАТЕЛИ АКАДЕМИЯ 2023</title>
</head>
<style>

    .content{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 120px;
    }
    .btn-edit {
        display: inline-block;
        padding: 5px 10px;
        background-color: #4f4caf;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        margin-bottom: 40px;
        align-self: flex-end;
        cursor: pointer;
    }
    .table {
        display: grid;
        border: 1px solid #ccc;
        border-collapse: collapse;
        width: 100%;
    }
    .table-row {
        display: grid;
        grid-template-columns: 40px repeat(5, 1fr);
        grid-gap: 0;
        border: 1px solid #ccc;
    }
    .table-head,
    .table-cell {
        padding: 8px;
        text-align: center;
        border-right: 1px solid #ccc;
    }
    .table-cell{

    }
    .table-head {
        font-weight: bold;
        background-color: #f2f2f2;
    }
</style>
<body>
<header>
</header>
<main class="content">
    <h1>ПОЛЬЗОВАТЕЛИ "АКАДЕМИЯ 2023"</h1>
    <a href="http://localhost:8080/edit/show?id=1" class="btn-edit">Редактировать</a>
    <?= /** @var string $content */
    $content
    ?>
</main>
<footer>
</footer>
</body>
</html>