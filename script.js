document.addEventListener('DOMContentLoaded', function() {
    const currentYear = new Date().getFullYear();
    
    // Display copyright info
    if (document.getElementById('copyright')) {
        document.getElementById('copyright').textContent = `© ${currentYear} Frank Matiku Mwita. All rights reserved.`;
    }
    
    // Display contact info
    if (document.getElementById('contact')) {
        document.getElementById('contact').textContent = 'Contact: franklymwita97@gmail.com | +255719018041';
    }
    
    // Display last modified date
    if (document.getElementById('lastModified')) {
        document.getElementById('lastModified').textContent = `Last Modified: ${document.lastModified}`;
    }
    
    // Display page location
    if (document.getElementById('pageLocation')) {
        document.getElementById('pageLocation').textContent = `Page Location: ${window.location.pathname}`;
    }
}); 