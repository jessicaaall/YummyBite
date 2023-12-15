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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $index => $menuitem) : ?>
                            <tr>
                                <th><?= $index + 1; ?></th>
                                <td><?= esc($menuitem->namaMakanan); ?></td>
                                <td><?= esc($menuitem->kalori); ?></td>
                                <td><?= 'Rp ' . number_format(esc($menuitem->harga), 0, ',', '.'); ?></td>
                                <td>
                                    <button class="my-1" onclick="showConfirmationModal(<?= esc($menuitem->id); ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                                            <path fill="#00278b" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </button>
                                    <dialog id="confirm_modal<?= esc($menuitem->id); ?>" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box p-10">
                                            <h3 class="font-bold text-2xl mb-6 text-center">Are you sure want to delete this menu?</h3>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <form action="<?= base_url('MenuListController/deleteMenu/' . $menuitem->id); ?>" method="post" class="flex justify-center">
                                                <button type="submit" class="btn text-lg font-semibold rounded-xl bg-[#00278B] text-[#FFFFFF] mt-8 py-2 px-10 hover:bg-[#002360]">Yes</button>
                                            </form>
                                        </div>
                                    </dialog>
                                </td>
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

        function showConfirmationModal(id) {
            var modal = document.getElementById("confirm_modal" + id);
    
            if (modal) {
                modal.showModal();
            }
        }

    </script>
</body>

</html>