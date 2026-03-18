export function rentaPeliculas(genero) {
    if (genero === "accion") {
        return "John Wick";
    } else if (genero === "comedia") {
        return "Superbad";
    } else if (genero === "terror") {
        return "El Conjuro";
    } else {
        return "No tenemos películas de ese género";
    }
}
