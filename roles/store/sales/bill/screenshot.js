const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Establece el tamaño del viewport
    await page.setViewport({ width: 1000, height: 1080 });

    // Navega a la página de la factura
    await page.goto('http://localhost/vendex/roles/store/sales/bill/invoice-template.php', {
        waitUntil: 'networkidle0', // Espera a que se cargue completamente
    });

    // Toma una captura de pantalla completa
    await page.screenshot({ 
        path: 'factura.png', 
        fullPage: true, // Captura la página completa
    });

    await browser.close();
})();
