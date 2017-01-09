<!DOCTYPE html>
<html>
<head>
    <title>File List</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>File List <span>by {{ Auth::user()->name }}</span></h1>
    <hr>
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->title }}</td>
                    <td>{{ $file->created_at->diffForHumans() }}</td>
                    <td>{{ $file->comments()->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>