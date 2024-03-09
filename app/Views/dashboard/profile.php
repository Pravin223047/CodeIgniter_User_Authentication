<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <style>
    body {
        padding: 1rem;
    }

    .table-container {
        max-width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        background: blue;
        padding: 0.3rem;
        border-radius: .2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: #fff;
    }

    @media screen and (max-width: 600px) {
        body {
            padding: 0;
        }

        table {
            font-size: 12px;
            font-weight: 700;
        }

        a {
            font-size: .6rem;
        }
    }

    @media screen and (max-width: 400px) {

        table {
            font-size: 10px;
            font-weight: 700;

        }
    }

    @media screen and (max-width: 300px) {
        table {
            font-size: 8px;
            font-weight: 700;
        }
    }
    </style>
</head>

<body>
    <h2>
        <?= $title; ?>
    </h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $userInfo['id']; ?>
                    </td>
                    <td>
                        <?= ucfirst($userInfo['name']); ?>
                    </td>
                    <td>
                        <?= $userInfo['email']; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('auth/logout'); ?>">Logout</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>