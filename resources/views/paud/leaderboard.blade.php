<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding: 20px;
        }
        .box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #6C63FF;
            color: white;
        }
    </style>
</head>
<body>

<div class="box">
    <h2 style="text-align:center;">🏆 Leaderboard</h2>

    @if(count($data) == 0)
        <p style="text-align:center;">Belum ada skor yang masuk 😢</p>
    @else
        <table>
            <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Skor</th>
            </tr>

            @foreach($data as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['score'] }}</td>
            </tr>
            @endforeach
        </table>
    @endif
</div>

</body>
</html>
