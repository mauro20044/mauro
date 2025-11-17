// cart.js — coș de cumpărături local (salvat în localStorage)

// ✅ Actualizează cifra roșie din bara de navigare
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const count = cart.reduce((sum, item) => sum + item.qty, 0);
    const counter = document.getElementById('cart-count');
    if (counter) counter.textContent = count;
}

// ✅ Adaugă produs în coș
function addToCart(name, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let existing = cart.find(item => item.name === name);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({ name, price, qty: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert(`${name} a fost adăugat în coș!`);
}

// ✅ Încarcă coșul în pagina cos.html
function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const tableBody = document.getElementById('cart-items');
    const totalSpan = document.getElementById('total');
    if (tableBody) tableBody.innerHTML = '';
    let total = 0;

    if (cart.length === 0 && tableBody) {
        tableBody.innerHTML = '<tr><td colspan="5">Coșul este gol</td></tr>';
    } else if (tableBody) {
        cart.forEach((item, i) => {
            let line = item.price * item.qty;
            total += line;
            tableBody.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.price} lei</td>
                    <td>${item.qty}</td>
                    <td>${line.toFixed(2)} lei</td>
                    <td><button onclick="removeItem(${i})">❌</button></td>
                </tr>`;
        });
    }

    if (totalSpan) totalSpan.textContent = total.toFixed(2);
    updateCartCount();
}

// ✅ Elimină un produs
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
}

// ✅ Golește coșul
function clearCart() {
    localStorage.removeItem('cart');
    loadCart();
}

// ✅ Actualizează contorul când se încarcă pagina
document.addEventListener('DOMContentLoaded', updateCartCount);
