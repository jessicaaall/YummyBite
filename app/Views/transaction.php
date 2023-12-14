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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mx-8 mt-8 lg:mx-16">
            <div class="col-span-2">
                <p class="font-text text-lg md:text-3xl font-semibold text-black">Transaction History</p>
            </div>
            <div class="overflow-x-auto mt-8">
                <table class="table">
                    <!-- head -->
                    <thead class="font-text text-black" style="font-size: 16px">
                        <tr>
                            <th>#</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Total Price</th>
                            <th>Order Details</th>
                        </tr>
                    </thead>
                    <tbody id="pemesananTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        var restoranId = <?= json_encode($restoranId) ?>;
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8080/pemesananAPI/' + restoranId,
                dataType: 'json',
                success: function(data) {
                    updatePemesananList(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });

            function updatePemesananList(data) {
                var pemesananTable = $('#pemesananTable');
                pemesananTable.empty();

                $.each(data, function(index, item) {
                    var row = $('<tr>');
                    row.append('<th>' + (index + 1) + '</th>');
                    row.append('<td>' + formatDate(item.orderDate) + '</td>');

                    var status = $('<td>').text(item.status);
                    if (item.status === 'Ongoing') {
                        status.css('color', '#810000');
                    } else if (item.status === 'Complete') {
                        status.css('color', '#2C5F28');
                    }
                    row.append(status);

                    row.append('<td>' + formatCurrency(item.totalHarga) + '</td>');
                    row.append('<td><button onclick="viewOrderDetails(' + item.id + ')">View order details</button></td>');

                    pemesananTable.append(row);
                });
            }

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

        });
    </script>
</body>

</html>