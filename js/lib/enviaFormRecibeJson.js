export async function enviaFormRecibeJson(event, url, destino) {
  event.preventDefault();
  const formData = new FormData(event.target);
  const response = await fetch(url, { method: "POST", body: formData });
  if (response.ok) {
    location.href = destino;
  } else {
    const error = await response.json();
    alert(error.detalle || "Error al procesar");
  }
}
