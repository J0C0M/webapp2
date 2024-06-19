document.addEventListener('DOMContentLoaded', function () {
  const cookieBanner = document.getElementById('cookie-consent-banner');
  const acceptButton = document.getElementById('accept-cookies');

  // Check if the cookie consent has been given
  if (!getCookie('cookieConsent')) {
      cookieBanner.style.display = 'flex';
  }

  acceptButton.addEventListener('click', function () {
      setCookie('cookieConsent', 'cookies van Jochem', 365);
      cookieBanner.style.display = 'none';
  });

  function setCookie(name, value, days) {
      let expires = "";
      if (days) {
          const date = new Date();
          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
          expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }

  function getCookie(name) {
      const nameEQ = name + "=";
      const ca = document.cookie.split(';');
      for(let i=0;i < ca.length;i++) {
          let c = ca[i];
          while (c.charAt(0) === ' ') c = c.substring(1,c.length);
          if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
  }
});