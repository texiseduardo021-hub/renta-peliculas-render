export async function descargaVista(url, id) {
  const elemento = document.getElementById(id);
  if (elemento) {
    try {
      const response = await fetch(url);
      if (response.ok) {
        elemento.innerHTML = await response.text();
      } else {
        elemento.innerHTML = "Error al cargar la vista";
      }
    } catch (e) {
      elemento.innerHTML = "Error de red";
    }
  }
}
