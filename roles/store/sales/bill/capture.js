document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('.btn-generate');

    button.addEventListener('click', async () => {
        const executeAllUrl = 'http://localhost/vendex/roles/store/sales/bill/execute-all.php';

        // Función para generar la captura
        const generateCapture = async () => {
            try {
                const response = await fetch(executeAllUrl);
                if (!response.ok) throw new Error("Error al generar la captura de la factura.");
            } catch (error) {
                console.error("Error en generateCapture:", error);
            }
        };

        // Primero, redirige a la URL de ejecución
        window.location.href = executeAllUrl;

        // Después de la redirección, espera un poco para asegurarse de que se cargue la página
        setTimeout(async () => {
            try {
                // Ejecutar la generación de la captura después de la redirección
                await generateCapture();
            } catch (error) {
                console.error("Error durante la generación de la captura:", error);
            }
        }, 2000); // Ajusta el tiempo de espera según lo necesites (2000 ms = 2 segundos)
    });
});
