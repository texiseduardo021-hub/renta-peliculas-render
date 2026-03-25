export async function consume(url, id, params) {
  const response = await fetch(url, {
    method: params instanceof FormData ? "POST" : "GET",
    body: params instanceof FormData ? params : null
  });
  if (response.ok) {
    const json = await response.json();
    for (const [key, value] of Object.entries(json)) {
      const elemento = document.getElementById(key) || document.getElementsByName(key)[0];
      if (elemento) {
        if (value.innerHTML !== undefined) elemento.innerHTML = value.innerHTML;
        if (value.value !== undefined) elemento.value = value.value;
      }
    }
  } else {
    const error = await response.json();
    alert(error.detail || "Error al cargar");
  }
}
