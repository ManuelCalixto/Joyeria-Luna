 document.getElementById('searchInput').addEventListener('keyup', function () {
    let input = this.value.toLowerCase();
    let rows = document.getElementById('tableBody').getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        let name = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
        if (name.indexOf(input) > -1) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});