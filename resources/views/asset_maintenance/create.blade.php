<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Asset Maintenance</title>
</head>
<body>
    <h1>Create Asset Maintenance</h1>

    <form action="{{ route('asset-maintenances.store') }}" method="POST">
        @csrf

        <div>
            <label for="product_id">Product:</label>
            <select name="product_id" id="product_id" required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="maintenance_type">Maintenance Type:</label>
            <input type="text" name="maintenance_type" id="maintenance_type" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="maintenance_date">Maintenance Date:</label>
            <input type="date" name="maintenance_date" id="maintenance_date" required>
        </div>

        <div>
            <button type="submit">Create</button>
        </div>
    </form>
</body>
</html>
