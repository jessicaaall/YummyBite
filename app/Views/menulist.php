<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaction</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="w-screen h-screen">
        <?php include 'navbar.php'; ?>
        <div class="mx-8 mt-8">
            <p class="mb-8 font-text text-xl md:text-3xl font-bold text-black">Menu List</p>
            <button onclick="redirectToAddMenu()" class="btn btn-outline btn-block text-base rounded-3xl bg-gray-100 hover:bg-gray-300 hover:text-black">Add New Menu</button>
        </div>
        <div class="overflow-x-auto mt-8 mx-8">
                <table class="table table-fixed">
                    <!-- head -->
                    <thead class="font-text text-black" style="font-size: 15px">
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Calories</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $index => $menuitem) : ?>
                            <tr>
                                <th><?= $index + 1; ?></th>
                                <td><?= esc($menuitem->namaMakanan); ?></td>
                                <td><?= esc($menuitem->kalori); ?></td>
                                <td><?= 'Rp ' . number_format(esc($menuitem->harga), 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <script>
        function redirectToAddMenu() {
            window.location.href = '<?= base_url('addmenu'); ?>';
        }
    </script>
</body>

</html>