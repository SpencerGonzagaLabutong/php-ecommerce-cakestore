function added(){
    alert('added to cart successfully');
}

function success(){
    alert('Order Succes');
} 

document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let input = document.getElementById('searchInput').value.toLowerCase();
    let products = document.querySelectorAll('.product');
    
    products.forEach(function(product) {
        let productName = product.querySelector('.card-title').textContent.toLowerCase();
        let productDescription = product.querySelector('.card-text').textContent.toLowerCase();
        
        if (productName.indexOf(input) > -1 || productDescription.indexOf(input) > -1) {
            product.style.display = "";
        } else {
            product.style.display = "none";
        }
    });
});