export async function accionElimina(url, id, destino) {
  if (confirm("¿Confirma la eliminación?")) {
    const fd = new FormData();
    fd.append("id", id);
    const response = await fetch(url, { method: "POST", body: fd });
    if (response.ok) {
      location.href = destino;
    } else {
      const error = await response.json();
      alert(error.detail || "Error al eliminar");
    }
  }
}
