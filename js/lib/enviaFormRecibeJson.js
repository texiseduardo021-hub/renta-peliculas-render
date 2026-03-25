export async function enviaFormRecibeJson(event, url) {
  event.preventDefault();
  const formData = new FormData(event.target);
  const response = await fetch(url, {
    method: "POST",
    body: formData
  });
  if (response.ok) {
    return await response.json();
  } else {
    const error = await response.json();
    throw new Error(error.detail || "Error en el servidor");
  }
}
