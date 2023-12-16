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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mx-8 mt-8">
            <div class="col-span-1 mb-4">
                <p class="font-text text-xl md:text-3xl font-bold text-black">Transaction History</p>
            </div>
            <div class="badge badge-outline rounded-2xl gap-16 p-6 font-text text-base font-semibold text-black lg:justify-self-end mr-4">
                <div>Total Revenue</div>
                <div id="totalRevenue"></div>
            </div>
        </div>
        <div class="overflow-x-auto mt-8 mx-8">
                <table class="table table-fixed">
                    <!-- head -->
                    <thead class="font-text text-black" style="font-size: 15px">
                        <tr>
                            <th>#</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesanan as $index => $pemesananitem) : ?>
                            <tr>
                                <th><?= $index + 1; ?></th>
                                <td class="formatOrderDate"></td>
                                <td class="formatTotalPrice"></td>
                                <td>
                                    <button class="btn my-2" onclick="showDetails(<?= $pemesananitem['id']; ?>)">View order details</button>
                                    <dialog id="modal_orderDetails_<?= $pemesananitem['id']; ?>" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box px-10 pt-10">
                                            <h3 class="font-bold text-2xl mb-6">Order Details</h3>
                                            <div class="divider mb-6"></div>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <div id="modal_content_<?= $pemesananitem['id']; ?>"></div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function formatDate(dateString) {
            const options = { day: 'numeric', month: 'short', year: 'numeric' };
            const formattedDate = new Date(dateString).toLocaleDateString('en-GB', options);
            return formattedDate;
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            }).format(value);
        }
        
        function showDetails(orderId) {
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8080/detailPemesananAPI/' + orderId,
                dataType: 'json',
                success: function(data) {
                    
                    var modalContent = $('#modal_content_' + orderId);
                    modalContent.empty();

                    $.each(data, function(index, item) {
                        modalContent.append('<p class="font-text font-lg font-semibold">' + item.namaMakanan + '</p>');
                        modalContent.append('<p class="font-text">' + item.jumlah + ' x ' + formatCurrency(item.harga) + '</p>');
                        modalContent.append('<p class="font-text font-medium mb-6">' + formatCurrency(item.hargaPesanan) + '</p>');
                    });

                    showModal('modal_orderDetails_' + orderId, orderId);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function showModal(modalId, orderId) {
            var modal = document.getElementById(modalId);
            if (modal) {
                modal.showModal();
            }
        }

        var restoranId = <?= session()->get('restoranId') ?>;
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8080/pemesananAPI/' + restoranId,
                dataType: 'json',
                success: function(data) {
                    var totalRevenue = 0;

                    $.each(data, function(index, item) {
                        totalRevenue += parseInt(item.totalHarga, 10);
                        $('.formatOrderDate').eq(index).append(formatDate(item.orderDate));
                        $('.formatTotalPrice').eq(index).append(formatCurrency(item.totalHarga));

                    });

                    $('#totalRevenue').text(formatCurrency(totalRevenue));
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

    </script>
</body>

</html>