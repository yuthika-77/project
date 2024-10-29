<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clothing Item</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Libre Baskerville', serif;
            background-color: #F5EBE0;
            margin: 0;
            padding: 20px;
        }
        .add-item-container {
            max-width: 500px; 
            margin: 0 auto; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; 
        }
        h2 {
            text-align: center; 
            margin-bottom: 20px; 
        }
        label {
            margin-top: 10px; 
            display: block; 
        }
        input[type="text"],
        input[type="number"] {
            width: 100%; 
            padding: 10px; 
            margin: 5px 0 15px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        button {
            width: 100%; 
            padding: 10px;
            background-color: #376444; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            font-size: 16px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }
        button:hover {
            background-color: #4e7a5a; 
        }
    </style>
</head>
<body>

<div class="add-item-container">
    <h2>Add Clothing Item</h2>
    <form action="insertitem.php" method="POST">
        <label for="item-name">Item Name</label>
        <input type="text" id="item-name" name="item_name" required>

        <label for="description">Description</label>
        <input type="text" id="description" name="description" required>

        <label for="category">Category</label>
        <select id="category" name="category" required>
            <option value="apparel">Apparel</option>
            <option value="accessories">Accessories</option>
        </select>

        <label for="price">Price (RS)</label>
        <input type="number" id="price" name="price" min="0" required>

        <label for="image">Image Filename (e.g., image.jpg)</label>
        <input type="text" id="image" name="image" required>

        <button type="submit" name="add">Add Item</button>
    </form>
</div>

</body>
</html>
