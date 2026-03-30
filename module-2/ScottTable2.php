<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Number Table</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 50px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">PHP Random Number Table</h2>

<table>
    <?php for ($row = 1; $row <= 5; $row++) { ?>
        <tr>
            <?php for ($col = 1; $col <= 5; $col++) { ?>
                <td>
                    <?php echo rand(1, 100); ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>

</body>
</html>