document.addEventListener('DOMContentLoaded', () => {
    // URLs necesarias
    const imagePath = 'http://localhost/vendex/roles/store/sales/bill/factura.png';
    const sendInvoiceUrl = 'http://localhost/vendex/roles/store/sales/bill/send-invoice.php';
    const deleteImageUrl = 'http://localhost/vendex/roles/store/sales/bill/delete-invoice.php'; // URL para eliminar la imagen

    // Verificar si la imagen existe
    function checkIfImageExists() {
        return new Promise((resolve, reject) => {
            const interval = setInterval(() => {
                fetch(imagePath, { method: 'HEAD' })
                    .then(response => {
                        if (response.ok) {
                            clearInterval(interval);
                            resolve(true);
                        }
                    })
                    .catch(error => {
                        console.error("Error al verificar la existencia de la imagen:", error);
                    });
            }, 500);

            setTimeout(() => {
                clearInterval(interval);
                reject(new Error("No se encontró la imagen después de 10 segundos."));
            }, 10000); // 10 segundos de tiempo límite
        });
    }

    // Enviar la factura en segundo plano
    function sendInvoiceInBackground() {
        return fetch(sendInvoiceUrl, { method: 'GET' }) // Realiza la solicitud GET en segundo plano
            .then(response => {
                if (response.ok) {
                    return true; // Si la respuesta es correcta, retorna true
                } else {
                    throw new Error("Error al enviar la factura.");
                }
            })
            .catch(error => {
                console.error("Error en sendInvoiceInBackground:", error);
                return false; // En caso de error, retorna false
            });
    }

    // Eliminar la imagen de la factura
    function deleteInvoiceImage() {
        console.log("Eliminando la factura...");
        return fetch(deleteImageUrl, { method: 'POST' })
            .then(response => {
                if (response.ok) {
                    console.log("Factura eliminada correctamente.");
                } else {
                    throw new Error("Error al eliminar la factura.");
                }
            })
            .catch(error => {
                console.error("Error al eliminar la factura:", error);
            });
    }

    // Flujo principal
    checkIfImageExists()
        .then(() => {
            // Esperar 2 segundos antes de continuar
            return new Promise(resolve => setTimeout(resolve, 2000));
        })
        .then(() => {
            // Enviar la factura en segundo plano
            return sendInvoiceInBackground();
        })
        .then((isSent) => {
            if (isSent) {
                // Si la factura fue enviada correctamente, eliminar la imagen
                return deleteInvoiceImage();
            } else {
                console.log("No se pudo enviar la factura, la imagen no se eliminará.");
            }
        })
        .catch(error => {
            console.error("Error en el flujo:", error);
        });
});
