document.getElementById("busqueda").addEventListener("keyup", function () {
  let filtro = this.value.toLowerCase();
  let filas = document.querySelectorAll("table tbody tr");

  filas.forEach((fila) => {
    let texto = fila.textContent.toLowerCase();

    fila.style.display = texto.includes(filtro) ? "" : "none";
  });
});
