document.addEventListener("DOMContentLoaded", () => {
  const lista = document.querySelector("#publishers");
  const genero = document.querySelector("#genders");
  const limite = document.querySelector("#valorMax");
  const boton = document.querySelector("#enviarData");

  // funcion autoejecutable que trae de db los publisher
  (() => {
    const params = new URLSearchParams();
    params.append("operacion", "getAll");

    fetch(`../controllers/publisher2.controller.php?${params}`)
      .then((respuesta) => respuesta.json())
      .then((data) => {
        // console.log(data);
        data.forEach((element) => {
          const tagOption = document.createElement("option");
          tagOption.value = element.publisher_id;
          tagOption.innerText = `${element.publisher_name} (${element.Total})`;
          lista.appendChild(tagOption);
        });

        lista.addEventListener("change", () => {
          console.log(lista.value);

          /*   primero debe selecionar el publisher y luego el genero */
          if (lista.value > 0) {
            // funcion autoejecutable que trae de db los genders

            (() => {
              const params = new URLSearchParams();
              params.append("operacion", "getGender");

              fetch(`../controllers/gender.controller.php?${params}`)
                .then((respuesta) => respuesta.json())
                .then((data) => {
                  // console.log(data);
                  genero.innerHTML = ``;
                  data.forEach((element) => {
                    const tagOption = document.createElement("option");
                    tagOption.value = element.id;
                    tagOption.innerText = element.gender;
                    genero.appendChild(tagOption);
                  });
                  genero.addEventListener("change", () => {
                    console.log(genero.value);
                  });
                })
                .catch((e) => {
                  console.error(e);
                });
            })(); // fin del autoejecutable genders 

            lista.addEventListener("change", () => {
              console.log(lista.value),
                console.log(lista.options[lista.selectedIndex].text);
            })

            boton.addEventListener('click', () => {
              if (lista.value && genero.value && limite.value != "") {
                const idPublisher = lista.value;
                const idgender = genero.value;
                const limit = limite.value;
                const titulo = lista.options[lista.selectedIndex].text
                window.open(`../reports/reporte03.php?publisher_id=${idPublisher}&gender_id=${idgender}&limite=${limit}&publisher_name=${titulo}`, `_blank`);
              }
            })
          }
        });
      })
      .catch((e) => {
        console.error(e);
      });
  })(); // fin del autoejecutable pubishers y gende



});
