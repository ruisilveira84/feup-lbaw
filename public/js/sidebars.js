function openFilterModal() {
    document.getElementById('filterModal').style.display = 'block';
}

function closeFilterModal() {
    document.getElementById('filterModal').style.display = 'none';
}

function applyFilter() {
    // Obter os valores selecionados nos campos de seleção
    var itemType = document.getElementById('itemType').value;
    var auctionStatus = document.getElementById('auctionStatus').value;

    // Implementar lógica de filtro - exemplo simples (substitua com sua lógica real)
    //alert('Filtro aplicado:\nItem Type: ' + itemType + '\nAuction Status: ' + auctionStatus);

    // Feche a janela modal após aplicar o filtro
    closeFilterModal();
}

function performSearch() {
    alert('Implemente a lógica de pesquisa aqui.');
}