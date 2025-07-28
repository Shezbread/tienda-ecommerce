class Producto {
    constructor(id, nombre, categoria, precio) {
        this.id = id;
        this.nombre = nombre;
        this.categoria = categoria;
        this.precio = precio;
    }

    mostrarInfo() {
        return `
            <h3>${this.nombre}</h3>
            <p>Categoría: ${this.categoria}</p>
            <p>Precio: $${this.precio}</p>
        `;
    }
}

let productos = [];
let carrito = [];

function cargarProductosDesdeServidor() {
    fetch("get_productos.php")
        .then((res) => res.json())
        .then((data) => {
            productos = data.map((p) => new Producto(p.id, p.nombre, p.categoria, p.precio));
            mostrarResultados(productos);
        })
        .catch((err) => console.error("Error al cargar productos:", err));
}

function searchProducts() {
    const texto = document.getElementById("product-search").value.toLowerCase();
    const filtrados = productos.filter((p) => p.nombre.toLowerCase().includes(texto));
    mostrarResultados(filtrados);
}

function mostrarResultados(resultados) {
    const container = document.getElementById("results-container");
    container.innerHTML = "";

    if (resultados.length === 0) {
        container.innerHTML = "<p>No se encontraron productos :(</p>";
        return;
    }

    resultados.forEach((producto) => {
        const div = document.createElement("div");
        div.innerHTML = producto.mostrarInfo();

        const btn = document.createElement("button");
        btn.textContent = "Agregar al carrito";
        btn.onclick = () => agregarAlCarrito(producto);

        div.appendChild(btn);
        container.appendChild(div);
    });
}

function agregarAlCarrito(producto) {
    carrito.push(producto);
    actualizarCarrito();
    mostrarNotificacion(`¡${producto.nombre} agregado al carrito!`);

    fetch("api_carrito.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: producto.id,
            nombre: producto.nombre,
            precio: producto.precio
        })
    })
        .then((res) => res.json())
        .then((data) => console.log(data))
        .catch((err) => console.error("Error al enviar al carrito:", err));
}

function actualizarCarrito() {
    document.getElementById("carrito-contador").textContent = carrito.length;
}

function mostrarNotificacion(mensaje) {
    const noti = document.getElementById("notification");
    noti.textContent = mensaje;
    noti.style.display = "block";

    setTimeout(() => {
        noti.style.display = "none";
    }, 3000);
}

window.addEventListener("load", () => {
    mostrarNotificacion("¡Descuento del 10% en objetos tecnológicos este fin de semana!");
    cargarProductosDesdeServidor();
});
