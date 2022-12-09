<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .border-tab {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-tab th {
            border: 1 solid #000;
            font-weight: bold;
            background-color: #e1e1e1;
        }

        .border-tab td {
            border: 1 solid #000;
        }
    </style>
</head>

<body>
    <h3>Data Event</h3>
    <table class="border-tab">
        <tbody>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penyelenggara</th>
                <th>Tanggal Mulai Event</th>
                <th>Tanggal Akhir Event</th>
                <th>Deskripsi</th>
            </tr>
            <?php foreach ($event as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->judul ?></td>
                    <td><?= $value->penyelenggara ?></td>
                    <td><?= date('d/m/y', strtotime($value->start_event)) ?></td>
                    <?php if ($value->end_event == '0000-00-00 00:00:00') : ?>
                        <td><?= date('d/m/y', strtotime($value->start_event)) ?></td>
                    <?php else : ?>
                        <td><?= date('d/m/y', strtotime($value->end_event)) ?></td>
                    <?php endif ?>
                    <td><?= $value->deskripsi ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>