<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comlab Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding-top: 20px;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .page-title {
        margin-bottom: 20px;
    }

    .btn-custom {
        background-color: #4caf50;
        color: white;
    }

    .btn-custom:hover {
        background-color: #45a049;
    }

    .table {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        text-align: center;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .alert {
        margin-top: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }
    }

    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Comlab Inventory</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('inventories.create') }}"> Add Item</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->id }}</td>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->brand }}</td>
                        <td>{{ $inventory->category }}</td>
                        <td>
                            <form action="{{ route('inventories.destroy',$inventory->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('inventories.edit',$inventory->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $inventories->links() !!}
    </div>
</body>
</html>
