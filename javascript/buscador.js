document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#fomr-qr-hero");

    const listSp = document.querySelector("#groupSuperhero");

    const idQR = document.querySelector("#idsuperhero");
    const calidadQR = document.querySelector("#calidad");

    (() => {
        const params = new URLSearchParams()
        params.append('operacion', 'getSuperhero');

        fetch(`../../controllers/listsuperhero.controller.php?${params}`)
            .then((response) => response.json())
            .then((data) => {
                data.forEach(element => {
                    const tagOption = document.createElement("option");
                    tagOption.value = element.id;
                    tagOption.innerText = element.superhero_name;
                    listSp.append(tagOption);
                });
            })
            .catch((e) => {
                console.error(e);
            })
    })();

    idQR.addEventListener('change', () => {

        console.log(idQR.value)
        const sh_name = document.querySelector(`option[value='${idQR.value}']`).innerText;
        console.log(sh_name);

    })

    calidadQR.addEventListener('change', () => {
        console.log(calidadQR.value)
    })

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const params = new URLSearchParams();
        params.append('operacion', 'superQR');
        params.append('idsuperhero', idQR.value);
        params.append('calidad', calidadQR.value);



        fetch(`../../controllers/qrsuperhero.php?${params}`)
            .then(respuesta => respuesta.text())
            .then(datos => {
                // console.log(datos)

                if (idQR.value != "") {
                    const QRimg = datos;
                    console.log(QRimg)
                    const sh_name = document.querySelector(`option[value='${idQR.value}']`).innerText;
                    window.open(`../../reports/reporte-qr.php?id=${idQR.value}&name=${sh_name}&imagen=${QRimg}`)

                } else {
                    alert("Seleccione un ID");
                }


            })
            .catch(e => {
                console.error(e)
            })

    })
}); /* FIN DEL DOM */