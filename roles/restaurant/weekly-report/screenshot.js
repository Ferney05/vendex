const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto('http://localhost/vendex/roles/restaurant/weekly-report/report.php');
    await page.screenshot({ path: 'report.png' });
    await browser.close();
    // console.log('Captura tomada');
})();
