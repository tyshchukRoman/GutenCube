(function () {
  const SITE_KEY = "";
  let widgetIds = {};

  function ensureApi(cb) {
    if (window.turnstile) return cb();
    const existing = document.getElementById("cf-turnstile-api");
    if (existing) {
      existing.addEventListener("load", cb, { once: true });
      return;
    }
    const s = document.createElement("script");
    s.id = "cf-turnstile-api";
    s.src = "https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit";
    s.async = true;
    s.defer = true;
    s.onload = cb;
    document.head.appendChild(s);
  }

  function setButtonsDisabled(form, disabled) {
    form.querySelectorAll("button[type='submit']").forEach((btn) => {
      btn.disabled = disabled;
      if (disabled) {
        btn.classList.add("disabled"); 
      } else {
        btn.classList.remove("disabled");
      }
    });
  }

  function renderCaptcha(container) {
    if (!container || widgetIds[container.id]) return;

    let form = container.closest("form");
    if (form) {
      setButtonsDisabled(form, true); 
    }

    widgetIds[container.id] = turnstile.render(container, {
      sitekey: SITE_KEY,
      theme: "auto",
      callback: function (token) {
        console.log("Captcha solved:", token);

        if (form) {
          // создаём скрытое поле
          let hidden = form.querySelector("input[name='cf-turnstile-response']");
          if (!hidden) {
            hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = "cf-turnstile-response";
            form.appendChild(hidden);
          }
          hidden.value = token;
          setButtonsDisabled(form, false); 
        }
      },
      "expired-callback": function () {
        if (form) setButtonsDisabled(form, true);
      },
      "error-callback": function () {
        if (form) setButtonsDisabled(form, true);
      },
    });
  }

  function destroyAllCaptchas() {
    Object.values(widgetIds).forEach((id) => {
      try {
        turnstile.remove(id);
      } catch (e) {
        console.warn("Turnstile remove failed:", e);
      }
    });
    widgetIds = {};
    document.querySelectorAll("#login-form-popup .cf-turnstile").forEach((c) => {
      c.innerHTML = "";
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    ensureApi(() => {
      const popup = document.getElementById("login-form-popup");
      if (!popup) return;

      const observer = new MutationObserver(() => {
        const visible = popup.style.display !== "none" && popup.offsetParent !== null;

        if (visible) {
          popup.querySelectorAll(".cf-turnstile").forEach((container, i) => {
            if (!container.id) container.id = "cf-turnstile-" + i;
            renderCaptcha(container);
          });
        } else {
          destroyAllCaptchas();
        }
      });

      observer.observe(popup, { attributes: true, attributeFilter: ["style", "class"], subtree: true });
    });
  });
})();
