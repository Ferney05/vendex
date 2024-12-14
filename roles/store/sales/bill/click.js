document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('.btn-generate');

    button.addEventListener('click', () => {
        // Ruta del archivo que queremos verificar
        const imagePath = 'http://localhost/vendex/roles/store/sales/bill/factura.png';
        const sendInvoiceUrl = 'http://localhost/vendex/roles/store/sales/bill/send-invoice.php';

        // Función para verificar si la imagen existe
        function checkIfImageExists() {
            fetch(imagePath, { method: 'HEAD' })
                .then(response => {
                    if (response.ok) {
                        sendInvoice(); // Llamamos la función para ejecutar send-invoice.php
                    } 
                })
                .catch(error => console.error("Error al verificar la imagen:", error));
        }

        // Función para enviar la solicitud a send-invoice.php
        function sendInvoice() {
            fetch(sendInvoiceUrl)
                .then(response => {
                    if (response.ok) {
                        console.log("Factura enviada correctamente.");
                    } else {
                        console.error("Error al enviar la factura.");
                    }
                })
                .catch(error => console.error("Error en la solicitud de envío:", error));
        }

        // Verificar la existencia de la imagen cada segundo
        const interval = setInterval(() => {
            checkIfImageExists();
        }, 1000);

        // Detener la verificación después de un tiempo límite (opcional)
        setTimeout(() => {
            clearInterval(interval);
        }, 1000); 
    });
});