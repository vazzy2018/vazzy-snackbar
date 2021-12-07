(function () {
  "use strict";
  const els = document.querySelectorAll(".vazzy-snackbar");

  els.forEach((el) => {
    const closeBtns = document.querySelectorAll(
      ".vazzy-snackbar__close, .vazzy-snackbar__btn--close"
    );
    const links = document.querySelectorAll(".vazzy-snackbar__btn--link");
    const popupTriggers = document.querySelectorAll(
      ".vazzy-snackbar__btn--popup-trigger"
    );

    const data = {
      id: el.dataset.sid,
      expired: el.dataset.showAfter,
    };

    closeBtns.forEach((btn) => {
      btn.addEventListener("click", (e) => closeSnackbar(e, data), {
        once: true,
      });
    });

    links.forEach((link) =>
      link.addEventListener("click", () => setSnackbarCookie(data), {
        once: true,
      })
    );

    popupTriggers.forEach((el) => initPopup(el));
  });

  function closeSnackbar(e, data) {
    const container = e.target.closest(".vazzy-snackbar-container");
    container.classList.add("vazzy-snackbar--closed");
    container.addEventListener("transitionend", () => container.remove());
    setSnackbarCookie(data);
  }

  function setSnackbarCookie(data) {
    if (checkCookie(`m-snackbar-${data.id}`)) return;
    setCookie(`m-snackbar-${data.id}`, "showed", data.expired);
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function checkCookie(name) {
    let val = getCookie(name);
    if (val != "") {
      return true;
    } else {
      return false;
    }
  }

  function setCookie(cname, cvalue, exsec) {
    const d = new Date();
    d.setTime(d.getTime() + exsec * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function initPopup(triggerBtn) {
    const popupEl = triggerBtn
      .closest(".vazzy-snackbar-container")
      .querySelector(".vazzy-snackbar-popup");
    const closeBtn = popupEl.querySelector(".vazzy-snackbar-popup__close");

    triggerBtn.addEventListener("click", () => openPopup(popupEl));
    closeBtn.addEventListener("click", (e) => closePopup(e, popupEl));
    popupEl.addEventListener("click", (e) => closePopup(e, popupEl));
  }

  function openPopup(popupEl) {
    popupEl.style.display = "";
    setTimeout(() => {
      popupEl.classList.add("vazzy-snackbar-popup--showed");
    }, 17);
  }

  function closePopup(e, popupEl) {
    if (
      !e.target.classList.contains("vazzy-snackbar-popup__close") &&
      e.target != popupEl
    )
      return;
    popupEl.classList.remove("vazzy-snackbar-popup--showed");
    popupEl.addEventListener(
      "transitionend",
      () => (popupEl.style.display = "none"),
      {
        once: true,
      }
    );
  }
})();
