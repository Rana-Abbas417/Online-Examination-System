/* =========================================================
   FORM VALIDATION
   ========================================================= */

function validateForm() {
  const passwordField = document.getElementById("pass");

  const confirmPasswordField = document.getElementById("cpass");

  if (!passwordField || !confirmPasswordField) {
    return true;
  }

  const password = passwordField.value;

  const confirmPassword = confirmPasswordField.value;

  if (password !== confirmPassword) {
    alert("Passwords do not match!");

    return false;
  }

  return true;
}

/* =========================================================
   MOBILE DRAWER NAVIGATION
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  const menuButtons = document.querySelectorAll(".menu-toggle");

  if (!menuButtons.length) {
    return;
  }

  /*
   * Create one backdrop for the mobile drawer.
   */
  let backdrop = document.querySelector(".nav-backdrop");

  if (!backdrop) {
    backdrop = document.createElement("div");

    backdrop.className = "nav-backdrop";

    document.body.appendChild(backdrop);
  }

  /*
   * Close every open drawer.
   */
  function closeMenus() {
    document.querySelectorAll(".nav-links.active").forEach(function (menu) {
      menu.classList.remove("active");
    });

    document.querySelectorAll(".menu-toggle.active").forEach(function (button) {
      button.classList.remove("active");

      button.setAttribute("aria-expanded", "false");

      button.setAttribute("aria-label", "Open navigation menu");
    });

    backdrop.classList.remove("active");

    document.body.classList.remove("menu-open");
  }

  /*
   * Open a specific drawer.
   */
  function openMenu(button, menu) {
    /*
     * Close any other open menus first.
     */
    document
      .querySelectorAll(".nav-links.active")
      .forEach(function (otherMenu) {
        if (otherMenu !== menu) {
          otherMenu.classList.remove("active");
        }
      });

    document
      .querySelectorAll(".menu-toggle.active")
      .forEach(function (otherButton) {
        if (otherButton !== button) {
          otherButton.classList.remove("active");

          otherButton.setAttribute("aria-expanded", "false");

          otherButton.setAttribute("aria-label", "Open navigation menu");
        }
      });

    menu.classList.add("active");

    button.classList.add("active");

    button.setAttribute("aria-expanded", "true");

    button.setAttribute("aria-label", "Close navigation menu");

    backdrop.classList.add("active");

    document.body.classList.add("menu-open");
  }

  /*
   * Hamburger button.
   */
  menuButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      event.stopPropagation();

      const nav = button.closest("nav");

      if (!nav) {
        return;
      }

      const menu = nav.querySelector(".nav-links");

      if (!menu) {
        return;
      }

      if (menu.classList.contains("active")) {
        closeMenus();
      } else {
        openMenu(button, menu);
      }
    });
  });

  /*
   * IMPORTANT:
   * Do not block navigation links.
   *
   * We only close the drawer here.
   * The browser is then allowed to follow
   * the href normally.
   */
  document.querySelectorAll(".nav-links a").forEach(function (link) {
    link.addEventListener("click", function () {
      closeMenus();
    });
  });

  /*
   * Clicking the backdrop closes the drawer.
   */
  backdrop.addEventListener("click", function () {
    closeMenus();
  });

  /*
   * ESC closes the drawer.
   */
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeMenus();
    }
  });

  /*
   * Return to normal desktop navigation
   * when the screen becomes wider.
   */
  window.addEventListener("resize", function () {
    if (window.innerWidth > 700) {
      closeMenus();
    }
  });
});
