// Function to update the subtotal for an item in the cart
function actualizarSubtotalItem(selector) {
    var item = selector.parentElement.parentElement;  // Get the item container
    var precioElemento = item.getElementsByClassName('carrito-item-precio')[0]; // Get the price element
    var precioTexto = precioElemento.innerText.replace('$', '').replace(/,/g, ''); // Extract price value
    var precio = parseFloat(precioTexto); // Convert price to a number
    var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0]; // Get quantity element
    var cantidad = parseInt(cantidadItem.value); // Get quantity
  
    // Calculate subtotal
    var subtotal = Math.round(precio * cantidad * 100) / 100;
  
    // Update subtotal display
    item.getElementsByClassName('carrito-item-subtotal')[0].innerText = '$' + subtotal.toFixed(2);
  }
  
  // Function to update the total price of all items in the cart
  function actualizarTotalCarrito() {
    var carritoContenedor = document.getElementsByClassName('carrito')[0]; // Get the cart container
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item'); // Get all cart items
    var total = 0; // Initialize total price
  
    // Loop through each item
    for (var i = 0; i < carritoItems.length; i++) {
      var item = carritoItems[i];
      var precioElemento = item.getElementsByClassName('carrito-item-precio')[0]; // Get the price element
      var precioTexto = precioElemento.innerText.replace('$', '').replace(/,/g, ''); // Extract price value
      var precio = parseFloat(precioTexto); // Convert price to a number
      var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0]; // Get quantity element
      var cantidad = parseInt(cantidadItem.value); // Get quantity
  
      // Add item price * quantity to the total
      total += precio * cantidad;
    }
  
    total = Math.round(total * 100) / 100; // Round total to two decimal places
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toFixed(2); // Update total price display
  }
  
  // Function to add an item to the cart (called when adding a product)
  function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
    var precio = item.getElementsByClassName('precio-item')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;
  
    // Add item to the cart
    agregarItemAlCarrito(titulo, precio, imagenSrc);
  
    // Ensure cart is visible
    hacerVisibleCarrito();
  
    // Update subtotal and total price
    actualizarSubtotalItem(item); // Update subtotal for the added item
    actualizarTotalCarrito(); // Update total price for all items
  }
  