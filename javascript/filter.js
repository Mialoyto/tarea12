document.addEventListener("DOMContentLoaded", () => {

    // funcion autoejecutable que trae de db los publisher
    (() => {
        const params = new URLSearchParams()
        params.append('operacion', 'getAllPublisher')

        fetch(`../controllers/publisher.controller.php?${params}`)
            .then(respuesta => respuesta.json())
            .then((data) => {
                // console.log(data)
                const publisher = document.querySelector("#publisher")
                data.forEach(element => {
                    const tagOption = document.createElement("option");
                    tagOption.value = element.id;
                    tagOption.innerText = element.publisher_name
                    publisher.appendChild(tagOption)

                });
            })
            .catch(e => {
                console.error(e)
            })
    })(); // fin del autoejecutable

    document.querySelector("#publisher").addEventListener('change', () => {
        let idpublisher = parseInt(document.querySelector("#publisher").value)
        console.log(idpublisher)
        window.open(`../reports/reporte01.php?idpublisher=${idpublisher}`)
    })

});