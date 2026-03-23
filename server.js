import express from "express";

const app = express();
const PORT = process.env.PORT || 3000;

const peliculas = {
  accion: {
    nombre: "John Wick",
    imagen: "https://play-lh.googleusercontent.com/vByxM5S2LXTqxdDo84ilW2D1M8WWDC-Om3M2wWwZ3Nb9pU70MAceTI3HvPJL5Yq0i9Xj"
  },
  comedia: {
    nombre: "Superbad",
    imagen: "https://m.media-amazon.com/images/S/pv-target-images/bb91a439ff92a68e22fc18b3f00a4572c1048741a60d3a5ddfcac4814e1da972.jpg"
  },
  terror: {
    nombre: "El Conjuro",
    imagen: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT57CO5hDa_xALgOGpFGt9W6_Xlt8gAeM6SSQ&s"
  }
};

app.use(express.static(".")); // sirve tu HTML

app.get("/rentaPeliculas", (req, res) => {
  const genero = req.query.genero;

  if (!genero) {
    return res.json({
      ok: false,
      error: "El género es obligatorio"
    });
  }

  const peli = peliculas[genero.toLowerCase()] || {
    nombre: "No disponible",
    imagen: "https://media.tenor.com/-0mYUnkUOXIAAAAM/oh-raios-que-raios.gif"
  };

  res.json({
    ok: true,
    data: {
      genero,
      recomendacion: peli.nombre,
      poster: peli.imagen
    }
  });
});

app.listen(PORT, () => {
  console.log("Servidor corriendo en puerto " + PORT);
});
