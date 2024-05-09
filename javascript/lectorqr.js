




//crea elemento
const video = document.createElement("video");

//nuestro camvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

//div donde llegara nuestro canvas
const btnScanQR = document.getElementById("btn-scan-qr");

//lectura desactivada
let scanning = false;

//funcion para encender la camara
const encenderCamara = () => {
    navigator.mediaDevices
        .getUserMedia({ video: { facingMode: "environment" } })
        .then(function (stream) {
            scanning = true;
            btnScanQR.hidden = true;
            canvasElement.hidden = false;
            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
            video.srcObject = stream;
            video.play();
            tick();
            scan();
        });
};

//funciones para levantar las funiones de encendido de la camara
function tick() {
    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

    scanning && requestAnimationFrame(tick);
}

function scan() {
    try {
        qrcode.decode();
    } catch (e) {
        setTimeout(scan, 300);
    }
}

//apagara la camara
const cerrarCamara = () => {
    video.srcObject.getTracks().forEach((track) => {
        track.stop();
    });
    canvasElement.hidden = true;
    btnScanQR.hidden = false;
};


document.addEventListener("DOMContentLoaded", () => {
    const activarSonido = () => {
        var audio = document.getElementById('audioScaner');
        audio.play();
    }

    //callback cuando termina de leer el codigo QR
    qrcode.callback = (respuesta) => {
        if (respuesta) {
            console.log(respuesta);
            // Swal.fire(respuesta)
            activarSonido();
            searchId(respuesta);
            //encenderCamara();    
            cerrarCamara();


        }
    };
    //evento para mostrar la camara sin el boton 
    window.addEventListener('load', (e) => {
        encenderCamara();
    })






    /* ------ logica para obtener informacion del ID */

    function searchId(id) {

        const params = new URLSearchParams()
        params.append('operacion', 'getDataId');
        params.append('idSuperhero', id);

        fetch(`../../controllers/listsuperhero.controller.php?${params}`)
            .then((respuesta) => respuesta.json())
            .then((dato) => {

                console.log(dato)
                const tbody = document.querySelector(".table tbody");
                const fila = document.createElement('tr');
                tbody.innerHTML = ``;
                fila.innerHTML = `
                <td>${dato[0].superhero_name}</td>
                <td>${dato[0].full_name}</td>
                <td>${dato[0].height_cm}</td>
                <td>${dato[0].weight_kg}</td>
            `;
                tbody.appendChild(fila);
            })
            .catch((e) => {
                console.error(e);
            })

    }

})