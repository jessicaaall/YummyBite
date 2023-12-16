<?php
$menuid = $menuId;
$namaMakanan = $makanan[0]->nama;
$kalori = $makanan[0]->kalori;
$harga = $makanan[0]->harga;
$waktuProses = $makanan[0]->waktuProses;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Menu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="w-screen h-screen">
        <?php include 'navbar.php'; ?>
        <div class="mx-8 mt-16">
            <h1 class="mb-14 font-text text-2xl md:text-3xl font-bold text-black text-center">Edit Menu</h1>
            <div class="flex justify-center">
                <form action="<?= base_url('MenuListController/updateMenu/' . $menuid); ?>" method="post" class="w-96 lg:w-4/12">
                    <div class="flex flex-col mb-7">
                        <label class="font-text font-medium mb-1 text-black">Name</label>
                        <input type="text" name="namaMakanan" pattern="[a-zA-Z]+" placeholder="<?= $namaMakanan ?>" value="<?= $namaMakanan ?? '' ?>" required class="py-2 px-4 bg-[#F5F5F5] rounded-lg border-2 border-[#DDDDDD] text-black">
                    </div>
                    <div class="flex flex-col mb-7">
                        <label class="font-text font-medium mb-1 text-black">Calories</label>
                        <input type="text" name="kalori" pattern="[1-9]\d*" placeholder="<?= $kalori ?>" value="<?= $kalori ?? '' ?>" required class="py-2 px-4 bg-[#F5F5F5] rounded-lg border-2 border-[#DDDDDD] text-black">
                    </div>
                    <div class="flex flex-col mb-7">
                        <label class="font-text font-medium mb-1 text-black">Price</label>
                        <input type="text" name="harga" pattern="[1-9]\d*" placeholder="<?= $harga ?>" value="<?= $harga ?? '' ?>" required class="py-2 px-4 bg-[#F5F5F5] rounded-lg border-2 border-[#DDDDDD] text-black">
                    </div>
                    <div class="flex flex-col mb-7">
                        <label class="font-text font-medium mb-1 text-black">Cooking Duration (minutes)</label>
                        <input type="text" name="waktuProses" pattern="[1-9]\d*" placeholder="<?= $waktuProses ?>" value="<?= $waktuProses ?? '' ?>" required class="py-2 px-4 bg-[#F5F5F5] rounded-lg border-2 border-[#DDDDDD] text-black">
                    </div>
                    <button type="submit" class="text-xl font-bold bg-[#00278B] w-full mt-8 rounded-xl text-[#FFFFFF] py-4 hover:bg-[#002360]">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>