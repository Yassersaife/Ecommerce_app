<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {


        var ctxProducts = document.getElementById('chart-products').getContext('2d');
        new Chart(ctxProducts, {
            type: 'bar',
            data: {
                labels: ['المنتجات'],
                datasets: [{
                    label: 'عدد المنتجات',
                    data: [{{ $productsCount }}],
                    backgroundColor: '#A918D4FF'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    });
</script>
