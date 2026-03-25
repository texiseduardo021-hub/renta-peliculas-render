/** * Envía los datos de un formulario a un servicio PHP.
 * @param {Event} event - El evento de submit.
 * @param {string} url - La ruta del archivo PHP (ej: php/pelicula-agrega.php).
 * @param {string} destino - A qué página saltar si todo sale bien (ej: index.html).
 */
export async function submitAccion(event, url, destino) {
  event.preventDefault(); // Evita que la página se recargue sola
  try {
    const formData = new FormData(event.target);
    const response = await fetch(url, {
      method: "POST",
      body: formData
    });

    if (response.ok) {
      location.href = destino; // Si se guardó, nos manda al índice
    } else {
      const error = await response.json();
      alert(error.detail || "Error al procesar la solicitud");
    }
  } catch (e) {
    alert("Error de conexión con el servidor");
  }
}
